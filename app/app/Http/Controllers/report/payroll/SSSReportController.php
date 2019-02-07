<?php

namespace App\Http\Controllers\report\payroll;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Employee;
use App\Models\Payroll;
use App\Models\Company;
use App\prltransaction;

class SSSReportController extends Controller
{
    
	   public function __construct()
    {
        $this->middleware("auth");
    }

      public function index()
    {
    	return view('reports.payrolls.sssform');
    }


     public function print(Request $request)
    {

    	 $this->validate($request, [
            'payroll'     => 'required',
            'sss'         =>'required'
            ]);
    	  $payrollid=request('payroll');
    	  $sss=request('sss');
    	  $index=1;
    	 

    	   $payroll=Payroll::where('id',$payrollid)->firstOrfail();
    	  
           $company=Company::first();
           $payrolltransactions=prltransaction::Where('payroll_id',$payrollid)->where('sstype_id',$sss)->get();

          $pdf = \PDF::loadView('reports.payrolls.monthlysssreport',compact('payroll','index','company','payrolltransactions'));

        return $pdf->stream();
    }

}
