<?php

namespace App\Http\Controllers\report\payroll;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Employee;
use App\Models\Payroll;
use App\Models\Company;
use App\prltransaction;
class PayslipReportController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }

    public function index()
    {
    	return view('reports.payrolls.payslipform');
    }

    public function generate(Request $request)
    {
    	  $this->validate($request, [
            'payroll'     => 'required',
            ]);
    	  $payrollid=request('payroll');
    	  $index=1;
    	   $employee=request('employee');

            return view("reports.payrolls.payslipreport",compact('payrollid','index','employee'));
            

    }

     public function print()
    {
    	  $payrollid=request('payroll');
    	  $index=1;
    	   $employeeid=request('employee');

    	   $payroll=Payroll::where('id',$payrollid)->firstOrfail();
    	   $employee=Employee::where('id',$employeeid)->firstOrfail();
           $company=Company::first();
           $payrolltrasaction=prltransaction::Where('payroll_id',10)->firstOrfail();

          $pdf = \PDF::loadView('reports.payrolls.payslipreport',compact('payroll','index','employee','company','payrolltrasaction'));

        return $pdf->stream();
    }

}
