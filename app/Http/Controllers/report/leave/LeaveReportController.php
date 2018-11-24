<?php

namespace App\Http\Controllers\report\leave;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

    public function generate(Request $request)
    {
    	  $this->validate($request, [
            'payroll'     => 'required',
            ]);
    	  $payrollid=request('payroll');
    	  $index=1;

            return view("reports.leaves.payrollregister",compact('payrollid','index'));
            

    }

      public function leavebalanceform()
    {
        return view('reports.leaves.leavebalanceform');
    }

      public function leavebalanceprint(Request $request)
    {
          $this->validate($request, [
            'payroll'     => 'required',
            ]);
          $payrollid=request('payroll');
          $index=1;
         

           $payroll=Payroll::where('id',$payrollid)->firstOrfail();
          
           $company=Company::first();
           $payrolltransactions=prltransaction::Where('payroll_id',$payrollid)->get();

          $pdf = \PDF::loadView('reports.leaves.leavebalancereport',compact('payroll','index','company','payrolltransactions'));

        return $pdf->stream();
    }

}
