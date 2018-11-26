<?php

namespace App\Http\Controllers\report\leave;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\leave\leavebalance;
use App\Models\leave\leave;

class LeaveReportController extends Controller
{

    public function __construct()
    {
        $this->middleware("auth");
    }

    public function index()
    {
    	return view('reports.leaves.index');
    }

     public function print(Request $request)
    {
         $this->validate($request, [
            'employee'     => 'required',
            'leavetype'     =>'required',

            ]);
         
          $index=1;
            
          
           $company=Company::first();
           $leaveform=leave::Where('leavetype_id',request('leavetype'))->where('employee_id',request('employee'))->get();

          $pdf = \PDF::loadView('reports.leaves.leaveformreport',compact('index','company','leaveform'));

        return $pdf->stream();
    }

      public function leavebalanceform()
    {
        return view('reports.leaves.leavebalanceform');
    }

      public function balanceprint(Request $request)
    {
         $this->validate($request, [
            'as_ondate'     => 'required',
            'leavetype'     =>'required',

            ]);
         
          $index=1;
            
          
           $company=Company::first();
           $leavebalances=leavebalance::Where('leavetype_id',request('leavetype'))->get();

          $pdf = \PDF::loadView('reports.leaves.leavebalancereport',compact('index','company','leavebalances'));

        return $pdf->stream();
    }

}
