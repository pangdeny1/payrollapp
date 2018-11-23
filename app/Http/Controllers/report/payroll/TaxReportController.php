<?php

namespace App\Http\Controllers\report\payroll;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Employee;
use App\Models\Payroll;
use App\Models\Company;
use App\prltransaction;

class TaxReportController extends Controller
{

	   public function __construct()
    {
        $this->middleware("auth");
    }

      public function index()
    {
    	return view('reports.payrolls.monthlytaxform');
    }


     public function print()
    {
    	  $payrollid=request('payroll');
    	  $index=1;
    	 

    	   $payroll=Payroll::where('id',$payrollid)->firstOrfail();
    	  
           $company=Company::first();
           $payrolltransactions=prltransaction::Where('payroll_id',$payrollid)->get();

          $pdf = \PDF::loadView('reports.payrolls.monthlytaxreport',compact('payroll','index','company','payrolltransactions'));

        return $pdf->stream();
    }

}
