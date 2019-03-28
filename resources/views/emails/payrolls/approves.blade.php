@component('mail::message')
# {{$payroll->payrollid }} Payroll approval

The body of your message.

@component('mail::button', ['url' => route("payrolls.approves.update", $payroll)])
Approve payroll
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
