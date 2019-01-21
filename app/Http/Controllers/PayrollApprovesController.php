<?php

namespace App\Http\Controllers;

use App\Models\Payroll;
use Illuminate\Http\Request;
use App\Events\Payrolls\Approve;

class PayrollApprovesController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }

    public function index()
    {
        return view("payrolls.approves.index");
    }

    public function store(Payroll $payroll)
    {
        // $payroll->update([
        //     "approval_code" => $approvalCode = str_random(),
        //     "send_for_approval_at" => now()
        // ]);

        event(new Approve($payroll));
    }

    public function update(Payroll $payroll)
    {
        return $payroll;
    }
}
