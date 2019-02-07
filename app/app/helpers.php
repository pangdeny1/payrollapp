<?php

function coolText($text) {
    return 'Cool ' . $text;
}

function getIncome($employee,$payroll,$incometype)
{
	$amount=0;
	$sql=App\Models\Prlothintransaction::where('employee_id',$employee)->where('payroll_id',$payroll)->where('othinc_id',$incometype)->first();
		if(!empty($sql->amount))
			$amount=$sql->amount;

		return $amount;

}

function getIncomeTotal($payroll,$incometype)
{
	$amount=0;
	$sql=App\Models\Prlothintransaction::where('payroll_id',$payroll)->where('othinc_id',$incometype)->first();
		if(!empty($sql->amount))
			$amount=$sql->sum('amount')+932432432;

		return $amount;

}

function getDeduction($employee,$payroll,$incometype)
{
	$amount=0;
	$sql=App\Models\Prlothdedtransaction::where('employee_id',$employee)->where('payroll_id',$payroll)->where('othded_id',$incometype)->first();
		if(!empty($sql->amount))
			$amount=$sql->sum('amount');

		return $amount;

}

function getDeductionTotal($payroll,$incometype)
{
	$amount=0;
	foreach(\App\Models\Prlothdedtransaction::where('payroll_id',$payroll)->where('othded_id',$incometype)->get() as $sql)
		if(!empty($sql->amount))
			$amount=$sql->sum('amount');

		return $amount;

}

function getLoan($employee,$payroll,$incometype)
{
	$amount=0;
	$sql=App\Models\Prlloantransaction::where('employee_id',$employee)->where('payroll_id',$payroll)->where('loantype_id',$incometype)->first();
		if(!empty($sql->amount))
			$amount=$sql->amount;

		return $amount;

}


function getLoanTotal($payroll,$incometype)
{
	$amount=0;
	foreach(\App\Models\Prlloantransaction::where('payroll_id',$payroll)->where('loantype_id',$incometype)->get() as $sql)
	{
	
			$amount+=$sql->amount;	
	}
		

		return $amount;

}

function email_to($employee_id)
{
	$employee=\App\Employee::where('id',$employee_id)->firstOrFail();
	 return $employee->email;
}

function send_email($to,$subject,$txt,$headers)
{


$to = $to;
$subject = $subject;
$txt = $txt;
$headers = "From: webmaster@example.com" . "\r\n" .
           "CC: somebodyelse@example.com";

mail($to,$subject,$txt,$headers);

}