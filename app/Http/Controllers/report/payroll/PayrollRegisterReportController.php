<?php

namespace App\Http\Controllers\report\payroll;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

            return view("reports.payrolls.payrollregister",compact('payrollid','index'));
            

    }
}
