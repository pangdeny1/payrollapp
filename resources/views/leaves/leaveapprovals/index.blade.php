@extends("layouts.master")

@section("content")
    @if($leaveapprovals->count())
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
                                    leaveapprovals
                                </li>
                            </ol>
                        </nav>
                        <div class="d-sm-flex align-items-sm-center">
                            <h1 class="page-title mr-sm-auto mb-0">
                                leaveapprovals
                            </h1>
                            <div class="btn-toolbar">
                                <a href="" class="btn btn-light">
                                    <i class="oi oi-data-transfer-download"></i>
                                    <span class="ml-1">Export as excel</span>
                                </a>
                                
                                @can("create", \App\Models\leave\leaveapproval::class)
                                <a href="{{ url("createleaveapproval") }}" class="btn btn-primary">
                                    <span class="fas fa-plus mr-1"></span>
                                    New Leave type
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
                                        <a class="nav-link {{ request()->query("status") ? "" : "active" }}" href="{{ url("leaveapprovals.index") }}">
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

                                <div class="text-muted">  Showing {{ $leaveapprovals->firstItem() }} to {{ $leaveapprovals->lastItem() }} of {{ $leaveapprovals->total() }} entries </div>

                                @include('includes.flash')

                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                               <th>Employee</th>
                                                <th>Leave type</th>
                                                 <th>Days</th>
                                                 <th>Approver</th>
                                                <th>Level</th>
                                            <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($leaveapprovals as $leave)
                                            <tr>
                                                <td>
                                                    <a href="" class="user-avatar mr-1">
                                                        <img class="img-fluid"
                                                             src="{{ Avatar::create($leave->employee->full_name)->toBase64() }}"
                                                             alt="{{ $leave->employee->full_name}}">
                                                    </a>
                                                    <a href="">
                                                      {{ $leave->employee->full_name }} 
                                                    </a>
                                                </td>
                                                 <td>{{ optional($leave->leavetype)->name }}</td>
                                                 <td></td>
                                                 
                                                <td >{{ optional($leave->approvername)->full_name}}</td>
                                                <td >{{ optional($leave->approverlevel)->name}} level:{{$leave->priority}}</td>
                                                
                                                <td class="align-middle text-right">
                       <div class="dropdown">
    <button type="button" class="btn btn-sm btn-light" data-toggle="dropdown">
        <span>More</span>
        <span class="caret"></span>
    </button>

    <div class="dropdown-arrow dropdown-arrow-right"></div>  
     <div class="dropdown-menu dropdown-menu-right">

    <a href="javascript:void(0)"
   class="dropdown-item"
   onclick="event.preventDefault(); document.getElementById('approveForm{{$leave->id}}').submit();"
>
    <i class="fas fa-check-circle"></i>  Approve
    <form id="approveForm{{$leave->id}}"
          action="{{url('approveleave',$leave->id)}}"
          method="POST"
          class="d-none"
    >
        @csrf
        @method("post")
    </form>
</a>

  <a href="javascript:void(0)"
   class="dropdown-item"
   onclick="event.preventDefault(); document.getElementById('rejectionForm{{$leave->id}}').submit();"
>
    <i class="far fa-times-circle"></i> Reject
    <form id="rejectionForm{{$leave->id}}"
          action="{{url('rejectleave',$leave->id)}}"
          method="POST"
          class="d-none"
    >
        @csrf
        @method("post")
    </form>
</a>
</div>
           
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>


                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                         <form action="{{ url("storeleaveapprover") }}"
                              method="post"
                              class="card border-0"
                        >
                                            @csrf
                                            <div class="modal-header">
                                                <h6 class="modal-title" id="exampleModalLabel">Approver form  {{optional($leave->leavetype)->name }}</h6>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            
                                            <div class="card-body">
                                            
                                    <div class="form-group col-md-12 mb-3">
                                        <label for="employee">Employee</label>
                                        <select name="employee"
                                                class="form-control d-block w-100 {{ $errors->has('employee') ? 'is-invalid' : '' }}"
                                                id="employee"
                                                required=""
                                        >
                                            <option value=""> Choose... </option>
                                            @foreach(\App\Employee::All() as $employee)
                                                <option value="{{ $employee->id }}" {{ old("employee",$leave->employee_id) === $employee->id ? "selected" : "" }}>
                                                    {{ $employee->first_name }} {{ $employee->last_name }} 
                                                </option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback"> Please provide active employee </div>
                                    </div>
                              
                                <div class="form-group col-md-12 mb-3">
                                        <label for="leavetype">Leave Type</label>
                                        <select name="leavetype"
                                                class="form-control d-block w-100 {{ $errors->has('leavetype') ? 'is-invalid' : '' }}"
                                                id="leavetype"
                                                required=""
                                        >
                                            <option value=""> Choose... </option>
                                            @foreach(\App\Models\Leave\Leavetype::All() as $leavetype)
                                                <option value="{{ $leavetype->id }}" {{ old("leavetype",$leave->leavetype_id) === $leavetype->id ? "selected" : "" }}>
                                                    {{ $leavetype->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback"> Please provide active leavetype </div>
                                    </div>
                                </div>
                            <div class="card-body">
                             

                                    <div class="form-row">
                        <!-- grid column -->
                        <div class="col-md-5 mb-3">
                         <label for="last_name">Date From</label>
                                <input id="start_date"  type="date" name="start_date" onchange="cal()"
                             class="form-control {{ $errors->has('start_date') ? 'is-invalid' : '' }}"
                              value="{{old('start_date',$leave->start_date)}}">

                                @if ($errors->has('start_date'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('start_date',$leave->start_date) }}</strong>
                                    </span>
                                @endif  
                          
                        </div>
                        <!-- /grid column -->
                        <!-- grid column -->
                        <div class="col-md-4 mb-3">
                         <label for="last_name">Date To</label>
                                  <input  id="end_date" type="date" name="end_date" onchange="cal()" 
                                   class="form-control {{ $errors->has('end_date') ? 'is-invalid' : '' }}"
                                  value="{{old('end_date',$leave->end_date)}}">

                                @if ($errors->has('end_date'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('end_date',$leave->end_date) }}</strong>
                                    </span>
                                @endif
                         
                        </div>
                        <!-- /grid column -->
                        <!-- grid column -->
                        <div class="col-md-3 mb-3">
                          <label for="zip">Days requested </label>
                          <input type="text"  name="duration" value="{{old('duration',$leave->total_days)}}" class="form-control" id="duration" readonly>
                          <div class="invalid-feedback"> </div>
                        </div>
                        <!-- /grid column -->
                      </div>
                      <!-- /.form-row -->
                      <hr class="mb-4">
                           <div class="form-group">
                          <label class="d-flex justify-content-between" for="lbl4">
                            <span>Remark</span>
                            <span class="text-muted"></span>
                          </label>
                          <textarea name="remark" class="form-control" id="lbl4" rows="3" placeholder=" description">{{$leave->reason_for_leave}}</textarea>
                        </div>
                                </div>
                                                    
                                <hr>
                                <button class="btn btn-primary btn-lg btn-block" type="submit">
                                    Save changes
                                </button>
                            </div>
                      </form>

                                    </div>

                                <!-- .pagination -->
                                {{ $leaveapprovals->links() }}
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
                    @can("create", \App\Models\leave\leaveapproval::class)
                    <div class="state-action">
                        <a href="{{ url("createleaveapproval") }}" class="btn btn-primary">Register new Leave</a>
                    </div>
                    @endcan
                </div>
                <!-- /.empty-state-container -->
            </section>
            <!-- /.empty-state -->
        </div>
    @endif
@endsection