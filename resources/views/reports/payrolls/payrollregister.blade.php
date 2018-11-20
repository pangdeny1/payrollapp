<head>
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
    <tr> <td colspan="20"><center>Company Name</center></td>
    </tr>
    <tr>

      <td colspan="20"><center>Payroll Report ::{{$payrollid}} </center></td>
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
  <th align='right'><font color='white'>{{optional($income->incometype)->othincdesc}}</font></th>
  @endforeach

  <th align='right'><font color='white'>Gross</font></th>
   @foreach(\App\Models\Prlothdedtransaction::where('payroll_id',$payrollid)->get() as $deduction)
  <th align='right'><font color='white'>Deduction</font></th>
  @endforeach

 
  <th align='right'><font color='white'>NHIF Employee</font></th>
  <th align='right'><font color='white'>Taxable Earning</font></th> 
  
  
  <th align='right'><font color='white'>PAYE</font></th>

    <th align='right'><font color='white'>Net Pay</font></th>
  
  <th align='right'><font color='white'>Social Security Employer Contr</th>
  <th align='right'><font color='white'>SDL</th>
  <th align='right'><font color='white'>WCF</th>
  <th align='right'><font color='white'>NHIF Employer</th></tr></thead><tbody>

    
     
     
    </tr>
    </thread>
    <tbody>


@foreach(\App\Prltransaction::where('payroll_id',$payrollid)->get() as $payroll)

   <tr>
    <td>{{$index++}}</td>
     <td align='right'> {{$payroll->payrollperiod->payrolldesc}} </td>
      <td align='right'></td>
    <td align='right'> {{$payroll->employee->full_name}} </td>
    
   
    <td align='right'></td>
      <td align='right'></td>
    <td>{{number_format($payroll->basicpay,2)}}</td>

    @foreach(\App\Models\Prlothinfile::where('payroll_id',$payrollid)->get() as $income)
  <th align='right'><font color='white'>Incomes</font></th>
  @endforeach
    <td>{{number_format($payroll->basicpay,2)}}</td>
   

  
    

   
       <td align='right'></td> 


    
    <td align='right'>{{number_format($payroll->taxable_income,2)}}</td>
     <td align='right'>{{number_format($payroll->tax,2)}}</td>
   
   
    <td align='right'> {{number_format($payroll->netpay,2)}} </td> 
    <td align='right'></td> 
     <td align='right'></td> 
    
    <td align='right'></td>
     <td align='right'></td> 
   </tr>
     @endforeach



    <tr bgcolor='#4F81BD'><th colspan='3' ><font color='white'>TOTAL</th>

    <th align='right'><font color='white'>{{number_format($payroll->sum("basicpay"),2)}}</th>
    <th align='right'><font color='white'></th>
   <th align='right'><font color='white'>{{number_format($payroll->sum("grosspay"),2)}}</th>
     @foreach(\App\Models\Prlothdedfile::where('payroll_id',$payrollid)->get() as $deduction)
  <th align='right'><font color='white'>Deduction</font></th>
  @endforeach
    <th align='right'><font color='white'></th>
    <th align='right'><font color='white'></th>
  
    <th align='right'><font color='white'></th>
  
    <th align='right'><font color='white'></th>
    <th align='right'><font color='white'></th>
    
    
    <th align='right'><font color='white'></th>
<th align='right'><font color='white'>{{number_format($payroll->sum("netpay"),2)}}</th>
    <th align='right'><font color='white'></th>
    
    <th align='right'><font color='white'></th><th align='right'>
    <font color='white'>></th>
    <th align='right'><font color='white'></th></tr>
    


     </tbody>
  </table>