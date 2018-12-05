<?php

namespace App\Http\Controllers\report\payroll;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Employee;
use App\Models\Payroll;
use App\Models\Company;
use App\prltransaction;

class PayrollRegisterReportController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }

    public function index()
    {
    	return view('reports.payrolls.index');
    }

    public function generate(Request $request)
    {
    	  $this->validate($request, [
            'payroll'     => 'required',
            ]);
    	  $payrollid=request('payroll');
    	  $index=1;
         $company=Company::first();
         $payroll=Payroll::where('id',$payrollid)->firstOrfail();

            return view("reports.payrolls.payrollregister",compact('payrollid','index','company','payroll'));
            

    }

      public function payrollsummeryform()
    {
        return view('reports.payrolls.payrollsummeryform');
    }

      public function payrollsummeryprint(Request $request)
    {
          $this->validate($request, [
            'payroll'     => 'required',
            ]);
          $payrollid=request('payroll');
          $index=1;
         

           $payroll=Payroll::where('id',$payrollid)->firstOrfail();
          
           $company=Company::first();
           $payrolltransactions=prltransaction::Where('payroll_id',$payrollid)->get();

          $pdf = \PDF::loadView('reports.payrolls.payrollsummeryreport',compact('payroll','index','company','payrolltransactions'));

        return $pdf->stream();
    }

}
