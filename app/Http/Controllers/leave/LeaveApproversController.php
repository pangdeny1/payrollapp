<?php

namespace App\Http\Controllers\Leave;


use Illuminate\Http\Request;
use App\Models\Leave\Leaveapprover;
use App\Models\Leave\Leavebalance;
use App\Http\Controllers\Controller;

class LeaveApproversController extends Controller
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
        $this->authorize("view", Leaveapprover::class);

        //$leaveapprovers = Leaveapprover::latest()->paginate();
        //$groups = GroupMember::all()->load('Groups');

             $leaveapprovers= Leaveapprover::latest()
            ->when(request("q"), function($query){
                return $query
                    ->where("approver", "LIKE", "%". request("q") ."%")
                    ->orWhere("employee_id", "LIKE", "%". request("q") ."%");
            })
            ->paginate();

       return view("leaves.leaveapprovers.index", compact("leaveapprovers"));
    }

    /**
     * @return View
     * @throws AuthorizationException
     */
    public function create()
    {
        $this->authorize("create", Leaveapprover::class);

        return view("leaves.leaveapprovers.create");
    }

    /**
     * @param LeaveCreateRequest $request
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function store(Request $request)
    {
        $this->authorize("create", Leaveapprover::class);
          $this->validate($request, [
            "remark" => "required",
            "employee" => "required",
            "leavetype" => "required",
            "start_date" => "required",
            "end_date" => "required",
            "duration" => "required|integer|min:1",
            
        ]);
          $employee_balance=Leavebalance::where('employee_id',request('employee'))->firstOrFail();
          if($employee_balance->days < request('duration'))
          {
          	return redirect()->back()->with('status_error', 'Insufficient leave days');
          }


        $leaveapprover = Leaveapprover::create([
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

               
        return redirect()->route("leaves.leaveapprovers.index")->with('success', "Successfully requested a Leave");
    }

    /**
     * @param Leave $leaveapprover
     * @return RedirectResponse
     * @throws AuthorizationException
     */

    public function edit($leaveapprover)
    {
        $this->authorize("edit", Leaveapprover::class);
       $leaveapprover=Leaveapprover::findOrFail($leaveapprover);

        return view("leaves.leaveapprovers.edit", [
            "leave" =>$leaveapprover,
           
           
        ]);
    }


    public function update(Request $request,$leaveapprover)
    {
        $this->authorize("update", Leaveapprover::class);
         $this->validate($request, [
            "remark" => "required",
            "employee" => "required",
            "leavetype" => "required",
            "start_date" => "required",
            "end_date" => "required|date|after_or_equal:start_date",         
        ]);
/*
        $leaveapprover->update([
            "start_date" => request("start_date"),
            "end_date" => request("end_date"),
            "employee_id" => request("employee"),
            "reason_for_leave" => request("remark"),
            "leavetype_id" => request("leavetype"),
        ]);
*/

 $leaveapprover=Leaveapprover::where('id',$leaveapprover)->firstOrFail();

             $leaveapprover->start_date= request("start_date");
             $leaveapprover->end_date = request("end_date");
             $leaveapprover->employee_id = request("employee");
             $leaveapprover->reason_for_leave = request("remark");
             $leaveapprover->leavetype_id = request("leavetype");
             $leaveapprover->total_days  =request("duration");
             $leaveapprover->working_days =request("working_days");
             $leaveapprover->holiday_days=request("holiday_days");
             $leaveapprover->save();

      
        return redirect()->route("leaves.leaveapprovers.index");
        //return redirect()->back();
    }
    /**
     * @param Leave $leaveapprover
     * @return View
     * @throws AuthorizationException
     */
    public function show($leaveapprover)
    {
        $this->authorize("view" ,Leaveapprover::class);
        $leaveapprover=Leaveapprover::where('id',$leaveapprover)->firstOrFail();
        return view("leaves.leaveapprovers.show", compact("Leave"));
    }

    /**
     * @param Leave $leaveapprover
     * @return RedirectResponse
     * @throws \Exception
     */
    public function destroy(Leave $leaveapprover)
    {
        $leaveapprover->delete();

        return redirect()->route("leaves.leaveapprovers.index");
    }
    
  
}
