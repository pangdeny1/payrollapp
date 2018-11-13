@extends("layouts.master")

@section("content")
    @if($leaveapprovers->count())
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
                                    leaveapprovers
                                </li>
                            </ol>
                        </nav>
                        <div class="d-sm-flex align-items-sm-center">
                            <h1 class="page-title mr-sm-auto mb-0">
                                leaveapprovers
                            </h1>
                            <div class="btn-toolbar">
                                <a href="" class="btn btn-light">
                                    <i class="oi oi-data-transfer-download"></i>
                                    <span class="ml-1">Export as excel</span>
                                </a>
                                
                                @can("create", \App\Models\leave\leaveapprover::class)
                                <a href="{{ url("createleaveapprover") }}" class="btn btn-primary">
                                    <span class="fas fa-plus mr-1"></span>
                                    New Leave type
                                </a>
                                @endcan
                            </div>
                        </div>
                    </header>
   <div class="col-md-12">

                        <form action="{{ url("storeleaveapprover") }}"
                              method="post"
                              class="card border-0"
                        >
                            @csrf
                           @include('includes.flash')
                            <div class="card-body">
                         <div class="form-group col-md-12 mb-3">
                                        <label for="employee">Employee</label>
                                        <select name="approver"
                                                class="form-control d-block w-100 {{ $errors->has('approver') ? 'is-invalid' : '' }}"
                                                id="approver"
                                                required=""
                                        >
                                            <option value=""> Choose... </option>
                                            @foreach(\App\Employee::All() as $employee)
                                                <option value="{{ $employee->id }}" {{ old("approver") == $employee->id ? "selected" : "" }}>
                                                    {{ $employee->first_name }} {{ $employee->last_name }} 
                                                </option>
                                            @endforeach
                                        </select>
                                         @if ($errors->has('approver'))
                                                        <span class="invalid-feedback">
                                                            <strong>{{ $errors->first('approver') }}</strong>
                                                        </span>
                                                    @endif
                                      
                      
                                </div>

                                                    
                                <hr>
                                <button class="btn btn-primary btn-lg btn-block" type="submit">
                                    Save changes
                                </button>
                            </div>
                      </form>
                    </div>
                    <div class="page-section">
                        <section class="card shadow-1 border-0 card-fluid">
                            <header class="card-header">
                                <ul class="nav nav-tabs card-header-tabs">
                                    <li class="nav-item">
                                        <a class="nav-link {{ request()->query("status") ? "" : "active" }}" href="{{ url("leaveapprovers.index") }}">
                                            All
                                        </a>
                                    </li>
                                </ul>

                            </header>

                            <div class="card-body">

                                <div class="form-group">
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

                                <div class="text-muted">  Showing {{ $leaveapprovers->firstItem() }} to {{ $leaveapprovers->lastItem() }} of {{ $leaveapprovers->total() }} entries </div>

                                @include('includes.flash')

                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                               
                                                <th>Approver Name</th>
                                                 
                                                <th>Actions</th>
                                            
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($leaveapprovers as $leave)
                                            <tr>
                                                <td>
                                                    <a href="" class="user-avatar mr-1">
                                                        <img class="img-fluid"
                                                             src="{{ Avatar::create($leave->approvername->full_name)->toBase64() }}"
                                                             alt="{{$leave->approvername->full_name}}">
                                                    </a>
                                                    <a href="">
                                                      {{ $leave->approvername->full_name}} 
                                                    </a>
                                                </td>
                                                 
                                                 <td class="align-middle text-right">
                                                    @can("view", \App\Models\leave\leaveapprover::class)
                                                    <a href="{{ url("showleaveapprover", $leave) }}" class="btn btn-sm btn-secondary">
                                                        
                                                        <span class="sr-only">Select</span>
                                                   
                                                    @endcan
                                                
                                                <td class="align-middle text-right">
                                                    @can("edit", \App\Models\leave\leaveapprover::class)
                                                    <a href="{{ url("editleaveapprover", $leave) }}" class="btn btn-sm btn-secondary">
                                                        <i class="fa fa-pencil-alt"></i>
                                                        <span class="sr-only">Edit</span>
                                                    </a>
                                                    @endcan

                                                    @can("delete", \App\Models\leave\leaveapprover::class)
                                                    <a href="{{ url("deleteleaveapprover", $leave) }}" onclick="return confirm('Are you sure you want to Delete this record')"  class="btn btn-sm btn-secondary">
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
                                {{ $leaveapprovers->links() }}
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
                        Use the button below to Apply new Leave.
                    </p>
                    @can("create", \App\Models\leave\leaveapprover::class)
                    <div class="state-action">
                        <a href="{{ url("createleaveapprover") }}" class="btn btn-primary">Register new Leave</a>
                    </div>
                    @endcan
                </div>
                <!-- /.empty-state-container -->
            </section>
            <!-- /.empty-state -->
        </div>
    @endif
@endsection