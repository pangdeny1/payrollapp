<?php

namespace App\Http\Controllers\Leave;

use Illuminate\Http\Request;
use App\Models\Leave\leaveapproval;
use App\Http\Controllers\Controller;
use App\Models\Leave\leaveRequestApprover;
use App\Models\Leave\leave;
use App\Models\Notification\Emailnotification;
class LeaveApprovalsController extends Controller
{
   
      public function __construct()
    {
        $this->middleware('auth');
    }

	public function index()
    {
         $pagetitle="leaveapprovals";
        $leaveapprovals=leaveapproval::latest()
            ->when(request("q"), function($query){
                return $query
                    ->where("action_type", "LIKE", "%". request("q") ."%")
                    ->orWhere("employee_id", "LIKE", "%". request("q") ."%");

            })
            ->paginate();

        return view('leaves.leaveapprovals.index', compact('pagetitle','leaveapprovals'));

    }

    public function approvals()
    {
         $pagetitle="leaveapprovals";
        $leaveapprovals=leaveapproval::where('approver',auth()->user()->employee_id)->latest()
            ->when(request("q"), function($query){
                return $query
                    ->where("action_type", "LIKE", "%". request("q") ."%")
                    ->orWhere("employee_id", "LIKE", "%". request("q") ."%");

            })
            ->paginate();

        return view('leaves.leaveapprovals.index', compact('pagetitle','leaveapprovals'));

    }

    public function approveleave($id)
    {

      $leaveapproval=leaveapproval::where('id',$id)->first();
      $leaveapproval->update(['action_type'=>'approved']);

      $nextapprover=leaveRequestApprover::where('request_id',$leaveapproval->request_id)->where('priority',$leaveapproval->priority+1)->first();

      if(!empty($nextapprover->id))
      {
         $leaveapprovalnext=Leaveapproval::create(
                               [ 'employee_id' =>$nextapprover->employee_id,
                                 'leavetype_id' => $nextapprover->leavetype_id,
                                 'request_id' => $nextapprover->request_id,
                                 'priority'   =>$nextapprover->priority,
                                 'level_id'   =>$nextapprover->level_id,
                                 'approver'   =>$nextapprover->approver,
                                 'approver_id'=>$nextapprover->approver_id,
                                 'action_by'  =>auth()->id(),
                                 "creator_id" => auth()->id()]);

          $notification=Emailnotification::create(
                ['body'=>"Please Approve Employee Leave",
                'sendto'=>$nextapprover->approver,
                'sendto_email'=>'pangdeny@gmail.com',
                'sender'=>$leaveapproval->approver,
                'url' =>'http://localhost/payrollapp/public/approvals',
                'module'=>'leave',
                "request_id"=>$nextapprover->request_id,
                'notification_type'=>'Leave Approve']);
      }

      else
      {
        $leave=Leave::where('id',$leaveapproval->request_id)->first();
        $leave->update(['status'=>'approved']);
      }

       return redirect()->back()->with('status',"Approved Successfully");
        
    }

     public function rejectleave($id)
    {

      $leaveapproval=leaveapproval::where('id',$id)->first();

      $leaveapproval->update(['action_type'=>'rejected']);


        
        return redirect()->back()->with('status_error',"Leave form Rejected Successfully");
    }
}
