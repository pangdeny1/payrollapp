<html>

<head>
<meta http-equiv=Content-Type content="text/html; charset=windows-1252">
<meta name=Generator content="Microsoft Word 15 (filtered)">
<title>Payslip</title>
<style>
<!--
 /* Font Definitions */
 @font-face
  {font-family:Wingdings;
  panose-1:5 0 0 0 0 0 0 0 0 0;}
@font-face
  {font-family:"Cambria Math";
  panose-1:2 4 5 3 5 4 6 3 2 4;}
@font-face
  {font-family:Tahoma;
  panose-1:2 11 6 4 3 5 4 4 2 4;}
@font-face
  {font-family:"Arial \(W1\)";}
@font-face
  {font-family:"Arial Black";
  panose-1:2 11 10 4 2 1 2 2 2 4;}
 /* Style Definitions */
 p.MsoNormal, li.MsoNormal, div.MsoNormal
  {margin:0in;
  margin-bottom:.0001pt;
  font-size:12.0pt;
  font-family:"Times New Roman",serif;}
p.MsoCommentText, li.MsoCommentText, div.MsoCommentText
  {margin:0in;
  margin-bottom:.0001pt;
  font-size:10.0pt;
  font-family:"Times New Roman",serif;}
p.MsoHeader, li.MsoHeader, div.MsoHeader
  {margin:0in;
  margin-bottom:.0001pt;
  font-size:12.0pt;
  font-family:"Times New Roman",serif;}
p.MsoFooter, li.MsoFooter, div.MsoFooter
  {margin:0in;
  margin-bottom:.0001pt;
  font-size:12.0pt;
  font-family:"Times New Roman",serif;}
p.MsoDocumentMap, li.MsoDocumentMap, div.MsoDocumentMap
  {margin:0in;
  margin-bottom:.0001pt;
  background:navy;
  font-size:10.0pt;
  font-family:"Tahoma",sans-serif;}
p.MsoCommentSubject, li.MsoCommentSubject, div.MsoCommentSubject
  {margin:0in;
  margin-bottom:.0001pt;
  font-size:10.0pt;
  font-family:"Times New Roman",serif;
  font-weight:bold;}
p.MsoAcetate, li.MsoAcetate, div.MsoAcetate
  {margin:0in;
  margin-bottom:.0001pt;
  font-size:8.0pt;
  font-family:"Tahoma",sans-serif;}
p.Default, li.Default, div.Default
  {mso-style-name:Default;
  margin:0in;
  margin-bottom:.0001pt;
  text-autospace:none;
  font-size:12.0pt;
  font-family:"Arial Black",sans-serif;
  color:black;}
 /* Page Definitions */
 @page WordSection1
  {size:595.3pt 841.9pt;
  margin:53.95pt 63.35pt 35.95pt 1.0in;}
div.WordSection1
  {page:WordSection1;}
 /* List Definitions */
 ol
  {margin-bottom:0in;}
ul
  {margin-bottom:0in;}
-->
</style>

</head>

<body lang=EN-CA>

<div class=WordSection1>

<p class=MsoNormal align=center style='margin-left:3.5pt;text-align:center;
text-autospace:none'><b><u><span lang=EN-AU style='font-size:14.0pt;font-family:
"Arial (W1)",sans-serif;color:black'>PAY SLIP</span></u></b></p>

 <div class="mb-3">
                <img class="rounded" src="{{ asset("themes/looper/assets/homev_logo.jpg") }}" alt="" height="50">
            </div>

<p class=MsoNormal align=right style='margin-top:3.0pt;margin-right:7.35pt;
margin-bottom:3.0pt;margin-left:3.4pt;text-align:right;text-autospace:none'><b><span
lang=EN-AU style='font-size:10.0pt;font-family:"Arial (W1)",sans-serif;
color:black'>Date of payment: {{$payroll->enddate}}</span></b></p>

<p class=MsoNormal align=right style='margin-top:3.0pt;margin-right:7.35pt;
margin-bottom:3.0pt;margin-left:3.4pt;text-align:right;text-autospace:none'><b><span
lang=EN-AU style='font-size:10.0pt;font-family:"Arial (W1)",sans-serif;
color:black'>Pay period:{{$payroll->startdate}}</span></b><b><span lang=EN-AU
style='font-size:10.0pt;font-family:"Arial (W1)",sans-serif;color:black'> to </span></b><b><span
lang=EN-AU style='font-size:10.0pt;font-family:"Arial (W1)",sans-serif;
color:black'>{{$payroll->enddate}}</span></b></p>


