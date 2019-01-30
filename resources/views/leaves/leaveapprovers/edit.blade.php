@extends("layouts.master")

@section("content")
<div class="wrapper">
    <div class="page has-sidebar">
        <div class="page-inner">
            <header class="page-title-bar">
                <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">
                    <a href="#">
                        <i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Edit leave Approval Level</a>
                    </li>
                </ol>
                </nav>
                <h4 class="page-title">leave Approval Level</h4>
            </header>
            <div class="page-section">
                <div class="row">
                    <div class="col-md-12">

                                                  <form action="{{ url("updateleaveapprover",$leaveapprover->id) }}"
                              method="post"
                              class="card border-0"
                        >
                                            @csrf
                                            <div class="modal-header">
                                                <h6 class="modal-title" id="exampleModalLabel">Approver form</h6>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            
                                            <div class="card-body">
                                                 

                                               <div class="form-group col-md-12 mb-3">
                                        <label for="employee">Approver</label>
                                        <select name="approver"
                                                class="form-control d-block w-100 {{ $errors->has('approver') ? 'is-invalid' : '' }}"
                                                id="approver"
                                                required=""
                                        >
                                            <option value=""> Choose... </option>
                                            @foreach(\App\Employee::All() as $employee)
                                                <option value="{{ $employee->id }}" {{ old("approver",$leaveapprover->approver) == $employee->id ? "selected" : "" }}>
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

                                            <div class="form-group col-md-12 mb-3">
                                        <label for="leavetype">Leave Type</label>
                                        <select name="leavetype"
                                                class="form-control d-block w-100 {{ $errors->has('leavetype') ? 'is-invalid' : '' }}"
                                                id="leavetype"
                                                required=""
                                        >
                                            <option value=""> Choose... </option>
                                            @foreach(\App\Models\Leave\Leavetype::All() as $leavetype)
                                                <option value="{{ $leavetype->id }}" {{ old("leavetype",$leaveapprover->leavetype_id) == $leavetype->id ? "selected" : "" }}>
                                                    {{ $leavetype->name }} 
                                                </option>
                                            @endforeach
                                        </select>
                                         @if ($errors->has('leavetype'))
                                                        <span class="invalid-feedback">
                                                            <strong>{{ $errors->first('leavetype') }}</strong>
                                                        </span>
                                                    @endif
                      
                                </div>

                                   <hr>

                                            <div class="form-group col-md-12 mb-3">
                                        <label for="level">Level</label>
                                        <select name="level"
                                                class="form-control d-block w-100 {{ $errors->has('level') ? 'is-invalid' : '' }}"
                                                id="level"
                                                required=""
                                        >
                                            <option value=""> Choose... </option>
                                            @foreach(\App\Models\Leave\Leaveapprovallevel::All() as $level)
                                                <option value="{{ $level->id }}" {{ old("level",$leaveapprover->level_id) == $level->id ? "selected" : "" }}>
                                                    {{ $level->name }} 
                                                </option>
                                            @endforeach
                                        </select>
                                         @if ($errors->has('level'))
                                                        <span class="invalid-feedback">
                                                            <strong>{{ $errors->first('level') }}</strong>
                                                        </span>
                                                    @endif
                      
                                </div>
                                <button class="btn btn-primary btn-lg btn-block" type="submit">
                                    Update Approver
                                </button>
                            </div>

                                            </div>
                                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="page-sidebar border-left bg-white">
            <header class="sidebar-header d-sm-none">
                <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">
                    <a href="#" onclick="Looper.toggleSidebar()">
                        <i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Back</a>
                    </li>
                </ol>
                </nav>
            </header>
            <div class="sidebar-section">
                {{-- <h3 class="section-title"> I'm a sidebar </h3> --}}


            </div>
        </div>
    </div>
</div>


@endsection
<script type="text/javascript">
        function GetDays(){
                var dropdt = new Date(document.getElementById("name").value);
                var pickdt = new Date(document.getElementById("priority").value);
                return parseInt((pickdt - dropdt) / (24 * 3600 * 1000));
        }

        function cal(){
        if(document.getElementById("name")){
            document.getElementById("duration").value=GetDays();
        }  
    }

    </script>