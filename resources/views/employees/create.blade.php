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
                        <i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Employees</a>
                    </li>
                </ol>
                </nav>
                <h1 class="page-title"> Employee registration </h1>
            </header>
            <div class="page-section">
                <div class="row">
                    <div class="col-md-12">

                        <form action="{{ route("employees.store") }}"
                              method="post"
                              class="card border-0"
                              enctype="multipart/form-data"
                        >
                            @csrf
                            <header class="card-header border-bottom-0">
                                Basic information
                            </header>
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="first_name">First name</label>
                                        <input type="text"
                                               name="first_name"
                                               id="first_name"
                                               class="form-control {{ $errors->has('first_name') ? 'is-invalid' : '' }}"
                                               value="{{ old("first_name") }}"
                                               placeholder="First name..."
                                        >
                                        @if ($errors->has('first_name'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('first_name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="last_name">Last name</label>
                                        <input type="text"
                                               name="last_name"
                                               id="last_name"
                                               class="form-control {{ $errors->has('last_name') ? 'is-invalid' : '' }}"
                                               value="{{ old("last_name") }}"
                                               placeholder="Last name..."
                                        >
                                        @if ($errors->has('last_name'))
                                            <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('last_name') }}</strong>
                                                </span>
                                        @endif
                                    </div>
                                </div>
                                  <div class="form-row">
                                 <div class="form-group col-md-6">
                                        <label for="last_name">Other name</label>
                                        <input type="text"
                                               name="other_name"
                                               id="other_name"
                                               class="form-control {{ $errors->has('other_name') ? 'is-invalid' : '' }}"
                                               value="{{ old("other_name") }}"
                                               placeholder="other name..."
                                        >
                                        @if ($errors->has('last_name'))
                                            <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('other_name') }}</strong>
                                                </span>
                                        @endif
                                    </div>

                                
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="hire_date">Date hired</label>
                                        <input type="date"
                                               name="hire_date"
                                               id="hire_date"
                                               class="form-control {{ $errors->has('hire_date') ? 'is-invalid' : '' }}"
                                               value="{{ old("hire_date") }}"
                                               placeholder="hire_date number..."
                                        >
                                        @if ($errors->has('hire_date'))
                                            <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('hire_date') }}</strong>
                                                </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="email">
                                            Email address
                                            <span class="badge badge-secondary">
                                                <em>Mandatory</em>
                                            </span>
                                        </label>
                                        <input type="email"
                                               name="email"
                                               class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                               id="email"
                                               placeholder="you@example.com"
                                               value="{{ old("email") }}"
                                        >
                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                 <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="phone">Phone Number</label>
                                        <input type="text"
                                               name="phone"
                                               id="phone"
                                               class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}"
                                               value="{{ old("phone") }}"
                                               placeholder="phone number..."
                                        >
                                        @if ($errors->has('phone'))
                                            <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('phone') }}</strong>
                                                </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label class="d-block">Gender identity</label>
                                        <div class="custom-control custom-control-inline custom-radio">
                                            <input type="radio"
                                                   class="custom-control-input"
                                                   name="gender"
                                                   id="female"
                                                   value="female"
                                                   {{ old("gender") == "female" ? "checked" : "" }}
                                            >
                                            <label class="custom-control-label" for="female">Female</label>
                                        </div>
                                        <div class="custom-control custom-control-inline custom-radio">
                                            <input type="radio"
                                                   class="custom-control-input"
                                                   name="gender"
                                                   id="male"
                                                   value="male"
                                                    {{ old("gender") == "male" ? "checked" : "" }}
                                            >
                                            <label class="custom-control-label" for="male">Male</label>
                                        </div>
                                    </div>


                                </div>
                                 <div class="form-row">
                                    <div class="form-group col-md-12 mb-3">
                                        <label for="image">Picture</label>
                                      
                                          <input type="file" name="image" 
                                            class="form-control {{ $errors->has('image') ? 'is-invalid' : '' }}">
                                             @if ($errors->has('image'))
                                            <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('image') }}</strong>
                                                </span>
                                        @endif
                            </div>

                            
                            <hr>
                            <header class="card-header border-bottom-0">
                              Location information
                            </header>
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="form-group col-md-12 mb-3">
                                        <label for="branch">Branch <a href="" data-toggle="modal" data-target="#exampleModal1">+ Add new </a></label>
                                        <select name="branch"
                                                class="form-control d-block w-100 {{ $errors->has('branch') ? 'is-invalid' : '' }}"
                                                id="branch"
                                             
                                        >
                                            <option value=""> Choose... </option>
                                            @foreach(\App\Models\Branch::latest()->get() as $branch)
                                                <option value="{{ $branch->id }}" {{ old("branch") == $branch->id ? "selected" : "" }}>
                                                    {{ $branch->branchname }} 
                                                </option>
                                            @endforeach
                                        </select>
                                             @if ($errors->has('branch'))
                                            <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('branch') }}</strong>
                                                </span>
                                        @endif
                                       
                                    </div>
                                     <div class="form-group col-md-12 mb-3">
                                        <label for="department">Department <a href="" data-toggle="modal" data-target="#exampleModal">+ Add new </a></label>
                                        <select name="department"
                                                class="form-control d-block w-100 {{ $errors->has('department') ? 'is-invalid' : '' }}"
                                                id="department"
                                               
                                        >
                                            <option value=""> Choose... </option>
                                            @foreach(\App\Models\Department::latest()->get() as $department)
                                                <option value="{{ $department->id }}" {{ old("department") == $department->id ? "selected" : "" }}>
                                                    {{ $department->departmentname }} 
                                                </option>
                                            @endforeach
                                        </select>

                                           @if ($errors->has('department'))
                                            <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('department') }}</strong>
                                                </span>
                                        @endif
                                        

                                       
                                    </div>
                       
                                       <div class="form-group col-md-12 mb-3">
                                        <label for="job">Job <a href="" data-toggle="modal" data-target="#exampleModal2">+ Add new </a></label>
                                        <select name="job"
                                                class="form-control d-block w-100 {{ $errors->has('job') ? 'is-invalid' : '' }}"
                                                id="job"
                                               
                                        >
                                            <option value=""> Choose... </option>
                                            @foreach(\App\Models\Job::latest()->get() as $job)
                                                <option value="{{ $job->id }}" {{ old("job") == $job->id ? "selected" : "" }}>
                                                    {{ $job->jobname }} 
                                                </option>
                                            @endforeach
                                        </select>

                                               @if ($errors->has('job'))
                                            <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('job') }}</strong>
                                                </span>
                                        @endif
                                       
                                    </div>
                                </div>

                                  </div>
                                       <div class="form-group col-md-12 mb-3">
                                        <label for="sstype_id">Social Security Scheme</label>
                                        <select name="sstype_id"
                                                class="form-control d-block w-100 {{ $errors->has('sstype_id') ? 'is-invalid' : '' }}"
                                                id="job"
                                               
                                        >
                                            <option value=""> Choose... </option>
                                            @foreach(\App\Models\Prlsstype::latest()->get() as $sstype)
                                                <option value="{{ $sstype->id }}" {{ old("sstype_id") == $sstype->id ? "selected" : "" }}>
                                                    {{ $sstype->penname }} {{ $sstype->id }}
                                                </option>
                                            @endforeach
                                        </select>
                                             @if ($errors->has('sstype_id'))
                                            <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('sstype_id') }}</strong>
                                                </span>
                                        @endif
                                       
                                    </div>
                                </div>
                           
                         
                            <hr>
                            <header class="card-header border-bottom-0">
                                Salary Information
                            </header>
                            <div class="card-body">
                             <div class="form-row">
                                    <div class="col-md-5 mb-3">
                                        <label for="pay_type">Pay Type</label>
                                        <select name="pay_type"
                                                 class="form-control {{ $errors->has('pay_type') ? 'is-invalid' : '' }}"
                                                id="pay_type"
                                        >   <option value="">select--</option>
                                            <option value="Salary" {{ old("pay_type") == "Salary" ? "selected" : "" }}>Salary</option>
                                            <option value="Hourly" {{ old("pay_type") == "Hourly" ? "selected" : "" }}>Hourly</option>

                                        </select>
                                         @if ($errors->has('pay_type'))
                                            <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('pay_type') }}</strong>
                                                </span>
                                        @endif
                                       
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="period_rate">Period rate</label>
                                        <input type="text"
                                               name="period_rate"
                                               class="form-control {{ $errors->has('period_rate') ? 'is-invalid' : '' }}"
                                               id="period_rate"
                                               value="{{ old("period_rate") }}"
                                        >
                                        @if ($errors->has('period_rate'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('period_rate') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="hourly_rate">Hourly rate</label>
                                        <input type="text"
                                               name="hourly_rate"
                                               class="form-control {{ $errors->has('hourly_rate') ? 'is-invalid' : '' }}"
                                               id="hourly_rate"
                                               value="{{ old("hourly_rate") }}"
                                        >
                                        @if ($errors->has('hourly_rate'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('hourly_rate') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                   
                                    <div class="form-group col-md-12">
                                        <label for="email">
                                            Pay periods
                                           
                                        </label>
                                                    <select  class="form-control {{ $errors->has('payperiod') ? 'is-invalid' : '' }}" name="payperiod">
                                                        <option >Select </option>

                                                        @foreach($payperiods as $payperiod)

                                                        
                                                         <option value="{{ $payperiod->payperiodid }}" {{ old("payperiod") == $payperiod->payperiodid ? "selected" : "" }}>{{ $payperiod->payperioddesc }}</option>
                                                          @endforeach
                                                                                                             
                                                    </select>
                                             @if ($errors->has('payperiod'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('payperiod') }}</strong>
                                    </span>
                                @endif
                                    </div>
                                </div>
                                    <div class="form-group col-md-12">
                                        <label class="d-block">Include in Payroll?</label>
                                        <div class="custom-control custom-control-inline custom-radio">
                                            <input type="radio"
                                                   class="custom-control-input"
                                                   name="active"
                                                   id="yes"
                                                   value="yes"
                                                   {{ old("active") == "yes" ? "checked" : "" }}
                                            >
                                            <label class="custom-control-label" for="yes">yes</label>
                                        </div>
                                        <div class="custom-control custom-control-inline custom-radio">
                                            <input type="radio"
                                                   class="custom-control-input"
                                                   name="active"
                                                   id="no"
                                                   value="no"
                                                    {{ old("active") == "no" ? "checked" : "" }}
                                            >
                                            <label class="custom-control-label" for="no">no</label>
                                             @if ($errors->has('active'))
                                            <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('active') }}</strong>
                                                </span>
                                        @endif
                                        </div>
                                    </div>
                                </div>
                                 <hr>
                            <header class="card-header border-bottom-0">
                                Address information
                            </header>
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="street">Street address</label>
                                        <input type="text"
                                               name="street"
                                               class="form-control {{ $errors->has('street') ? 'is-invalid' : '' }}"
                                               id="street"
                                               value="{{ old("street") }}"
                                               placeholder="1234 Main St"
                                        >
                                        @if ($errors->has('street'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('street') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="address">
                                            Address 2
                                            <span class="badge badge-secondary">
                                                    <em>Optional</em>
                                                </span>
                                        </label>
                                        <input type="text"
                                               name="address"
                                               class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}"
                                               id="address"
                                               placeholder="Apartment or suite"
                                               value="{{ old("address") }}"
                                        >
                                        @if ($errors->has('address'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('address') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-5 mb-3">
                                        <label for="country">Country</label>
                                        <select name="country"
                                                class="custom-select d-block w-100"
                                                id="country"
                                        >
                                            <option value="Tanzania">Tanzania</option>
                                        </select>
                                        <div class="invalid-feedback"> Please select a valid country. </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="state">State</label>
                                        <select name="state"
                                                class="form-control d-block w-100 {{ $errors->has('state') ? 'is-invalid' : '' }}"
                                                id="state"
                                               
                                        >
                                            <option value=""> Choose... </option>
                                            @foreach($states as $key => $state)
                                                <option name="{{ $state["name"] }}" {{ old("state") === $state["name"] ? "selected" : "" }}>
                                                    {{ $state["name"] }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback"> Please provide a valid state. </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="postal_code">Zip</label>
                                        <input type="text"
                                               name="postal_code"
                                               class="form-control {{ $errors->has('postal_code') ? 'is-invalid' : '' }}"
                                               id="postal_code"
                                               value="{{ old("postal_code") }}"
                                        >
                                        @if ($errors->has('postal_code'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('postal_code') }}</strong>
                                            </span>
                                        @endif
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



             <!--- department model -->

                                      <!-- Modal -->
                            <div  data-keyboard="false" data-backdrop="static" class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <form action="{{ url('/adddepartment') }}" method="post">
                                            @csrf
                                            <div class="modal-header">
                                                <h6 class="modal-title" id="exampleModalLabel">New Department</h6>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            
                                              <div class="form-group{{ $errors->has('departmentname') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-4 control-label">Department Name</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="departmentname" value="{{ old('departmentname') }}">

                                @if ($errors->has('departmentname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('departmentname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group{{ $errors->has('departmentlocation') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-4 control-label">Location</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="departmentlocation" value="{{ old('departmentlocation') }}">

                                @if ($errors->has('departmentlocation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('departmentlocation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                                              
                                            <hr>
                                            
                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-sm btn-primary">Save changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                      
                       
                   
                

                                    <!--   !-->


                                     <!--- branch model -->

                                      <!-- Modal -->
                                    <div data-keyboard="false" data-backdrop="static" class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                       <form class="form-horizontal" role="form" method="POST" action="{{ url('/addbranch') }}">
                        {!! csrf_field() !!}
                                            <div class="modal-header">
                                                <h6 class="modal-title" id="exampleModalLabel">New Branch</h6>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            
                                              <div class="form-group{{ $errors->has('departmentname') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-4 control-label">Branch Name</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="branchname" value="{{ old('branchname') }}">

                                @if ($errors->has('branchname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('branchname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group{{ $errors->has('departmentlocation') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-4 control-label">Location</label>

                            <div class="col-md-6">
                                 <input id="title" type="text" class="form-control" name="branclocation" value="{{ old('branclocation')}}">

                                @if ($errors->has('branclocation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('branclocation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                                              
                                            <hr>
                                            
                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-sm btn-primary">Save changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                      

                          <!--- job model -->

                                      <!-- Modal -->
                           <div  data-keyboard="false" data-backdrop="static" class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                         <form class="form-horizontal" role="form" method="POST" action="{{ url('/new_job') }}">
                        {!! csrf_field() !!}
                                                <div class="modal-header">
                                                <h6 class="modal-title" id="exampleModalLabel">New Job</h6>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-4 control-label">Job Title</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}">

                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('jobGroup') ? ' has-error' : '' }}">
                            <label for="jobGroup" class="col-md-4 control-label">Job Group</label>

                            <div class="col-md-6">
                                <select id="category" type="jobGroup" class="form-control" name="jobGroup">
                                    <option value="">Select Job Group</option>
                                   
                               @foreach (App\Models\Jobgroup::All() as $jobgroup)
                        <option value="{{ $jobgroup->id }}">{{ $jobgroup->jobgroupname }}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('jopGroup'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('jobGroup') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                      

                        <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
                            <label for="message" class="col-md-4 control-label">Job Description</label>

                            <div class="col-md-6">
                                <textarea rows="10" id="message" class="form-control" name="message"></textarea>

                                @if ($errors->has('message'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('message') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>            
                                            <hr>
                                            
                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-sm btn-primary">Save changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                      
                       
                   
                

                                    <!--   !-->
@endsection