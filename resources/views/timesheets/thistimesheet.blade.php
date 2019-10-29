@extends("layouts.master")

@section("content")
    @if($dailytrans->count())
        <div class="wrapper">
            <div class="page">
                <div class="page-inner">
                    <header class="page-title-bar">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ url("home") }}">
                                        <i class="breadcrumb-icon fa fa-angle-left mr-2"></i> Dashboard
                                    </a>
                                </li>
                                <li class="breadcrumb-item active">
                                    Timesheet
                                </li>
                            </ol>
                        </nav>
                        <div class="d-sm-flex align-items-sm-center">
                            <h1 class="page-title mr-sm-auto mb-0">
                                Timesheet
                            </h1>
                            <div class="btn-toolbar">
                                <a href="" class="btn btn-light">
                                    <i class="oi oi-data-transfer-download"></i>
                                    <span class="ml-1">Export as excel</span>
                                </a>
                                
                                @can("create", \App\Models\Prldailytran::class)
                                <a href="" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal2">
                                    <span class="fas fa-plus mr-1"></span>
                                    Add timesheet data
                                </a>

                               @endcan
                            </div>
                        </div>
                    </header>

                    <div class="page-section">
                        <section class="card shadow-1 border-0 card-fluid">

                              <div class="form-group">
                                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/newtime') }}">
                        
                            @csrf
                                           <div class="form-group">
                          
                          <div class="custom-control custom-control-inline custom-checkbox">
                              <label class="d-block">Name</labe name="date"
                                               id="date"
                                               class="form-control {{ $errors->has('date') ? 'is-invalid' : '' }}"
                                               value="{{ old("date") }}"l>
                              <input type="text" class="form-control" id="ckb2" >
                          </div>
                          <div class="custom-control custom-control-inline custom-checkbox">
                            <label class="d-block">Date</label>
                            <input type="text" class="form-control" id="ckb2" >
                            
                          </div>
                          <div class="custom-control custom-control-inline custom-checkbox">
                            <label class="d-block">Hours</label>
                            <input type="text" class="form-control" id="ckb2" >
                          </div>
             
                       <div class="input-group">
                          <button class="btn btn-primary btn-lg btn-block" type="submit">
                                   Add Timesheet
                                </button>
                            </div>
                        </div>
                            <header class="card-header">
                                <ul class="nav nav-tabs card-header-tabs">
                                    <li class="nav-item">
                                        <a class="nav-link {{ request()->query("status") ? "" : "active" }}" href="{{ url("dailytrans.index") }}">
                                            All
                                        </a>
                                    </li>
                                </ul>

                            </header>

                            <div class="card-body">


                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <span class="oi oi-magnifying-glass"></span>
                                            </span>
                                        </div>


                                        <form action="">
                                            <input type="text" name="q" class="form-control" placeholder="Search record...">
                                        </form>
                                    </div>
                                </div>

                                <!-- .table-responsive -->

                                <div class="text-muted">  Showing {{ $dailytrans->firstItem() }} to {{ $dailytrans->lastItem() }} of {{ $dailytrans->total() }} entries </div>

                                @include('includes.flash')

                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                               <th>Employee</th>
                                                
                                                 <th>Date</th>
                                                 <th>Hours</th>
                                                <th>Allocated Days</th>
                                                 <th>Days Spent</th>
                                                  <th>Balance</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($dailytrans as $dailytran)
                                            <tr>
                                                <td>
                                                    <a href="" class="user-avatar mr-1">
                                                        <img class="img-fluid"
                                                             src=""
                                                             alt="">
                                                    </a>
                                                    <a href="{{ url("etimesheet", $dailytran->id) }}">
                                                      {{ full_name($dailytran->employee_id)}} 
                                                    </a>
                                                </td>
                                               
                                                <td >{{ $dailytran->rtdate}}</td>
                                                <td >{{ $dailytran->reg_hours}}</td>
                                                <td >{{ $dailytran->allocated_days}}</td>
                                                 <td >{{ $dailytran->days_spent}}</td>
                                                  <td >{{ $dailytran->balance}}</td>
                                                
                                                <td class="align-middle text-right">
                                                    @can("edit", \App\Models\Prldailytran::class)
                                                    <a href="{{ url("editleavebalance", $dailytran) }}" class="btn btn-sm btn-secondary">
                                                        <i class="fa fa-pencil-alt"></i>
                                                        <span class="sr-only">Edit</span>
                                                    </a>
                                                    @endcan

                                                    @can("delete", \App\Models\Prldailytran::class)
                                                    <a href="{{ url("deleteleavebalance", $dailytran) }}" onclick="return confirm('Are you sure you want to Delete this record')"  class="btn btn-sm btn-secondary">
                                                        <i class="far fa-trash-alt"></i>
                                                        <span class="sr-only">Remove</span>
                                                    </a>
                                                    @endcan
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <!-- .pagination -->
                                {{ $dailytrans->links() }}
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
                    <h3 class="state-header"> No Content, Yet. </h3>
                    <p class="state-description lead text-muted">
                        Use the button below to add new timesheet data
                    </p>
                    
                                @can("create", \App\Models\Prldailytran::class)
                                <a href="" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal2">
                                    <span class="fas fa-plus mr-1"></span>
                                    Add timesheet data
                                </a>

                               @endcan
                </div>
                <!-- /.empty-state-container -->
            </section>
            <!-- /.empty-state -->
        </div>




                      
                       
                   
    @endif                     <!-- Modal -->
      
      <div data-keyboard="false" data-backdrop="static" class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                         <form class="form-horizontal" role="form" method="POST" action="{{ url('/newtime') }}">
                        {!! csrf_field() !!}
                                                <div class="modal-header">
                                                <h6 class="modal-title" id="exampleModalLabel">New time entry</h6>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                       
                        <div class="form-group{{ $errors->has('jobGroup') ? ' has-error' : '' }}">
                            <label for="jobGroup" class="col-md-4 control-label">Regular Time entry</label>

                            <div class="col-md-6">
                                <select id="employee" type="employee" class="form-control" name="employee">
                                    <option value="">Employee</option>
                                   
                               @foreach (App\Employee::where('active','yes')->get() as $employee)
                        <option value="{{ $employee->id }}">{{ $employee->full_name }}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('employee'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('employee') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                      

                        <div class="form-group{{ $errors->has('hours') ? ' has-error' : '' }}">
                            <label for="hours" class="col-md-4 control-label">Date</label>

                            <div class="col-md-6">
                                <input type="date"
                                               name="date"
                                               id="date"
                                               class="form-control {{ $errors->has('date') ? 'is-invalid' : '' }}"
                                               value="{{ old("date") }}"
                                               
                                        >

                                @if ($errors->has('date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>    

                        <div class="form-group{{ $errors->has('hours') ? ' has-error' : '' }}">
                            <label for="hours" class="col-md-4 control-label">Hours</label>

                            <div class="col-md-6">
                                <input type="number"
                                               name="hours"
                                               id="hours"
                                               class="form-control {{ $errors->has('date') ? 'is-invalid' : '' }}"
                                               value="{{ old("hours") }}"
                                               
                                        >

                                @if ($errors->has('hours'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('hours') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>    
                         <div class="form-group{{ $errors->has('hours') ? ' has-error' : '' }}">
                            <label for="hours" class="col-md-4 control-label">Hours</label>

                            <div class="col-md-6">
                             <select id="payroll" class="form-control" name="payroll">
                                  
                                   
                               @foreach (App\Models\Payroll::where('payclosed',1)->get() as $payroll)
                        <option value="{{ $payroll->id }}">{{ $payroll->payrollid}}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('payroll'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('payroll') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>         
                                            <hr>


                                            
                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-sm btn-primary">Add</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
@endsection