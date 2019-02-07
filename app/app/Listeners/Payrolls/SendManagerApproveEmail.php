<?php

namespace App\Listeners\Payrolls;

use App\Events\Payrolls\Approve;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\PayrollApproved;

class SendManagerApproveEmail
{
    public function __construct()
    {
        //
    }

    public function handle(Approve $event)
    {
        //dd($event->payroll);
        Mail::to($this->user())->send(new PayrollApproved($event->payroll));
    }

    public function user()
    {
        return "pangdeny@gmail.com";
    }
}
