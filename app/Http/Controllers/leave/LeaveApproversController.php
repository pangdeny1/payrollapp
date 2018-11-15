<?php

namespace App\Http\Controllers\Leave;


use Illuminate\Http\Request;
use App\Models\Leave\Leaveapprover;
use App\Models\Leave\Leavebalance;
use App\Models\Leave\leaveEmployeeApprover ;
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
            
            "approver" => "required",
              "leavetype" => "required",
                "level" => "required",
            
            
        ]);
         

        $leaveapprover = Leaveapprover::create([
            
            "approver" => request("approver"),
            "leavetype_id" =>request("leavetype"),
            "level_id"    =>request("level"),
            "creator_id" => auth()->id(),
        ]);

               
        return redirect()->back()->with('success', "Leave approver Added");
    }

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
        return view("leaves.leaveapprovers.show", compact("leaveapprover"));
    }

    public function asign($employee)

    {

    	 $leaveapprover = leaveEmployeeApprover::create([
            
            "employee_id" => request("employee"),
             "approver" => request("approver"),
             "approver_id" => request("approver_id"),
             "leavetype_id"  => request("leavetype"),
             "active"     =>1,
            "creator_id" => auth()->id(),
        ]);

    	 return redirect()->back()->with("status","Asigned Successfully");

    }

    public function deactivate($id)
    {

  $leaveapprover=leaveEmployeeApprover::where('id',$id)->firstOrFail();
 $leaveapprover->update([
            
            "active" => 0
            ]);

  return redirect()->back()->with("status","Deleted Successfully");
    }

    /**
     * @param Leave $leaveapprover
     * @return RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
    	$leaveapprover=Leaveapprover::findOrFail($id);
        $leaveapprover->delete();

        return redirect()->back()->with("status","Deleted Successfully");
    }
    
  
}
