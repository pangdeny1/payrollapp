<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Monthly Tax</title>
    <link rel="stylesheet" href="{{ asset("themes/looper/assets/vendor/bootstrap/css/bootstrap.min.css") }}">
    <style>
        table { font-size: 12px;}
    </style>
</head>
<body>
    <section class="text-center mb-4">
        <h4 class="text-uppercase">{{$company->coyname}}</h4>
        <h6 class="mb-2">P.O.Box {{$company->regoffice1}} - Dar Tanzania</h6>
        <strong>
            <u class="text-uppercase">Monthly Tax Report</u>
        </strong>
    </section>

    <section  class="mb-4">
        <h4>Period:{{$payroll->payrolldesc}} <span class="text-danger"></span></h4>
    </section>

    <section>
       
        <table class="table table-sm table-bordered">
            <thead>
                <tr>
                    <th class="text-left"  nowrap>No</th>
                    <th class="text-right"  nowrap>Employee</th>
                    <th class="text-right"  nowrap>SS Number</th>
                    <th class="text-right"  nowrap>SS Type</th>
                    <th class="text-right"  nowrap>Amount</th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach($payrolltransactions as $payrolltransaction)
                <tr>
                    <td nowrap>{{$index++}}</td>
                    <td nowrap >{{$payrolltransaction->employee->full_name}}</td>
                    <td nowrap class="text-right">{{$payrolltransaction->employee->ss_number}}</td>
                    <td nowrap class="text-right">
                     {{$payrolltransaction->pension->penname}}
                    </td>
                    <td nowrap class="text-right">
                     {{number_format($payrolltransaction->ss_pay,2)}}
                    </td>
                   
                </tr>
              
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th nowrap>Total</th>
                    <th nowrap class="text-right"></th>
                    <th nowrap class="text-right"></th>
                    <th nowrap class="text-right"></th>
                    <th nowrap class="text-right"> {{number_format($payrolltransactions->sum('ss_pay'),2)}} </th>
                    
                </tr>
            </tfoot>
        </table>
    </section>
</body>
</html>