<p class=MsoNormal align=right style='margin-top:0in;margin-right:0in;
margin-bottom:1.0pt;margin-left:3.5pt;text-align:right;text-autospace:none'><b><span
lang=EN-AU style='font-size:10.0pt;font-family:"Arial (W1)",sans-serif;
color:black'>&nbsp;</span></b></p>

<p class=MsoNormal style='margin-top:3.0pt;margin-right:0in;margin-bottom:1.0pt;
margin-left:3.4pt;text-autospace:none'><span lang=EN-AU style='font-size:10.0pt;
font-family:"Arial (W1)",sans-serif;color:black'>Employee’s name: {{$employee->full_name}}
</span></p>

<p class=MsoNormal style='margin-top:3.0pt;margin-right:0in;margin-bottom:1.0pt;
margin-left:3.4pt;text-autospace:none'><span lang=EN-AU style='font-size:10.0pt;
font-family:"Arial (W1)",sans-serif;color:black'>Employer’s name: {{$company->coyname}}
</span></p>

<p class=MsoNormal style='margin-top:3.0pt;margin-right:0in;margin-bottom:1.0pt;
margin-left:3.4pt;text-autospace:none'><span lang=EN-AU style='font-size:10.0pt;
font-family:"Arial (W1)",sans-serif;color:black'>Job Title:{{optional($employee->job)->jobname}}
</span></p>

<p class=MsoNormal style='margin-top:3.0pt;margin-right:0in;margin-bottom:1.0pt;
margin-left:3.4pt;text-autospace:none'><span lang=EN-AU style='font-size:10.0pt;
font-family:"Arial (W1)",sans-serif;color:black'>Department:
{{optional($employee->department)->departmentname}}
</span></p>

<p class=MsoNormal style='margin-top:3.0pt;margin-right:0in;margin-bottom:1.0pt;
margin-left:3.4pt;text-autospace:none'><span lang=EN-AU style='font-size:10.0pt;
font-family:"Arial (W1)",sans-serif;color:black'>Ordinary hourly rate: {{number_format($employee->hourly_rate,2)}}</span></p>

<p class=MsoNormal style='margin-left:3.5pt;text-autospace:none'><span
lang=EN-AU style='font-size:10.0pt;font-family:"Arial (W1)",sans-serif;
color:black'>&nbsp;</span></p>

<p class=MsoNormal style='margin-left:3.5pt;text-autospace:none'><b><span
lang=EN-AU style='font-size:10.0pt;font-family:"Arial (W1)",sans-serif;
color:black'>Employer Social Security contribution</span></b></p>

<p class=MsoNormal style='margin-top:3.0pt;margin-right:0in;margin-bottom:0in;
margin-left:3.5pt;margin-bottom:.0001pt;text-autospace:none'><span lang=EN-AU
style='font-size:10.0pt;font-family:"Arial (W1)",sans-serif;color:black'>Name
of Fund/Scheme: NSSF
Contribution: Tsh {{number_format($payrolltrasaction->ss_pay,2)}}</span></p>

<p class=MsoNormal style='margin-left:3.5pt;text-autospace:none'><span
lang=EN-AU style='font-size:10.0pt;font-family:"Arial (W1)",sans-serif;
color:black'>&nbsp;</span></p>

