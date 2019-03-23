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
                                    Payrolls
                                </li>
                            </ol>
                        </nav>
                        <div class="d-sm-flex align-items-sm-center">
                            <h1 class="page-title mr-sm-auto mb-0">
                                Payrolls
                                 @include('includes.flash')
                            </h1>
                            <div class="btn-toolbar">
                                <a href="" class="btn btn-light">
                                    <i class="oi oi-data-transfer-download"></i>
                                    <span class="ml-1">Export as excel</span>
                                </a>
                                
                                @can("create", \App\Models\Payroll::class)
                                <a href="{{url('createpayrollperiod')}}" class="btn btn-primary">
                                    <span class="fas fa-plus mr-1"></span>
                                    New payroll
                                </a>
                                @endcan
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
                                                <th>Processed</th>
                                                <th style="text-align:center" colspan="4">Actions</th>
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
                                                <td>{{ $payroll->payprocessed }}</td>
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
                                                    <a href="{{ url('showpayroll/'.$payroll->id) }}" class="btn btn-primary">preview</a>
                                                   
                                                </td>
                                            </tr>
                                            <tr>
                                                <td> <form class="form-horizontal" role="form" method="POST" action="{{ url('/generate/'.$payroll->id) }}">
                        {!! csrf_field() !!}

                         <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                              @if($payroll->payclosed== 1)
                                <button onclick="return confirm('Are you sure you want to Generate payroll data')" type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-ticket"></i> Generate Payroll Data
                                    <span class="oi oi-data-transfer-download"></span>
                                </button>
                                @endif
                            </div>
                        </div>
                    </form></td>
                     <td>  
                      <form class="form-horizontal" role="form" method="POST" action="{{ url('/void/'.$payroll->id) }}">
                        {!! csrf_field() !!}

                         <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                               @if($payroll->payclosed== 1)
                                <button onclick="return confirm('Are you sure you want to Void payroll')" type="submit" class="btn btn-warning">
                                    <i class="fa fa-btn fa-ticket"></i> Void payroll Period
                                </button>
                                @endif
                            </div>
                        </div>
                    </form>
                   </td>
                    <td> <form class="form-horizontal" role="form" method="POST" action="{{ url('/close/'.$payroll->id) }}">
                        {!! csrf_field() !!}

                         <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                               @if($payroll->payclosed== 1)
                                <button onclick="return confirm('Are you sure you want to Close payroll')" type="submit" class="btn btn-danger">
                                    <i class="fa fa-btn fa-ticket"></i> Close payroll Period
                                </button>
                                @endif
                            </div>
                        </div>
                    </form>
                     </td>
                       <td>
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/open/'.$payroll->id) }}">
                        {!! csrf_field() !!}

                         <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button onclick="return confirm('Are you sure you want to Open payroll')" type="submit" class="btn btn-success">
                                    <i class="fa fa-btn fa-ticket"></i> Open payroll Period
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

                                <!-- .pagination -->
                                {{ $payrolls->links() }}
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
                    <h3 class="state-header"> No Payroll to process , Yet. </h3>
                    <p class="state-description lead text-muted">
                        To process payroll use button below to create payroll.
                    </p>
                    @can("create", \App\Models\Payroll::class)
                    <div class="state-action">
                        <a href="{{url('createpayrollperiod')}}" class="btn btn-primary">Create new payroll</a>
                    </div>
                    @endcan
                </div>
                <!-- /.empty-state-container -->
            </section>
            <!-- /.empty-state -->
        </div>
    @endif
@endsection