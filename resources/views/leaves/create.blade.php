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
                        <i class="breadcrumb-icon fa fa-angle-left mr-2"></i>leaves</a>
                    </li>
                </ol>
                </nav>
                <h1 class="page-title">Leave Request </h1>
            </header>
            <div class="page-section">
                <div class="row">
                    <div class="col-md-12">

                        <form action="{{ route("leaves.store") }}"
                              method="post"
                              class="card border-0"
                        >{{ csrf_field() }}
                            @csrf
                           @include('includes.flash')
                            <div class="card-body">
                              
                                    <div class="form-group col-md-12 mb-3">
                                        <label for="employee">Employee</label>
                                        <select name="employee"
                                                class="form-control d-block w-100 {{ $errors->has('employee') ? 'is-invalid' : '' }}"
                                                id="employee"
                                                
                                        >
                                            <option value=""> Choose... </option>
                                            @foreach(\App\Employee::where('active','yes')->get() as $employee)
                                                <option value="{{ $employee->id }}" {{ old("employee") == $employee->id ? "selected" : "" }}>
                                                    {{ $employee->first_name }} {{ $employee->last_name }} 
                                                </option>
                                            @endforeach
                                        </select>
                                         @if ($errors->has('employee'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('employee') }}</strong>
                                    </span>
                                @endif 

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
                                                <option value="{{ $leavetype->id }}" {{ old("leavetype") == $leavetype->id ? "selected" : "" }}>
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
                                </div>


                                    <div class="form-group col-md-12 mb-3">
                                        Available Amount:

                                         <select name="balance" id="balance" class="form-control {{ $errors->has('duration') ? 'is-invalid' : '' }}">

                                         </select>
                                       
                                      </div>
                              
                            <div class="card-body">
                             

                                    <div class="form-row">
                        <!-- grid column -->
                        <div class="col-md-5 mb-3">
                         <label for="last_name">Date From</label>
                                <input id="start_date"  type="date" name="start_date" onchange="cal()"
                             class="form-control {{ $errors->has('start_date') ? 'is-invalid' : '' }}"
                              value="{{old('start_date')}}">

                                @if ($errors->has('start_date'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('start_date') }}</strong>
                                    </span>
                                @endif  
                         
                        </div>
                        <!-- /grid column -->
                        <!-- grid column -->
                        <div class="col-md-4 mb-3">
                         <label for="last_name">Date To</label>
                                  <input  id="end_date" type="date" name="end_date" onchange="cal()"
                                   class="form-control {{ $errors->has('end_date') ? 'is-invalid' : '' }}"
                                  value="{{old('end_date')}}">

                                @if ($errors->has('end_date'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('end_date') }}</strong>
                                    </span>
                                @endif
                        
                        </div>
                        <!-- /grid column -->
                        <!-- grid column -->
                        <div class="col-md-3 mb-3">
                          <label for="zip">Days requested </label>
                          <input type="text" name="duration" class="form-control {{ $errors->has('duration') ? 'is-invalid' : '' }}" id="duration" value="{{old('duration')}}" readonly required="">
                          @if ($errors->has('duration'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('duration') }}</strong>
                                    </span>
                                @endif
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
                          <textarea name="remark"  class="form-control {{ $errors->has('remark') ? "is-invalid" : "" }}" id="lbl4" rows="3" placeholder=" description"></textarea>
                            @if ($errors->has('remark'))
                                                        <span class="invalid-feedback">
                                                            <strong>{{ $errors->first('remark') }}</strong>
                                                        </span>
                                                    @endif
                        </div>
                                </div>


                                <hr>
                                <div class="form-group col-md-12 mb-3">
                                        <label for="approver">Approver</label>
                                        <select name="approver"
                                                class="form-control d-block w-100 {{ $errors->has('approver') ? 'is-invalid' : '' }}"
                                                id="approver"
                                                required=""
                                        >
                                            <option value=""> Choose... </option>
                                            @foreach(\App\Models\Leave\leaveapprover::all() as $approver)
                                                <option value="{{ $approver->id }}" {{ old("approver") == $approver->id ? "selected" : "" }}>
                                                    {{ $approver->approvername->fullname }}
                                                </option>
                                            @endforeach
                                        </select>
                                       
                                    </div>
                                                    
                                <hr>
                                <button class="btn btn-primary btn-lg btn-block" type="submit">
                                    Save changes
                                </button>
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


                <body>
    <div id="app">


    </div>
</body>


            </div>
        </div>
    </div>
</div>
  <script type="text/javascript" src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
        
    <script>
             $(document).ready(function() {
            $('#employee').on('change', function() {
                var employeeID = $(this).val();
                if(employeeID) {
                    $.ajax({
                        url: '/getLeaveBalance/'+employeeID,
                        type: "GET",
                        data : {"_token":"{{ csrf_token() }}"},
                        dataType: "json",
                        success:function(data) {
                            //console.log(data);
                          if(data){
                            $('#balance').empty();
                            $('#balance').focus;
                            $.each(data, function(key, value){
                            $('select[name="balance"]').append('<option value="'+ value.id +'">' + value.balance+' </option>');
                        });
                      }else{
                        $('#balance').empty();
                      }
                      }
                    });
                }else{
                  $('#balance').empty();
                }
            });
        });
        </script>

@endsection
<script type="text/javascript">
        function GetDays(){
                var dropdt = new Date(document.getElementById("start_date").value);
                var pickdt = new Date(document.getElementById("end_date").value);
                return parseInt((pickdt - dropdt) / (24 * 3600 * 1000));
        }

        function cal(){
        if(document.getElementById("start_date")){
            document.getElementById("duration").value=GetDays();
        }  
    }

    </script>