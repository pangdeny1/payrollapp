<?php

namespace App\Http\Controllers\leave;

use Illuminate\Http\Request;
use App\Models\Leave\Leave;
use App\Models\Leave\Leavebalance;
use App\Models\Leave\LeaveEmployeeApprover;
use App\Models\Leave\Leaveapproval;
use App\Models\Notification\Emailnotification;
use DB;
use App\Http\Controllers\Controller;
use App\Models\Leave\leaveRequestApprover;

class LeavesController extends Controller
{
      public function __construct()
    {
        $this->middleware("auth");
    }

    /**
     * @return View
     * @throws AuthorizationException
     */
    public function index()
    {
        $this->authorize("view", Leave::class);

        //$leaves = Leave::latest()->paginate();
        //$groups = GroupMember::all()->load('Groups');

             $leaves= Leave::latest()
            ->when(request("q"), function($query){
                return $query
                    ->where("start_date", "LIKE", "%". request("q") ."%")
                    ->orWhere("end_date", "LIKE", "%". request("q") ."%");
            })
            ->paginate();

       return view("leaves.index", compact("leaves"));
    }

    /**
     * @return View
     * @throws AuthorizationException
     */
    public function create()
    {
        $this->authorize("create", Leave::class);

        return view("leaves.create");
    }

    /**
     * @param LeaveCreateRequest $request
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function store(Request $request)
    {
        $this->authorize("create", Leave::class);
          $this->validate($request, [
            "remark" => "required",
            "employee" => "required",
            "leavetype" => "required",
            "start_date" => "required",
            "end_date" => "required",
            "duration" => "required|integer|min:1",
            
        ]);
          $employee_approvers=leaveEmployeeApprover::where("employee_id",request('employee'))->where('active',1)->orderBy('level_id')->get();
          $employee_balance=Leavebalance::where('employee_id',request('employee'))->where('leavetype_id',request('leavetype'))->firstOrFail();
          if($employee_balance->balance < request('duration'))
          {
          	return redirect()->back()->with('status_error', 'Insufficient leave days');
          }
          if($employee_approvers->count() <1)
          {
           return redirect()->back()->with('status_error', 'No Leave Approver Asigned to Employee for this Leave type'); 
          }
          
          $formnumber=Leave::count()+1;

        $leave = Leave::create([
            "id"=>$formnumber,
            "start_date" => request("start_date"),
            "end_date" => request("end_date"),
            "employee_id" => request("employee"),
            "reason_for_leave" => request("remark"),
            "leavetype_id" => request("leavetype"),
            "total_days"   =>request("duration"),
            "working_days" =>request("working_days"),
            "holiday_days"=>request("holiday_days"),
            "creator_id" => auth()->id(),
        ]);



        $priority=0;
        foreach($employee_approvers as $approver) {
            $priority++;
                  $inserts[] = [ 'employee_id' => $approver->employee_id,
                                 'leavetype_id' => request("leavetype"),
                                 'request_id' => $formnumber,
                                 'priority'   =>$priority,
                                 'level_id'   =>$approver->level_id,
                                 'approver'   =>$approver->approver,
                                 'approver_id'=>$approver->approver_id,
                                 "creator_id" => auth()->id()
                               ]; 
                       }
                       


              DB::table('leave_request_approvers')->insert($inserts);
              $firstApprover=leaveEmployeeApprover::where('active',1)->where('employee_id',request('employee'))->orderBy('level_id')->firstOrFail();
            
              $approvefirst=Leaveapproval::create(
                               [ 'employee_id' => $firstApprover->employee_id,
                                 'leavetype_id' => request("leavetype"),
                                 'request_id' => $formnumber,
                                 'priority'   =>1,
                                 'level_id'   =>$firstApprover->level_id,
                                 'approver'   =>$firstApprover->approver,
                                 'approver_id'=>$firstApprover->approver_id,
                                 "creator_id" => auth()->id()]);

              $notification=Emailnotification::create(
                ['body'=>"Please Approve Employee Leave",
                'sendto'=>$firstApprover->approver,
                'sendto_email'=>'pangdeny@gmail.com',
                'sender'=>request('employee'),
                'url' =>'http://localhost/payrollapp/public/approvals',
                'module'=>'leave',
                "request_id"=>$formnumber,
                'notification_type'=>'Leave Approve']);


               
        return redirect()->route("leaves.index")->with('success', "Successfully requested a Leave");
    }

    /**
     * @param Leave $leave
     * @return RedirectResponse
     * @throws AuthorizationException
     */

    public function edit($leave)
    {
        $this->authorize("edit", Leave::class);
       $leave=Leave::findOrFail($leave);

        return view("leaves.edit", [
            "leave" =>$leave,
           
           
        ]);
    }


    public function update(Request $request,$leave)
    {
        $this->authorize("update", Leave::class);
         $this->validate($request, [
            "remark" => "required",
            "employee" => "required",
            "leavetype" => "required",
            "start_date" => "required",
            "end_date" => "required|date|after_or_equal:start_date",         
        ]);
/*
        $leave->update([
            "start_date" => request("start_date"),
            "end_date" => request("end_date"),
            "employee_id" => request("employee"),
            "reason_for_leave" => request("remark"),
            "leavetype_id" => request("leavetype"),
        ]);
*/

 $leave=Leave::where('id',$leave)->firstOrFail();

             $leave->start_date= request("start_date");
             $leave->end_date = request("end_date");
             $leave->employee_id = request("employee");
             $leave->reason_for_leave = request("remark");
             $leave->leavetype_id = request("leavetype");
             $leave->total_days  =request("duration");
             $leave->working_days =request("working_days");
             $leave->holiday_days=request("holiday_days");
             $leave->save();

      
        return redirect()->route("leaves.index");
        //return redirect()->back();
    }
    /**
     * @param Leave $leave
     * @return View
     * @throws AuthorizationException
     */
    public function show($leave)
    {
        $this->authorize("view" ,Leave::class);
        $Leave=Leave::where('id',$leave)->firstOrFail();
        return view("leaves.show", compact("Leave"));
    }

    /**
     * @param Leave $leave
     * @return RedirectResponse
     * @throws \Exception
     */
    public function destroy(Leave $leave)
    {
        $leave->delete();

        return redirect()->route("leaves.index");
    }

    public function getLeaveBalance($employee)
    {
        // $leavebalance=Leavebalance::where('employee_id',$employee)->where('leavetype_id',$leavetype)->first();
        $leavebalance=Leavebalance::where('employee_id',$employee)->where('leavetype_id',1)->get();

          return response()->json($leavebalance);
    }
    
  
}
