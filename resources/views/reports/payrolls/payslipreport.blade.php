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

<p class=MsoNormal align=center style='margin-left:3.5pt;text-align:center;
text-autospace:none'><b><span lang=EN-AU style='font-size:14.0pt;font-family:
"Arial (W1)",sans-serif;color:black'>&nbsp;</span></b></p>

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
font-family:"Arial (W1)",sans-serif;color:black'>Ordinary hourly rate: {{$employee->hourlyrate}}</span></p>

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
Contribution: Tsh ....</span></p>

<p class=MsoNormal style='margin-left:3.5pt;text-autospace:none'><span
lang=EN-AU style='font-size:10.0pt;font-family:"Arial (W1)",sans-serif;
color:black'>&nbsp;</span></p>

<table class=MsoNormalTable border=1 cellspacing=0 cellpadding=0 width=585
 style='width:438.75pt;margin-left:9.0pt;border-collapse:collapse;border:none'>
 <tr style='height:18.85pt'>
  <td width=259 colspan=3 style='width:194.5pt;border:solid #999999 1.0pt;
  background:white;padding:0in 5.4pt 0in 5.4pt;height:18.85pt'>
  <p class=MsoNormal style='margin-left:3.5pt;text-autospace:none'><span
  lang=EN-AU style='font-size:10.0pt;font-family:"Arial (W1)",sans-serif;
  color:black'>Wages – worked at ordinary hourly rate </span></p>
  </td>
  <td width=101 valign=bottom style='width:1.05in;border:solid #999999 1.0pt;
  border-left:none;background:white;padding:0in 5.4pt 0in 5.4pt;height:18.85pt'>
  <p class=MsoNormal align=right style='margin-left:3.5pt;text-align:right;
  text-autospace:none'><span lang=EN-AU style='font-size:10.0pt;font-family:
  "Arial (W1)",sans-serif;color:black'>..…… hrs </span></p>
  </td>
  <td width=132 valign=bottom style='width:98.65pt;border:solid #999999 1.0pt;
  border-left:none;background:white;padding:0in 5.4pt 0in 5.4pt;height:18.85pt'>
  <p class=MsoNormal style='margin-left:3.5pt;text-autospace:none'><span
  lang=EN-AU style='font-size:10.0pt;font-family:"Arial (W1)",sans-serif;
  color:black'>@ (rate) …………</span></p>
  </td>
  <td width=93 valign=bottom style='width:70.0pt;border:solid #999999 1.0pt;
  border-left:none;background:white;padding:0in 5.4pt 0in 5.4pt;height:18.85pt'>
  <p class=MsoNormal style='text-autospace:none'><span lang=EN-AU
  style='font-size:10.0pt;font-family:"Arial (W1)",sans-serif;color:black'>$............
  . ...</span></p>
  </td>
 </tr>
 <tr style='height:24.65pt'>
  <td width=259 colspan=3 valign=top style='width:194.5pt;border:solid #999999 1.0pt;
  border-top:none;background:white;padding:0in 5.4pt 0in 5.4pt;height:24.65pt'>
  <p class=MsoNormal style='margin-left:3.5pt;text-autospace:none'><span
  lang=EN-AU style='font-size:10.0pt;font-family:"Arial (W1)",sans-serif;
  color:black'>Wages – worked at penalty rate 1 </span></p>
  <p class=MsoNormal style='margin-left:3.5pt;text-autospace:none'><span
  lang=EN-AU style='font-size:8.0pt;font-family:"Arial (W1)",sans-serif;
  color:black'>(i.e. Saturday rate) </span></p>
  </td>
  <td width=101 valign=bottom style='width:1.05in;border-top:none;border-left:
  none;border-bottom:solid #999999 1.0pt;border-right:solid #999999 1.0pt;
  background:white;padding:0in 5.4pt 0in 5.4pt;height:24.65pt'>
  <p class=MsoNormal align=right style='margin-left:3.5pt;text-align:right;
  text-autospace:none'><span lang=EN-AU style='font-size:10.0pt;font-family:
  "Arial (W1)",sans-serif;color:black'>..…… hrs </span></p>
  </td>
  <td width=132 valign=bottom style='width:98.65pt;border-top:none;border-left:
  none;border-bottom:solid #999999 1.0pt;border-right:solid #999999 1.0pt;
  background:white;padding:0in 5.4pt 0in 5.4pt;height:24.65pt'>
  <p class=MsoNormal style='margin-left:3.5pt;text-autospace:none'><span
  lang=EN-AU style='font-size:10.0pt;font-family:"Arial (W1)",sans-serif;
  color:black'>@ (rate) …………</span></p>
  </td>
  <td width=93 valign=bottom style='width:70.0pt;border-top:none;border-left:
  none;border-bottom:solid #999999 1.0pt;border-right:solid #999999 1.0pt;
  background:white;padding:0in 5.4pt 0in 5.4pt;height:24.65pt'>
  <p class=MsoNormal style='text-autospace:none'><span lang=EN-AU
  style='font-size:10.0pt;font-family:"Arial (W1)",sans-serif;color:black'>$............
  . ...</span></p>
  </td>
 </tr>
 <tr style='height:24.6pt'>
  <td width=259 colspan=3 valign=top style='width:194.5pt;border:solid #999999 1.0pt;
  border-top:none;background:white;padding:0in 5.4pt 0in 5.4pt;height:24.6pt'>
  <p class=MsoNormal style='margin-left:3.5pt;text-autospace:none'><span
  lang=EN-AU style='font-size:10.0pt;font-family:"Arial (W1)",sans-serif;
  color:black'>Wages – worked at penalty rate 2 </span></p>
  <p class=MsoNormal style='margin-left:3.5pt;text-autospace:none'><span
  lang=EN-AU style='font-size:8.0pt;font-family:"Arial (W1)",sans-serif;
  color:black'>(i.e. Sunday rate) </span></p>
  </td>
  <td width=101 valign=bottom style='width:1.05in;border-top:none;border-left:
  none;border-bottom:solid #999999 1.0pt;border-right:solid #999999 1.0pt;
  background:white;padding:0in 5.4pt 0in 5.4pt;height:24.6pt'>
  <p class=MsoNormal align=right style='margin-left:3.5pt;text-align:right;
  text-autospace:none'><span lang=EN-AU style='font-size:10.0pt;font-family:
  "Arial (W1)",sans-serif;color:black'> ..…… hrs </span></p>
  </td>
  <td width=132 valign=bottom style='width:98.65pt;border-top:none;border-left:
  none;border-bottom:solid #999999 1.0pt;border-right:solid #999999 1.0pt;
  background:white;padding:0in 5.4pt 0in 5.4pt;height:24.6pt'>
  <p class=MsoNormal style='margin-left:3.5pt;text-autospace:none'><span
  lang=EN-AU style='font-size:10.0pt;font-family:"Arial (W1)",sans-serif;
  color:black'>@ (rate) …………</span></p>
  </td>
  <td width=93 valign=bottom style='width:70.0pt;border-top:none;border-left:
  none;border-bottom:solid #999999 1.0pt;border-right:solid #999999 1.0pt;
  background:white;padding:0in 5.4pt 0in 5.4pt;height:24.6pt'>
  <p class=MsoNormal style='text-autospace:none'><span lang=EN-AU
  style='font-size:10.0pt;font-family:"Arial (W1)",sans-serif;color:black'>$............
  . ...</span></p>
  </td>
 </tr>
 <tr style='height:22.4pt'>
  <td width=259 colspan=3 valign=top style='width:194.5pt;border:solid #999999 1.0pt;
  border-top:none;background:white;padding:0in 5.4pt 0in 5.4pt;height:22.4pt'>
  <p class=MsoNormal style='margin-left:3.5pt;text-autospace:none'><span
  lang=EN-AU style='font-size:10.0pt;font-family:"Arial (W1)",sans-serif;
  color:black'>Wages – worked at penalty rate 3 </span></p>
  <p class=MsoNormal style='margin-left:3.5pt;text-autospace:none'><span
  lang=EN-AU style='font-size:8.0pt;font-family:"Arial (W1)",sans-serif;
  color:black'>(i.e. public holiday rate) </span></p>
  </td>
  <td width=101 valign=bottom style='width:1.05in;border-top:none;border-left:
  none;border-bottom:solid #999999 1.0pt;border-right:solid #999999 1.0pt;
  background:white;padding:0in 5.4pt 0in 5.4pt;height:22.4pt'>
  <p class=MsoNormal align=right style='margin-left:3.5pt;text-align:right;
  text-autospace:none'><span lang=EN-AU style='font-size:10.0pt;font-family:
  "Arial (W1)",sans-serif;color:black'>..…… hrs </span></p>
  </td>
  <td width=132 valign=bottom style='width:98.65pt;border-top:none;border-left:
  none;border-bottom:solid #999999 1.0pt;border-right:solid #999999 1.0pt;
  background:white;padding:0in 5.4pt 0in 5.4pt;height:22.4pt'>
  <p class=MsoNormal style='margin-left:3.5pt;text-autospace:none'><span
  lang=EN-AU style='font-size:10.0pt;font-family:"Arial (W1)",sans-serif;
  color:black'>@ (rate) …………</span></p>
  </td>
  <td width=93 valign=bottom style='width:70.0pt;border-top:none;border-left:
  none;border-bottom:solid #999999 1.0pt;border-right:solid #999999 1.0pt;
  background:white;padding:0in 5.4pt 0in 5.4pt;height:22.4pt'>
  <p class=MsoNormal style='text-autospace:none'><span lang=EN-AU
  style='font-size:10.0pt;font-family:"Arial (W1)",sans-serif;color:black'>$............
  . ...</span></p>
  </td>
 </tr>
 <tr style='height:15.45pt'>
  <td width=259 colspan=3 rowspan=3 valign=top style='width:194.5pt;border:
  solid #999999 1.0pt;border-top:none;background:white;padding:0in 5.4pt 0in 5.4pt;
  height:15.45pt'>
  <p class=MsoNormal style='margin-left:3.5pt;text-autospace:none'><span
  lang=EN-AU style='font-size:10.0pt;font-family:"Arial (W1)",sans-serif;
  color:black'>Overtime </span></p>
  </td>
  <td width=101 valign=bottom style='width:1.05in;border-top:none;border-left:
  none;border-bottom:solid #999999 1.0pt;border-right:solid #999999 1.0pt;
  background:white;padding:0in 5.4pt 0in 5.4pt;height:15.45pt'>
  <p class=MsoNormal align=right style='margin-left:3.5pt;text-align:right;
  text-autospace:none'><span lang=EN-AU style='font-size:10.0pt;font-family:
  "Arial (W1)",sans-serif;color:black'>..…… hrs </span></p>
  </td>
  <td width=132 valign=bottom style='width:98.65pt;border-top:none;border-left:
  none;border-bottom:solid #999999 1.0pt;border-right:solid #999999 1.0pt;
  background:white;padding:0in 5.4pt 0in 5.4pt;height:15.45pt'>
  <p class=MsoNormal style='margin-left:3.5pt;text-autospace:none'><span
  lang=EN-AU style='font-size:10.0pt;font-family:"Arial (W1)",sans-serif;
  color:black'>@ (rate) …………</span></p>
  </td>
  <td width=93 valign=bottom style='width:70.0pt;border-top:none;border-left:
  none;border-bottom:solid #999999 1.0pt;border-right:solid #999999 1.0pt;
  background:white;padding:0in 5.4pt 0in 5.4pt;height:15.45pt'>
  <p class=MsoNormal style='text-autospace:none'><span lang=EN-AU
  style='font-size:10.0pt;font-family:"Arial (W1)",sans-serif;color:black'>$............
  . ...</span></p>
  </td>
 </tr>
 <tr style='height:15.4pt'>
  <td width=101 valign=bottom style='width:1.05in;border-top:none;border-left:
  none;border-bottom:solid #999999 1.0pt;border-right:solid #999999 1.0pt;
  background:white;padding:0in 5.4pt 0in 5.4pt;height:15.4pt'>
  <p class=MsoNormal align=right style='margin-left:3.5pt;text-align:right;
  text-autospace:none'><span lang=EN-AU style='font-size:10.0pt;font-family:
  "Arial (W1)",sans-serif;color:black'>..…… hrs</span></p>
  </td>
  <td width=132 valign=bottom style='width:98.65pt;border-top:none;border-left:
  none;border-bottom:solid #999999 1.0pt;border-right:solid #999999 1.0pt;
  background:white;padding:0in 5.4pt 0in 5.4pt;height:15.4pt'>
  <p class=MsoNormal style='margin-left:3.5pt;text-autospace:none'><span
  lang=EN-AU style='font-size:10.0pt;font-family:"Arial (W1)",sans-serif;
  color:black'>@ (rate) …………</span></p>
  </td>
  <td width=93 valign=bottom style='width:70.0pt;border-top:none;border-left:
  none;border-bottom:solid #999999 1.0pt;border-right:solid #999999 1.0pt;
  background:white;padding:0in 5.4pt 0in 5.4pt;height:15.4pt'>
  <p class=MsoNormal style='text-autospace:none'><span lang=EN-AU
  style='font-size:10.0pt;font-family:"Arial (W1)",sans-serif;color:black'>$............
  . ...</span></p>
  </td>
 </tr>
 <tr style='height:14.75pt'>
  <td width=101 valign=bottom style='width:1.05in;border-top:none;border-left:
  none;border-bottom:solid #999999 1.0pt;border-right:solid #999999 1.0pt;
  background:white;padding:0in 5.4pt 0in 5.4pt;height:14.75pt'>
  <p class=MsoNormal align=right style='margin-left:3.5pt;text-align:right;
  text-autospace:none'><span lang=EN-AU style='font-size:10.0pt;font-family:
  "Arial (W1)",sans-serif;color:black'>..…… hrs</span></p>
  </td>
  <td width=132 valign=bottom style='width:98.65pt;border-top:none;border-left:
  none;border-bottom:solid #999999 1.0pt;border-right:solid #999999 1.0pt;
  background:white;padding:0in 5.4pt 0in 5.4pt;height:14.75pt'>
  <p class=MsoNormal style='margin-left:3.5pt;text-autospace:none'><span
  lang=EN-AU style='font-size:10.0pt;font-family:"Arial (W1)",sans-serif;
  color:black'>@ (rate) …………</span></p>
  </td>
  <td width=93 valign=bottom style='width:70.0pt;border-top:none;border-left:
  none;border-bottom:solid #999999 1.0pt;border-right:solid #999999 1.0pt;
  background:white;padding:0in 5.4pt 0in 5.4pt;height:14.75pt'>
  <p class=MsoNormal style='text-autospace:none'><span lang=EN-AU
  style='font-size:10.0pt;font-family:"Arial (W1)",sans-serif;color:black'>$............
  . ...</span></p>
  </td>
 </tr>
 <tr style='height:14.05pt'>
  <td width=259 colspan=3 valign=top style='width:194.5pt;border:solid #999999 1.0pt;
  border-top:none;background:white;padding:0in 5.4pt 0in 5.4pt;height:14.05pt'>
  <p class=MsoNormal style='margin-left:3.5pt;text-autospace:none'><span
  lang=EN-AU style='font-size:10.0pt;font-family:"Arial (W1)",sans-serif;
  color:black'>Shift loading </span></p>
  </td>
  <td width=101 valign=bottom style='width:1.05in;border-top:none;border-left:
  none;border-bottom:solid #999999 1.0pt;border-right:solid #999999 1.0pt;
  background:white;padding:0in 5.4pt 0in 5.4pt;height:14.05pt'>
  <p class=MsoNormal align=right style='margin-left:3.5pt;text-align:right;
  text-autospace:none'><span lang=EN-AU style='font-size:10.0pt;font-family:
  "Arial (W1)",sans-serif;color:black'>..…… hrs</span></p>
  </td>
  <td width=132 valign=bottom style='width:98.65pt;border-top:none;border-left:
  none;border-bottom:solid #999999 1.0pt;border-right:solid #999999 1.0pt;
  background:white;padding:0in 5.4pt 0in 5.4pt;height:14.05pt'>
  <p class=MsoNormal style='margin-left:3.5pt;text-autospace:none'><span
  lang=EN-AU style='font-size:10.0pt;font-family:"Arial (W1)",sans-serif;
  color:black'>@ (rate) …………</span></p>
  </td>
  <td width=93 valign=bottom style='width:70.0pt;border-top:none;border-left:
  none;border-bottom:solid #999999 1.0pt;border-right:solid #999999 1.0pt;
  background:white;padding:0in 5.4pt 0in 5.4pt;height:14.05pt'>
  <p class=MsoNormal style='text-autospace:none'><span lang=EN-AU
  style='font-size:10.0pt;font-family:"Arial (W1)",sans-serif;color:black'>$............
  . ...</span></p>
  </td>
 </tr>
 <tr style='height:14.05pt'>
  <td width=115 style='width:1.2in;border:solid #999999 1.0pt;border-top:none;
  background:white;padding:0in 5.4pt 0in 5.4pt;height:14.05pt'>
  <p class=MsoNormal style='margin-left:3.5pt;text-autospace:none'><span
  lang=EN-AU style='font-size:10.0pt;font-family:"Arial (W1)",sans-serif;
  color:black'>Other loading </span></p>
  </td>
  <td width=144 colspan=2 style='width:108.1pt;border-top:none;border-left:
  none;border-bottom:solid #999999 1.0pt;border-right:solid #999999 1.0pt;
  background:white;padding:0in 5.4pt 0in 5.4pt;height:14.05pt'>
  <p class=MsoNormal style='margin-left:3.5pt;text-autospace:none'><span
  lang=EN-AU style='font-size:10.0pt;font-family:"Arial (W1)",sans-serif;
  color:black'>Type:</span></p>
  </td>
  <td width=101 valign=bottom style='width:1.05in;border-top:none;border-left:
  none;border-bottom:solid #999999 1.0pt;border-right:solid #999999 1.0pt;
  background:white;padding:0in 5.4pt 0in 5.4pt;height:14.05pt'>
  <p class=MsoNormal align=right style='margin-left:3.5pt;text-align:right;
  text-autospace:none'><span lang=EN-AU style='font-size:10.0pt;font-family:
  "Arial (W1)",sans-serif;color:black'>..…… hrs</span></p>
  </td>
  <td width=132 valign=bottom style='width:98.65pt;border-top:none;border-left:
  none;border-bottom:solid #999999 1.0pt;border-right:solid #999999 1.0pt;
  background:white;padding:0in 5.4pt 0in 5.4pt;height:14.05pt'>
  <p class=MsoNormal style='margin-left:3.5pt;text-autospace:none'><span
  lang=EN-AU style='font-size:10.0pt;font-family:"Arial (W1)",sans-serif;
  color:black'>@ (rate) …………</span></p>
  </td>
  <td width=93 valign=bottom style='width:70.0pt;border-top:none;border-left:
  none;border-bottom:solid #999999 1.0pt;border-right:solid #999999 1.0pt;
  background:white;padding:0in 5.4pt 0in 5.4pt;height:14.05pt'>
  <p class=MsoNormal style='text-autospace:none'><span lang=EN-AU
  style='font-size:10.0pt;font-family:"Arial (W1)",sans-serif;color:black'>$............
  . ...</span></p>
  </td>
 </tr>
 <tr style='height:24.6pt'>
  <td width=115 valign=top style='width:1.2in;border:solid #999999 1.0pt;
  border-top:none;background:white;padding:0in 5.4pt 0in 5.4pt;height:24.6pt'>
  <p class=MsoNormal style='margin-left:3.5pt;text-autospace:none'><span
  lang=EN-AU style='font-size:10.0pt;font-family:"Arial (W1)",sans-serif;
  color:black'>Monetary allowance </span></p>
  </td>
  <td width=376 colspan=4 valign=top style='width:282.35pt;border-top:none;
  border-left:none;border-bottom:solid #999999 1.0pt;border-right:solid #999999 1.0pt;
  background:white;padding:0in 5.4pt 0in 5.4pt;height:24.6pt'>
  <p class=MsoNormal style='margin-left:3.5pt;text-autospace:none'><span
  lang=EN-AU style='font-size:10.0pt;font-family:"Arial (W1)",sans-serif;
  color:black'>Type: </span></p>
  </td>
  <td width=93 valign=bottom style='width:70.0pt;border-top:none;border-left:
  none;border-bottom:solid #999999 1.0pt;border-right:solid #999999 1.0pt;
  background:white;padding:0in 5.4pt 0in 5.4pt;height:24.6pt'>
  <p class=MsoNormal style='text-autospace:none'><span lang=EN-AU
  style='font-size:10.0pt;font-family:"Arial (W1)",sans-serif;color:black'>$............
  . ...</span></p>
  </td>
 </tr>
 <tr style='height:24.65pt'>
  <td width=115 valign=top style='width:1.2in;border:solid #999999 1.0pt;
  border-top:none;background:white;padding:0in 5.4pt 0in 5.4pt;height:24.65pt'>
  <p class=MsoNormal style='margin-left:3.5pt;text-autospace:none'><span
  lang=EN-AU style='font-size:10.0pt;font-family:"Arial (W1)",sans-serif;
  color:black'>Incentive based payment </span></p>
  </td>
  <td width=376 colspan=4 valign=top style='width:282.35pt;border-top:none;
  border-left:none;border-bottom:solid #999999 1.0pt;border-right:solid #999999 1.0pt;
  background:white;padding:0in 5.4pt 0in 5.4pt;height:24.65pt'>
  <p class=MsoNormal style='margin-left:3.5pt;text-autospace:none'><span
  lang=EN-AU style='font-size:10.0pt;font-family:"Arial (W1)",sans-serif;
  color:black'>Type: </span></p>
  </td>
  <td width=93 valign=bottom style='width:70.0pt;border-top:none;border-left:
  none;border-bottom:solid #999999 1.0pt;border-right:solid #999999 1.0pt;
  background:white;padding:0in 5.4pt 0in 5.4pt;height:24.65pt'>
  <p class=MsoNormal style='text-autospace:none'><span lang=EN-AU
  style='font-size:10.0pt;font-family:"Arial (W1)",sans-serif;color:black'>$............
  . ...</span></p>
  </td>
 </tr>
 <tr style='height:13.15pt'>
  <td width=115 valign=top style='width:1.2in;border:solid #999999 1.0pt;
  border-top:none;background:white;padding:0in 5.4pt 0in 5.4pt;height:13.15pt'>
  <p class=MsoNormal style='margin-left:3.5pt;text-autospace:none'><span
  lang=EN-AU style='font-size:10.0pt;font-family:"Arial (W1)",sans-serif;
  color:black'>Bonus </span></p>
  </td>
  <td width=376 colspan=4 valign=top style='width:282.35pt;border-top:none;
  border-left:none;border-bottom:solid #999999 1.0pt;border-right:solid #999999 1.0pt;
  background:white;padding:0in 5.4pt 0in 5.4pt;height:13.15pt'>
  <p class=MsoNormal style='margin-left:3.5pt;text-autospace:none'><span
  lang=EN-AU style='font-size:10.0pt;font-family:"Arial (W1)",sans-serif;
  color:black'>Type: </span></p>
  </td>
  <td width=93 valign=bottom style='width:70.0pt;border-top:none;border-left:
  none;border-bottom:solid #999999 1.0pt;border-right:solid #999999 1.0pt;
  background:white;padding:0in 5.4pt 0in 5.4pt;height:13.15pt'>
  <p class=MsoNormal style='text-autospace:none'><span lang=EN-AU
  style='font-size:10.0pt;font-family:"Arial (W1)",sans-serif;color:black'>$............
  . ...</span></p>
  </td>
 </tr>
 <tr style='height:24.65pt'>
  <td width=115 valign=top style='width:1.2in;border:solid #999999 1.0pt;
  border-top:none;background:white;padding:0in 5.4pt 0in 5.4pt;height:24.65pt'>
  <p class=MsoNormal style='margin-left:3.5pt;text-autospace:none'><span
  lang=EN-AU style='font-size:10.0pt;font-family:"Arial (W1)",sans-serif;
  color:black'>Other payments</span></p>
  </td>
  <td width=376 colspan=4 valign=top style='width:282.35pt;border-top:none;
  border-left:none;border-bottom:solid #999999 1.0pt;border-right:solid #999999 1.0pt;
  background:white;padding:0in 5.4pt 0in 5.4pt;height:24.65pt'>
  <p class=MsoNormal style='margin-left:3.5pt;text-autospace:none'><span
  lang=EN-AU style='font-size:10.0pt;font-family:"Arial (W1)",sans-serif;
  color:black'>Type:</span></p>
  </td>
  <td width=93 valign=bottom style='width:70.0pt;border-top:none;border-left:
  none;border-bottom:solid #999999 1.0pt;border-right:solid #999999 1.0pt;
  background:white;padding:0in 5.4pt 0in 5.4pt;height:24.65pt'>
  <p class=MsoNormal style='text-autospace:none'><span lang=EN-AU
  style='font-size:10.0pt;font-family:"Arial (W1)",sans-serif;color:black'>$............
  . ...</span></p>
  </td>
 </tr>
 <tr style='height:24.65pt'>
  <td width=115 valign=top style='width:1.2in;border:solid #999999 1.0pt;
  border-top:none;background:white;padding:0in 5.4pt 0in 5.4pt;height:24.65pt'>
  <p class=MsoNormal style='margin-left:3.5pt;text-autospace:none'><span
  lang=EN-AU style='font-size:10.0pt;font-family:"Arial (W1)",sans-serif;
  color:black'>Termination entitlements</span></p>
  </td>
  <td width=376 colspan=4 valign=top style='width:282.35pt;border-top:none;
  border-left:none;border-bottom:solid #999999 1.0pt;border-right:solid #999999 1.0pt;
  background:white;padding:0in 5.4pt 0in 5.4pt;height:24.65pt'>
  <p class=MsoNormal style='margin-left:3.5pt;text-autospace:none'><span
  lang=EN-AU style='font-size:10.0pt;font-family:"Arial (W1)",sans-serif;
  color:black'>Details </span><span lang=EN-AU style='font-size:7.0pt;
  font-family:"Arial (W1)",sans-serif;color:black'>(including notice,
  redundancy, accrued leave, etc)*</span><span lang=EN-AU style='font-size:
  10.0pt;font-family:"Arial (W1)",sans-serif;color:black'> </span></p>
  </td>
  <td width=93 valign=bottom style='width:70.0pt;border-top:none;border-left:
  none;border-bottom:solid #999999 1.0pt;border-right:solid #999999 1.0pt;
  background:white;padding:0in 5.4pt 0in 5.4pt;height:24.65pt'>
  <p class=MsoNormal style='text-autospace:none'><span lang=EN-AU
  style='font-size:10.0pt;font-family:"Arial (W1)",sans-serif;color:black'>$............
  . ...</span></p>
  </td>
 </tr>
 <tr style='height:19.6pt'>
  <td width=492 colspan=5 style='width:368.75pt;border:solid #999999 1.0pt;
  border-top:none;background:#F3F3F3;padding:0in 5.4pt 0in 5.4pt;height:19.6pt'>
  <p class=MsoNormal align=right style='margin-left:3.5pt;text-align:right;
  text-autospace:none'><b><span lang=EN-AU style='font-size:10.0pt;font-family:
  "Arial (W1)",sans-serif;color:black'>Gross Wage </span></b></p>
  </td>
  <td width=93 valign=bottom style='width:70.0pt;border-top:none;border-left:
  none;border-bottom:solid #999999 1.0pt;border-right:solid #999999 1.0pt;
  background:#F3F3F3;padding:0in 5.4pt 0in 5.4pt;height:19.6pt'>
  <p class=MsoNormal style='text-autospace:none'><b><span lang=EN-AU
  style='font-size:10.0pt;font-family:"Arial (W1)",sans-serif;color:black'>$............
  . ...</span></b></p>
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
  color:black'>Taxation </span></b></p>
  </td>
  <td width=93 valign=bottom style='width:70.0pt;border-top:none;border-left:
  none;border-bottom:solid #999999 1.0pt;border-right:solid #999999 1.0pt;
  background:white;padding:0in 5.4pt 0in 5.4pt;height:17.5pt'>
  <p class=MsoNormal style='text-autospace:none'><span lang=EN-AU
  style='font-size:10.0pt;font-family:"Arial (W1)",sans-serif;color:black'>$............
  . ...</span></p>
  </td>
 </tr>
 <tr style='height:24.5pt'>
  <td width=229 colspan=2 valign=top style='width:172.1pt;border:solid #999999 1.0pt;
  border-top:none;background:white;padding:0in 5.4pt 0in 5.4pt;height:24.5pt'>
  <p class=MsoNormal style='margin-left:3.5pt;text-autospace:none'><span
  lang=EN-AU style='font-size:10.0pt;font-family:"Arial (W1)",sans-serif;
  color:black'>Superannuation </span><span lang=EN-AU style='font-size:8.0pt;
  font-family:"Arial (W1)",sans-serif;color:black'>(Fund Name)</span><span
  lang=EN-AU style='font-size:10.0pt;font-family:"Arial (W1)",sans-serif;
  color:black'> </span></p>
  <p class=MsoNormal style='margin-left:3.5pt;text-autospace:none'><span
  lang=EN-AU style='font-size:10.0pt;font-family:"Arial (W1)",sans-serif;
  color:black'>&nbsp;</span></p>
  </td>
  <td width=262 colspan=3 valign=top style='width:196.65pt;border-top:none;
  border-left:none;border-bottom:solid #999999 1.0pt;border-right:solid #999999 1.0pt;
  background:white;padding:0in 5.4pt 0in 5.4pt;height:24.5pt'>
  <p class=MsoNormal style='margin-left:3.5pt;text-autospace:none'><span
  lang=EN-AU style='font-size:10.0pt;font-family:"Arial (W1)",sans-serif;
  color:black'>Account Number* </span></p>
  </td>
  <td width=93 valign=bottom style='width:70.0pt;border-top:none;border-left:
  none;border-bottom:solid #999999 1.0pt;border-right:solid #999999 1.0pt;
  background:white;padding:0in 5.4pt 0in 5.4pt;height:24.5pt'>
  <p class=MsoNormal style='text-autospace:none'><span lang=EN-AU
  style='font-size:10.0pt;font-family:"Arial (W1)",sans-serif;color:black'>$...........
  . ...</span></p>
  </td>
 </tr>
 <tr style='height:25.95pt'>
  <td width=229 colspan=2 valign=top style='width:172.1pt;border:solid #999999 1.0pt;
  border-top:none;background:white;padding:0in 5.4pt 0in 5.4pt;height:25.95pt'>
  <p class=MsoNormal style='margin-left:3.5pt;text-autospace:none'><span
  lang=EN-AU style='font-size:10.0pt;font-family:"Arial (W1)",sans-serif;
  color:black'>Other deduction – purpose*</span></p>
  </td>
  <td width=262 colspan=3 valign=top style='width:196.65pt;border-top:none;
  border-left:none;border-bottom:solid #999999 1.0pt;border-right:solid #999999 1.0pt;
  background:white;padding:0in 5.4pt 0in 5.4pt;height:25.95pt'>
  <p class=MsoNormal style='margin-left:3.5pt;text-autospace:none'><span
  lang=EN-AU style='font-size:10.0pt;font-family:"Arial (W1)",sans-serif;
  color:black'>Account/Fund name </span><span lang=EN-AU style='font-size:7.0pt;
  font-family:"Arial (W1)",sans-serif;color:black'>(or name and number)</span><span
  lang=EN-AU style='font-size:10.0pt;font-family:"Arial (W1)",sans-serif;
  color:black'> </span></p>
  <p class=MsoNormal style='margin-left:3.5pt;text-autospace:none'><span
  lang=EN-AU style='font-size:10.0pt;font-family:"Arial (W1)",sans-serif;
  color:black'>&nbsp;</span></p>
  </td>
  <td width=93 valign=bottom style='width:70.0pt;border-top:none;border-left:
  none;border-bottom:solid #999999 1.0pt;border-right:solid #999999 1.0pt;
  background:white;padding:0in 5.4pt 0in 5.4pt;height:25.95pt'>
  <p class=MsoNormal style='text-autospace:none'><span lang=EN-AU
  style='font-size:10.0pt;font-family:"Arial (W1)",sans-serif;color:black'>$...........
  . ...</span></p>
  </td>
 </tr>
 <tr style='height:25.25pt'>
  <td width=229 colspan=2 valign=top style='width:172.1pt;border:solid #999999 1.0pt;
  border-top:none;background:white;padding:0in 5.4pt 0in 5.4pt;height:25.25pt'>
  <p class=MsoNormal style='margin-left:3.5pt;text-autospace:none'><span
  lang=EN-AU style='font-size:10.0pt;font-family:"Arial (W1)",sans-serif;
  color:black'>Other deduction - purpose*</span></p>
  </td>
  <td width=262 colspan=3 valign=top style='width:196.65pt;border-top:none;
  border-left:none;border-bottom:solid #999999 1.0pt;border-right:solid #999999 1.0pt;
  background:white;padding:0in 5.4pt 0in 5.4pt;height:25.25pt'>
  <p class=MsoNormal style='margin-left:3.5pt;text-autospace:none'><span
  lang=EN-AU style='font-size:10.0pt;font-family:"Arial (W1)",sans-serif;
  color:black'>Account/Fund name </span><span lang=EN-AU style='font-size:7.0pt;
  font-family:"Arial (W1)",sans-serif;color:black'>(or name and number)<br>
  <br>
  </span></p>
  </td>
  <td width=93 valign=bottom style='width:70.0pt;border-top:none;border-left:
  none;border-bottom:solid #999999 1.0pt;border-right:solid #999999 1.0pt;
  background:white;padding:0in 5.4pt 0in 5.4pt;height:25.25pt'>
  <p class=MsoNormal style='text-autospace:none'><span lang=EN-AU
  style='font-size:10.0pt;font-family:"Arial (W1)",sans-serif;color:black'>$............
  . ...</span></p>
  </td>
 </tr>
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
  style='font-size:10.0pt;font-family:"Arial (W1)",sans-serif;color:black'>$............
  . ...</span></b></p>
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
  style='font-size:10.0pt;font-family:"Arial (W1)",sans-serif;color:black'>Tsh {{$payrolltrasaction->netpay}}
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
