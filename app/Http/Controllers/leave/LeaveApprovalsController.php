<?php

namespace App\Http\Controllers\Leave;

use Illuminate\Http\Request;
use App\Models\Leave\leaveapproval;
use App\Http\Controllers\Controller;

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
}
