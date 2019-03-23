@extends("layouts.master")

@section("content")
    @if($payrolls->count())
        <div class="wrapper">
            <div class="page">
                <div class="page-inner">
                    <header class="page-title-bar">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route("home") }}">
                                        <i class="breadcrumb-icon fa fa-angle-left mr-2"></i> Dashboard
                                    </a>
                                </li>
                                <li class="breadcrumb-item active">
                                   Approve Payroll Payment
                                </li>
                            </ol>
                        </nav>
                        <div class="d-sm-flex align-items-sm-center">
                            <h1 class="page-title mr-sm-auto mb-0">
                                 Approve Payroll
                                 @include('includes.flash')
                            </h1>
                            <div class="btn-toolbar">
                                <a href="" class="btn btn-light">
                                    <i class="oi oi-data-transfer-download"></i>
                                    <span class="ml-1">Export as excel</span>
                                </a>
                              
                            </div>
                        </div>
                    </header>

                    <div class="page-section">
                        <section class="card shadow-1 border-0 card-fluid">
                            <header class="card-header">
                                <ul class="nav nav-tabs card-header-tabs">
                                    <li class="nav-item">
                                        <a class="nav-link {{ request()->query("status") ? "" : "active" }}" href="">
                                            All
                                        </a>
                                    </li>
                                </ul>
                            </header>

                            <div class="card-body">

                             

                                <!-- .table-responsive -->

                                

                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Payroll code</th>
                                                <th>Payroll Name</th>
                                                <th>Status</th>
                                                <th style="text-align:center" colspan="2">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($payrolls as $payroll)
                                            <tr>
                                                <td>
                                                    <a href="{{ url('showpayroll/'.$payroll->id) }}">
                                                        {{ $payroll->id }} - {{ $payroll->payrollid }}
                                                    </a>
                                                </td>
                                                <td>{{ $payroll->payrolldesc }}</td>
                                                <td>{{ $payroll->payapproved == 'no' ? "Pending" : "Approved" }}</td>
                                                <td class="align-middle text-right">       
                                                    @if($payroll->payclosed== 1)
                                                        <a href="{{ url('editpayroll/'.$payroll->id) }}" class="btn btn-sm btn-secondary">
                                                            <i class="fa fa-pencil-alt"></i>
                                                            <span class="sr-only">Edit</span>
                                                        </a>
                                                        <a href="{{ url('deletepayroll/'.$payroll->id) }}" onclick="return confirm('Are you sure you want to Delete this record')"  class="btn btn-sm btn-secondary">
                                                            <i class="far fa-trash-alt"></i>
                                                            <span class="sr-only">Remove</span>
                                                        </a>
                                                    @endif
                                                    <a href="" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal1" >
                                                        Preview</a>
                              
                                                </td>
                                            </tr>
                                            <tr>
                       
                       <td>
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/approvepayrolls/'.$payroll->id) }}">
                        {!! csrf_field() !!}

                         <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-ticket"></i> Approve Payment
                                </button>
                            </div>
                        </div>
                    </form>
                            </td>

                              <td>
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/voidpayment/'.$payroll->id) }}">
                        {!! csrf_field() !!}

                         <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-ticket"></i> Void Payment
                                </button>
                            </div>
                        </div>
                    </form>
                            </td>
                                            </tr>
                                          @endforeach
                                        </tbody>
                                    </table>
                                </div>

                               
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="wrapper">
            <!-- .empty-state -->
            <section id="notfound-state" class="empty-state">
                <!-- .empty-state-container -->
                <div class="empty-state-container">
                    <div class="state-figure">
                        <img class="img-fluid"
                             src="{{ asset("themes/looper/assets/images/illustration/img-7.png") }}"
                             alt=""
                             style="max-width: 300px"
                        >
                    </div>
                    <h3 class="state-header"> No Processed payroll, Yet. </h3>
                    <p class="state-description lead text-muted">
                        To process payroll use button below.
                    </p>
                    @can("create", \App\Models\Payroll::class)
                    <div class="state-action">
                        <a href="{{url('processpayroll')}}" class="btn btn-primary">Process payroll</a>
                    </div>
                    @endcan
                </div>
                <!-- /.empty-state-container -->
            </section>
            <!-- /.empty-state -->
        </div>
    @endif

          <!-- Modal -->
                                    <div  data-keyboard="false" data-backdrop="static" class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                       
                        {!! csrf_field() !!}
                                            <div class="modal-header">
                                                <h6 class="modal-title" id="exampleModalLabel">Payroll </h6>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>

                                              <div class="panel-body panel-body-table"   style='overflow-y:scroll;'>
                                  
                                    <div class="table-responsive">
                                    <!--    <table id="customers2" class="table datatable">
                                            <thead>
                                                <tr>
                                                    <th>Employee ({{$payrollTrans->count()}})</th>
                                                    <th>Basic</th>
                                                    <th>Income</th>
                                                    <th>Gross</th>
                                                    <th>Pension</th>
                                                    <th>Tax</th>
                                                    <th>Deduction</th>
                                                    <th>Loan</th>
                                                    <th>Net</th>
                                                   
                                                </tr>
                                            </thead>
                                            <tbody>
                                       @foreach($payrollTrans as $employee)
                                                <tr>
                                                    <td><strong>{{ full_name($employee->employee_id)}}</strong></td>
                                                    <td align="right">{{number_format($employee->basicpay,2)}}</td>
                                                    <td align="right">{{number_format($employee->other_income,2)}}</td>
                                                    <td align="right">{{number_format($employee->grosspay,2)}}</td>
                                                    <td align="right">{{number_format($employee->sss_pay,2)}}</td>
                                                    <td align="right">{{number_format($employee->tax,2)}}</td>
                                                    <td align="right">{{number_format($employee->other_deduction,2)}}</td>
                                                    <td align="right">{{number_format($employee->loan_deduction,2)}}</td>
                                                    <td>{{ number_format($employee->netpay,2)}}</td>
                                                    
                                                </tr>
                                           @endforeach

                                           <tr>
                                                    <th>{{$payrollTrans->count()}}</th>
                                                    <th>{{ number_format($payrollTrans->sum('basicpay'),2)}}</th>
                                                    <th>{{ number_format($payrollTrans->sum('other_income'),2)}}</th>
                                                    <th>{{ number_format($payrollTrans->sum('grosspay'),2)}}</th>
                                                    <th>{{ number_format($payrollTrans->sum('sss_pay'),2)}}</th>
                                                    <th>{{ number_format($payrollTrans->sum('tax'),2)}}</th>
                                                    <th>{{ number_format($payrollTrans->sum('other_deduction'),2)}}</th>
                                                    <th>{{ number_format($payrollTrans->sum('loan_deduction'),2)}}</th>
                                                    <th>{{ number_format($payrollTrans->sum('netpay'),2)}}</th>
                                                   
                                                </tr>

                                                <tr>
                                                    <th>Employee ({{$payrollTrans->count()}})</th>
                                                    <th>Basic</th>
                                                    <th>Income</th>
                                                    <th>Gross</th>
                                                    <th>Pension</th>
                                                    <th>Tax</th>
                                                    <th>Deduction</th>
                                                    <th>Loan</th>
                                                    <th>Net</th>
                                                   
                                                </tr>
                                               
                                            </tbody>
                                        </table> -->
                                    </div>

                                    
                                </div>

                                        </div>
                                    </div>
@endsection