<table class=MsoNormalTable border=1 cellspacing=0 cellpadding=0 width=585
 style='width:438.75pt;margin-left:9.0pt;border-collapse:collapse;border:none'>
  <tr style='height:18.85pt'>
  <td width=585 colspan=6 style='width:438.75pt;border:solid #999999 1.0pt;
  border-top:none;background:#F3F3F3;padding:0in 5.4pt 0in 5.4pt;height:13.35pt'>
  <p class=MsoNormal style='margin-left:3.5pt;text-autospace:none'><b><span
  lang=EN-AU style='font-size:10.0pt;font-family:"Arial (W1)",sans-serif;
  color:black'>Incomes</span></b></p>
  </td>
 </tr>
 <tr style='height:18.85pt'>
  <td width=259 colspan=3 style='width:194.5pt;border:solid #999999 1.0pt;
  background:white;padding:0in 5.4pt 0in 5.4pt;height:18.85pt'>
  <p class=MsoNormal style='margin-left:3.5pt;text-autospace:none'><span
  lang=EN-AU style='font-size:10.0pt;font-family:"Arial (W1)",sans-serif;
  color:black'>Basic Pay </span></p>
  </td>
  <td width=101 valign=bottom style='width:1.05in;border:solid #999999 1.0pt;
  border-left:none;background:white;padding:0in 5.4pt 0in 5.4pt;height:18.85pt'>
  <p class=MsoNormal align=right style='margin-left:3.5pt;text-align:right;
  text-autospace:none'><span lang=EN-AU style='font-size:10.0pt;font-family:
  "Arial (W1)",sans-serif;color:black'>{{number_format($payrolltrasaction->reg_hours)}} hrs </span></p>
  </td>
  <td width=132 valign=bottom style='width:98.65pt;border:solid #999999 1.0pt;
  border-left:none;background:white;padding:0in 5.4pt 0in 5.4pt;height:18.85pt'>
  <p class=MsoNormal style='margin-left:3.5pt;text-autospace:none'><span
  lang=EN-AU style='font-size:10.0pt;font-family:"Arial (W1)",sans-serif;
  color:black'>@ {{number_format($payrolltrasaction->hourly_rate)}}</span></p>
  </td>
  <td width=93 valign=bottom style='width:70.0pt;border:solid #999999 1.0pt;
  border-left:none;background:white;padding:0in 5.4pt 0in 5.4pt;height:18.85pt'>
  <p class=MsoNormal style='text-autospace:none'><span lang=EN-AU
  style='font-size:10.0pt;font-family:"Arial (W1)",sans-serif;color:black'>{{number_format($payrolltrasaction->basicpay,2)}}
  </span></p>
  </td>
 </tr>
 @foreach(\App\Models\Prlothintransaction::where('payroll_id',$payroll->id)->where('employee_id',$employee->id)->get() as $income)
   <tr style='height:17.5pt'>
  <td width=492 colspan=5 style='width:368.75pt;border:solid #999999 1.0pt;
  border-top:none;background:white;padding:0in 5.4pt 0in 5.4pt;height:17.5pt'>
  <p class=MsoNormal style='margin-left:3.5pt;text-autospace:none'><b><span
  lang=EN-AU style='font-size:10.0pt;font-family:"Arial (W1)",sans-serif;
  color:black'> {{optional($income->incometype)->othincdesc}} </span></b></p>
  </td>
  <td width=93 valign=bottom style='width:70.0pt;border-top:none;border-left:
  none;border-bottom:solid #999999 1.0pt;border-right:solid #999999 1.0pt;
  background:white;padding:0in 5.4pt 0in 5.4pt;height:17.5pt'>
 <p class=MsoNormal style='text-autospace:none'><span lang=EN-AU
  style='font-size:10.0pt;font-family:"Arial (W1)",sans-serif;color:black'>{{number_format($income->amount,2)}}
  </span></p>
  </td>
 </tr>
 @endforeach
 
 
 
 <tr style='height:19.6pt'>
  <td width=492 colspan=5 style='width:368.75pt;border:solid #999999 1.0pt;
  border-top:none;background:#F3F3F3;padding:0in 5.4pt 0in 5.4pt;height:19.6pt'>
  <p class=MsoNormal align=right style='margin-left:3.5pt;text-align:right;
  text-autospace:none'><b><span lang=EN-AU style='font-size:10.0pt;font-family:
  "Arial (W1)",sans-serif;color:black'>Gross Pay </span></b></p>
  </td>
  <td width=93 valign=bottom style='width:70.0pt;border-top:none;border-left:
  none;border-bottom:solid #999999 1.0pt;border-right:solid #999999 1.0pt;
  background:#F3F3F3;padding:0in 5.4pt 0in 5.4pt;height:19.6pt'>
  <p class=MsoNormal style='text-autospace:none'><b><span lang=EN-AU
  style='font-size:10.0pt;font-family:"Arial (W1)",sans-serif;color:black'>{{number_format($payrolltrasaction->grosspay,2)}}</span></b></p>
  </td>
 </tr>
 <tr style='height:7.75pt'>
  <td width=585 colspan=6 valign=top style='width:438.75pt;border:none;
  border-bottom:solid #999999 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:7.75pt'>
  <p class=MsoNormal style='margin-left:3.5pt;text-autospace:none'><b><span
  lang=EN-AU style='font-size:6.0pt;font-family:"Arial (W1)",sans-serif;
  color:white'>&nbsp;</span></b></p>
  </td>
 </tr>
 <tr style='height:13.35pt'>
  <td width=585 colspan=6 style='width:438.75pt;border:solid #999999 1.0pt;
  border-top:none;background:#F3F3F3;padding:0in 5.4pt 0in 5.4pt;height:13.35pt'>
  <p class=MsoNormal style='margin-left:3.5pt;text-autospace:none'><b><span
  lang=EN-AU style='font-size:10.0pt;font-family:"Arial (W1)",sans-serif;
  color:black'>Deductions</span></b></p>
  </td>
 </tr>
 <tr style='height:17.5pt'>
  <td width=492 colspan=5 style='width:368.75pt;border:solid #999999 1.0pt;
  border-top:none;background:white;padding:0in 5.4pt 0in 5.4pt;height:17.5pt'>
  <p class=MsoNormal style='margin-left:3.5pt;text-autospace:none'><b><span
  lang=EN-AU style='font-size:10.0pt;font-family:"Arial (W1)",sans-serif;
  color:black'>Tax </span></b></p>
  </td>
  <td width=93 valign=bottom style='width:70.0pt;border-top:none;border-left:
  none;border-bottom:solid #999999 1.0pt;border-right:solid #999999 1.0pt;
  background:white;padding:0in 5.4pt 0in 5.4pt;height:17.5pt'>
  <p class=MsoNormal style='text-autospace:none'><span lang=EN-AU
  style='font-size:10.0pt;font-family:"Arial (W1)",sans-serif;color:black'>{{number_format($payrolltrasaction->tax,2)}}</span></p>
  </td>
 </tr>
  <tr style='height:17.5pt'>
  <td width=492 colspan=5 style='width:368.75pt;border:solid #999999 1.0pt;
  border-top:none;background:white;padding:0in 5.4pt 0in 5.4pt;height:17.5pt'>
  <p class=MsoNormal style='margin-left:3.5pt;text-autospace:none'><b><span
  lang=EN-AU style='font-size:10.0pt;font-family:"Arial (W1)",sans-serif;
  color:black'>Social Security ->NSSF</span></b></p>
  </td>
  <td width=93 valign=bottom style='width:70.0pt;border-top:none;border-left:
  none;border-bottom:solid #999999 1.0pt;border-right:solid #999999 1.0pt;
  background:white;padding:0in 5.4pt 0in 5.4pt;height:17.5pt'>
  <p class=MsoNormal style='text-autospace:none'><span lang=EN-AU
  style='font-size:10.0pt;font-family:"Arial (W1)",sans-serif;color:black'>{{number_format($payrolltrasaction->ss_pay,2)}}
  </span></p>
  </td>
 </tr>

  @foreach(\App\Models\Prlothdedtransaction::where('payroll_id',$payroll->id)->where('employee_id',$employee->id)->get() as $deduction)
   <tr style='height:17.5pt'>
  <td width=492 colspan=5 style='width:368.75pt;border:solid #999999 1.0pt;
  border-top:none;background:white;padding:0in 5.4pt 0in 5.4pt;height:17.5pt'>
  <p class=MsoNormal style='margin-left:3.5pt;text-autospace:none'><b><span
  lang=EN-AU style='font-size:10.0pt;font-family:"Arial (W1)",sans-serif;
  color:black'> {{optional($deduction->deductiontype)->othincdesc}} </span></b></p>
  </td>
  <td width=93 valign=bottom style='width:70.0pt;border-top:none;border-left:
  none;border-bottom:solid #999999 1.0pt;border-right:solid #999999 1.0pt;
  background:white;padding:0in 5.4pt 0in 5.4pt;height:17.5pt'>
 <p class=MsoNormal style='text-autospace:none'><span lang=EN-AU
  style='font-size:10.0pt;font-family:"Arial (W1)",sans-serif;color:black'>{{number_format($deduction->amount,2)}}
  </span></p>
  </td>
 </tr>
  @endforeach

  @foreach(\App\Models\Prlloantransaction::where('payroll_id',$payroll->id)->where('employee_id',$employee->id)->get() as $loan)
   <tr style='height:17.5pt'>
  <td width=492 colspan=5 style='width:368.75pt;border:solid #999999 1.0pt;
  border-top:none;background:white;padding:0in 5.4pt 0in 5.4pt;height:17.5pt'>
  <p class=MsoNormal style='margin-left:3.5pt;text-autospace:none'><b><span
  lang=EN-AU style='font-size:10.0pt;font-family:"Arial (W1)",sans-serif;
  color:black'> loan</span></b></p>
  </td>
  <td width=93 valign=bottom style='width:70.0pt;border-top:none;border-left:
  none;border-bottom:solid #999999 1.0pt;border-right:solid #999999 1.0pt;
  background:white;padding:0in 5.4pt 0in 5.4pt;height:17.5pt'>
 <p class=MsoNormal style='text-autospace:none'><span lang=EN-AU
  style='font-size:10.0pt;font-family:"Arial (W1)",sans-serif;color:black'>{{number_format($loan->amount,2)}}
  </span></p>
  </td>
 </tr>

 @endforeach

  @foreach(\App\Models\Prlothdedtransaction::where('payroll_id',$payroll->id)->where('employee_id',$employee->id)->get() as $deduction)
   <tr style='height:17.5pt'>
  <td width=492 colspan=5 style='width:368.75pt;border:solid #999999 1.0pt;
  border-top:none;background:white;padding:0in 5.4pt 0in 5.4pt;height:17.5pt'>
  <p class=MsoNormal style='margin-left:3.5pt;text-autospace:none'><b><span
  lang=EN-AU style='font-size:10.0pt;font-family:"Arial (W1)",sans-serif;
  color:black'> {{optional($deduction->deductiontype)->othincdesc}} </span></b></p>
  </td>
  <td width=93 valign=bottom style='width:70.0pt;border-top:none;border-left:
  none;border-bottom:solid #999999 1.0pt;border-right:solid #999999 1.0pt;
  background:white;padding:0in 5.4pt 0in 5.4pt;height:17.5pt'>
 <p class=MsoNormal style='text-autospace:none'><span lang=EN-AU
  style='font-size:10.0pt;font-family:"Arial (W1)",sans-serif;color:black'>{{number_format($deduction->amount,2)}}
  </span></p>
  </td>
 </tr>
 @endforeach
 
 <tr style='height:19.6pt'>
  <td width=492 colspan=5 style='width:368.75pt;border:solid #999999 1.0pt;
  border-top:none;background:#F3F3F3;padding:0in 5.4pt 0in 5.4pt;height:19.6pt'>
  <p class=MsoNormal align=right style='margin-left:3.5pt;text-align:right;
  text-autospace:none'><b><span lang=EN-AU style='font-size:10.0pt;font-family:
  "Arial (W1)",sans-serif;color:black'>Total deductions </span></b></p>
  </td>
  <td width=93 valign=bottom style='width:70.0pt;border-top:none;border-left:
  none;border-bottom:solid #999999 1.0pt;border-right:solid #999999 1.0pt;
  background:#F3F3F3;padding:0in 5.4pt 0in 5.4pt;height:19.6pt'>
  <p class=MsoNormal style='text-autospace:none'><b><span lang=EN-AU
  style='font-size:10.0pt;font-family:"Arial (W1)",sans-serif;color:black'>{{number_format($payrolltrasaction->total_deduction,2)}}
  </td>
 </tr>
 <tr style='height:19.65pt'>
  <td width=492 colspan=5 style='width:368.75pt;border:solid #999999 1.0pt;
  border-top:none;background:#E6E6E6;padding:0in 5.4pt 0in 5.4pt;height:19.65pt'>
  <p class=MsoNormal align=right style='margin-left:3.5pt;text-align:right;
  text-autospace:none'><b><span lang=EN-AU style='font-size:10.0pt;font-family:
  "Arial (W1)",sans-serif;color:black'>Net pay </span></b></p>
  </td>
  <td width=93 valign=bottom style='width:70.0pt;border-top:none;border-left:
  none;border-bottom:solid #999999 1.0pt;border-right:solid #999999 1.0pt;
  background:#E6E6E6;padding:0in 5.4pt 0in 5.4pt;height:19.65pt'>
  <p class=MsoNormal style='text-autospace:none'><b><span lang=EN-AU
  style='font-size:10.0pt;font-family:"Arial (W1)",sans-serif;color:black'>{{number_format($payrolltrasaction->netpay,2)}}
  </span></b></p>
  </td>
 </tr>
 <tr height=0>
  <td width=173 style='border:none'></td>
  <td width=171 style='border:none'></td>
  <td width=45 style='border:none'></td>
  <td width=151 style='border:none'></td>
  <td width=197 style='border:none'></td>
  <td width=140 style='border:none'></td>
 </tr>
</table>

<p class=MsoNormal style='margin-left:3.5pt'><span lang=EN-AU style='font-size:
6.0pt;font-family:"Arial (W1)",sans-serif'>&nbsp;</span></p>

<p class=MsoNormal style='margin-left:3.5pt'><b><span lang=EN-AU
style='font-size:10.0pt;font-family:"Arial (W1)",sans-serif;color:black'>Note:</span></b><span
lang=EN-AU style='font-size:10.0pt;font-family:"Arial (W1)",sans-serif;
color:black'> Payslips must be issued to employees within one working day of
the day they are paid.</span></p>


</div>

</body>

</html>
