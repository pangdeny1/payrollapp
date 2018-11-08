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
                        >
                            @csrf
                          
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
                                                <option value="{{ $employee->id }}" {{ old("employee") === $employee->id ? "selected" : "" }}>
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
                                                <option value="{{ $leavetype->id }}" {{ old("leavetype") === $leavetype->id ? "selected" : "" }}>
                                                    {{ $leavetype->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback"> Please provide active leavetype </div>
                                    </div>
                                </div>
                            <div class="card-body">
                             
                                    <div class="form-group col-md-12">
                                                  <div class="form-group col-md-6">
                                        <label for="first_name">Date From</label>
                             <input type="date" name="start_date" 
                             class="form-control {{ $errors->has('start_date') ? 'is-invalid' : '' }}"
                              value="{{old('start_date')}}">

                                @if ($errors->has('start_date'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('start_date') }}</strong>
                                    </span>
                                @endif              
                            </div>
                                    <div class="form-group col-md-6">
                                        <label for="last_name">Date To</label>
                                  <input type="date" name="end_date" 
                                   class="form-control {{ $errors->has('end_date') ? 'is-invalid' : '' }}"
                                  value="{{old('end_date')}}">

                                @if ($errors->has('end_date'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('end_date') }}</strong>
                                    </span>
                                @endif
                                    </div>
                                                <div class="form-group col-md-6">
                                        <label for="last_name">Balance</label>
                                  <input type="number" name="balance" 
                                   class="form-control {{ $errors->has('balance') ? 'is-invalid' : '' }}"
                                  value="{{old('balance')}}">

                                @if ($errors->has('balance'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('balance') }}</strong>
                                    </span>
                                @endif
                                    </div>
                           <div class="form-group">
                          <label class="d-flex justify-content-between" for="lbl4">
                            <span>Remark</span>
                            <span class="text-muted"></span>
                          </label>
                          <textarea name="remark" class="form-control" id="lbl4" rows="3" placeholder=" description"></textarea>
                        </div>
                                </div>  
                                      </div>
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
            </div>
        </div>
    </div>
</div>
@endsection