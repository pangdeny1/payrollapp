@extends("layouts.master")

@section("content")
    @if($leavebalances->count())
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
                                    leavebalances
                                </li>
                            </ol>
                        </nav>
                        <div class="d-sm-flex align-items-sm-center">
                            <h1 class="page-title mr-sm-auto mb-0">
                                leavebalances
                            </h1>
                            <div class="btn-toolbar">
                                <a href="" class="btn btn-light">
                                    <i class="oi oi-data-transfer-download"></i>
                                    <span class="ml-1">Export as excel</span>
                                </a>
                                
                                @can("create", \App\Models\leave\Leavebalance::class)
                                <a href="{{ url("createleavebalance") }}" class="btn btn-primary">
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
                                        <a class="nav-link {{ request()->query("status") ? "" : "active" }}" href="{{ url("leavebalances.index") }}">
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

                                <div class="text-muted">  Showing {{ $leavebalances->firstItem() }} to {{ $leavebalances->lastItem() }} of {{ $leavebalances->total() }} entries </div>

                                @include('includes.flash')

                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                               <th>Employee</th>
                                                <th>Leave type</th>
                                                 <th>Start Date</th>
                                                 <th>End Date</th>
                                                <th>Days</th>
                                            
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($leavebalances as $leave)
                                            <tr>
                                                <td>
                                                    <a href="{{ url("leavebalances.show", $leave) }}" class="user-avatar mr-1">
                                                        <img class="img-fluid"
                                                             src="{{ Avatar::create($leave->name)->toBase64() }}"
                                                             alt="{{ $leave->name}}">
                                                    </a>
                                                    <a href="{{ url("showleavebalance", $leave) }}">
                                                      {{ $leave->employee->full_name }} 
                                                    </a>
                                                </td>
                                                 <td>{{ $leave->leavetype->name }}</td>
                                                <td >{{ $leave->start_date}}</td>
                                                <td >{{ $leave->end_date}}</td>
                                                <td >{{ $leave->days}}</td>
                                                
                                                <td class="align-middle text-right">
                                                    @can("edit", \App\Models\leave\Leavebalance::class)
                                                    <a href="{{ url("editleavebalance", $leave) }}" class="btn btn-sm btn-secondary">
                                                        <i class="fa fa-pencil-alt"></i>
                                                        <span class="sr-only">Edit</span>
                                                    </a>
                                                    @endcan

                                                    @can("delete", \App\Models\leave\Leavebalance::class)
                                                    <a href="{{ url("deleteleavebalance", $leave) }}" onclick="return confirm('Are you sure you want to Delete this record')"  class="btn btn-sm btn-secondary">
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
                                {{ $leavebalances->links() }}
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
                    @can("create", \App\Models\leave\Leavebalance::class)
                    <div class="state-action">
                        <a href="{{ url("createleavebalance") }}" class="btn btn-primary">Register new Leave</a>
                    </div>
                    @endcan
                </div>
                <!-- /.empty-state-container -->
            </section>
            <!-- /.empty-state -->
        </div>
    @endif
@endsection