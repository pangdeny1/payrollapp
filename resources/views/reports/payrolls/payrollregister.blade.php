<?php
header('Content-Type: application/vnd.ms-excel');
        header("Content-Disposition: attachment; filename=\"Payroll Report".$payroll->payrolldesc.".xls\"");

        ?>
  <title>Payroll register  </title>
  </head>
  <style type="text/css">
table {
  margin-top: 0.5em;
}

thead {
  background-color: #eeeeee;
}

tbody {
  background-color: #ffffee;
}

th,td {
  padding: 3pt;
}

table.collapse {
  border-collapse: collapse;

}

table.collapse td {

}
</style>



<table class="collapse" width='90%' align="center" border="1">
  <thead>

     <tr> <td colspan="20"><center>Payroll Register Report</center></td>
    </tr>
    <tr> <td colspan="20"><center>{{$company->coyname}}</center></td>
    </tr>
    <tr>

      <td colspan="20"><center>Period :: {{  $payroll->payrolldesc }} </center></td>
    </tr>



    <tr bgcolor='#4F81BD'>

    <th align='left'><font color='white'>No.</font></th>
  <th align='left'><font color='white'>Period</font></th>
  <th align='left'><font color='white'>Code</font></th><th align='left'><font color='white'>Employee</font></th>
  <th align='right'><font color='white'>Reg Days</font></th>
  <th align='right'><font color='white'>Rate Per Day</font></th>
  <th align='right'><font color='white'>Basic</font></th>
  <th align='right'><font color='white'>Basic Areas</font></th>

  @foreach(\App\Models\Prlothintransaction::where('payroll_id',$payrollid)->groupby('othinc_id')->get() as $income)
  <th align='right'><font color='white'> @foreach(\App\Models\Prlothinctype::where('id',$income->othinc_id)->get() as $inc) {{$inc->incomedesc}} @endforeach</font></th>
  @endforeach

  <th align='right'><font color='white'>Gross</font></th>
   @foreach(\App\Models\Prlothdedtransaction::where('payroll_id',$payrollid)->groupby('othded_id')->get() as $deduction)
  <th align='right'><font color='white'>@foreach(\App\Models\Prlothdedctype::where('id',$deduction->othded_id)->get() as $ded) {{$ded->othincdesc }} @endforeach</font></th>
  @endforeach

 @foreach(\App\Models\Prlloantransaction::where('payroll_id',$payrollid)->groupby('loantype_id')->get() as $loan)
  <th align='right'><font color='white'> @foreach(\App\Models\Prlloantype::where('id',$loan->loantype_id)->get() as $loantype) {{$loantype->loantypedesc}} @endforeach</font></th>
  @endforeach
  <th align='right'><font color='white'>Taxable Earning</font></th> 
  
  
  <th align='right'><font color='white'>PAYE</font></th>

    <th align='right'><font color='white'>Net Pay</font></th>
 

    
     
     
    </tr>
    </thread>
    <tbody>


@foreach(\App\Prltransaction::where('payroll_id',$payrollid)->get() as $payroll)

   <tr>
    <td>{{$index++}}</td>
     <td align='right'> {{$payroll->payrollperiod->payrolldesc}} </td>
      <td align='right'>{{$payroll->employee_id}}</td>
    <td align='right'> {{$payroll->employee->full_name}} </td>
    
   
    <td align='right'>{{$payroll->reg_hours }}</td>
      <td align='right'>{{$payroll->hourly_rate }}</td>
    <td>{{number_format($payroll->basicpay,2)}}</td>
    <td>Areas</td>

    @foreach(\App\Models\Prlothintransaction::where('payroll_id',$payrollid)->groupby('othinc_id')->get() as $income)
  <td align='right'>

    
    {{number_format(getIncome($payroll->employee_id,$payroll->payroll_id,$income->othinc_id),2)}}</td>
  @endforeach


    <td align='right'>{{number_format($payroll->grosspay,2)}}</td>
   
 
    @foreach(\App\Models\Prlothdedtransaction::where('payroll_id',$payrollid)->groupby('othded_id')->get() as $deduction)
   <td align='right'> {{number_format(getDeduction($payroll->employee_id,$payroll->payroll_id,$deduction->othded_id),2)}}</td>
  @endforeach

     @foreach(\App\Models\Prlloantransaction::where('payroll_id',$payrollid)->groupby('loantype_id')->get() as $loan)
      <td align='right'> {{number_format(getLoan($payroll->employee_id,$payroll->payroll_id,$loan->loantype_id),2)}}</td>
      @endforeach

   
    


    
    <td align='right'>{{number_format($payroll->taxable_income,2)}}</td>
     <td align='right'>{{number_format($payroll->tax,2)}}</td>
   
   
    <td align='right'> {{number_format($payroll->netpay,2)}} </td> 
    <td align='right'></td> 
     <td align='right'></td> 
    
    <td align='right'></td>
     <td align='right'></td> 
   </tr>
     @endforeach



    <tr bgcolor='#4F81BD'><th colspan='6' ><font color='white'>TOTAL</th>

    <th align='right'><font color='white'>{{number_format($payroll->sum("basicpay"),2)}}</th>
    <th align='right'><font color='white'>areas</th>
        @foreach(\App\Models\Prlothintransaction::where('payroll_id',$payrollid)->groupby('othinc_id')->get() as $income)
 <th align='right'><font color='white'>
    {{number_format(getIncomeTotal($income->payroll_id,$income->othinc_id),2)}}</td>
  @endforeach
   <th align='right'><font color='white'>{{number_format($payroll->sum("grosspay"),2)}}</th>


    @foreach(\App\Models\Prlothdedtransaction::where('payroll_id',$payrollid)->groupby('othded_id')->get() as $deduction)
   <th align='right'><font color='white'>{{number_format(getDeductionTotal($deduction->payroll_id,$deduction->othded_id),2)}}</font></th>
  @endforeach

     @foreach(\App\Models\Prlloantransaction::where('payroll_id',$payrollid)->groupby('loantype_id')->get() as $loan)
     <th align='right'><font color='white'>{{number_format(getLoanTotal($loan->payroll_id,$loan->loantype_id),2)}}</font></th>
      @endforeach
    
   <th align='right'><font color='white'>{{number_format($payroll->sum('taxable_income'),2)}}</font></th>
     <th align='right'><font color='white'>{{number_format($payroll->sum('tax'),2)}}</font></th>
<th align='right'><font color='white'>{{number_format($payroll->sum("netpay"),2)}}</font></th>
   


     </tbody>
  </table>