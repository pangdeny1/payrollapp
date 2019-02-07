<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Payroll;

class PayrollApproved extends Mailable
{
    use Queueable, SerializesModels;

    public $payroll;

    public function __construct(Payroll $payroll)
    {
        $this->payroll = $payroll;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->markdown('emails.payrolls.approves')
            ->attachFromStorage("emails\attachments\payrolls", 'file.pdf', [
                'mime' => 'application/pdf'
            ]);
    }

/*
     public function build()
    {
        return $this
            ->markdown('emails.payrolls.approves')
            ->attachFromStorage('emails/attachments/payrolls', 'file.pdf', [
                'mime' => 'application/pdf'
            ]);;
    }
    */
}
