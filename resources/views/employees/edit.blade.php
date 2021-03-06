@extends("layouts.master")

@section("content")

         <nav class="page-navs">
    <!-- .nav-scroller -->
    <div class="nav-scroller">
        <!-- .nav -->
        <div class="nav nav-center nav-tabs">
            <a class="nav-link" href="#tab-first" role="tab" data-toggle="tab">Personal Infomation
            </a>
             <a class="nav-link" href="#tab-tenth" role="tab" data-toggle="tab">
                Dates
            </a>
            <a class="nav-link" href="#tab-eight" role="tab" data-toggle="tab">
                Membership
                <span class="badge"></span>
            </a>
            <a class="nav-link" href="#tab-eleventh" role="tab" data-toggle="tab">
                Bank Detail
                <span class="badge"></span>
            </a>
            <a class="nav-link" href="#tab-third" role="tab" data-toggle="tab">
                Contact
                <span class="badge"></span>
            </a>
            <a class="nav-link"  href="#tab-second" role="tab" data-toggle="tab">
                Salary Info
                <span class="badge"></span>
            </a>
            <a class="nav-link" href="#tab-fifth" role="tab" data-toggle="tab">
                Other Info
                <span class="badge"></span>
            </a>
             <a class="nav-link" href="#tab-fourth" role="tab" data-toggle="tab">
                Login info
            </a>
           
        </div>
        <!-- /.nav -->
    </div>
</nav>        <!-- PAGE CONTENT WRAPPER -->
@include('includes.flash')
                <div class="page-content-wrap">
                
                    <div class="row">
                        <div class="col-md-12">
                             
                        <form action="{{ route("employees.update",$employee) }}"
                              method="POST"
                              class="card border-0"
                              enctype="multipart/form-data"
                        >
                            @csrf

                                                            
                                <div class="panel panel-default tabs">                            
                                    
                                    <div class="panel-body tab-content">
                                        <div class="tab-pane active" id="tab-first">
                                           <header class="card-header border-bottom-0">
                                Personal information
                            </header>
                                              <div class="form-group">
                                                <label class="col-md-3 col-xs-12 control-label">Employee Code</label>
                                                <div class="col-md-6 col-xs-12">                                                                                                                                                        
                                                    <input type="text" class="form-control" name="code" value="{{ old("code",$employee->code)}}"/>                                                    
                                                </div>
                                            </div>

                                            <div class="form-group">
                                           <label class="col-md-3 col-xs-12 control-label">Employee Title</label>
                                                <div class="col-md-6 col-xs-12">                                                                                                                                                        
                                                   
                                                                   <select name="title_id"
                                                class="form-control d-block w-100 {{ $errors->has('title_id') ? 'is-invalid' : '' }}"
                                                id="title_id"
                                               
                                        >
                                            <option value=""> Choose... </option>
                                            @foreach(\App\Models\title::latest()->get() as $title)
                                                <option value="{{ $title->id }}" {{ old("title_id",$employee->title_id) == $title->id ? "selected" : "" }}>
                                                    {{ $title->titlename }} 
                                                </option>
                                            @endforeach
                                        </select>
                                             @if ($errors->has('title_id'))
                                            <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('title_id') }}</strong>
                                                </span>
                                        @endif                                                 
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 col-xs-12 control-label">First Name</label>
                                                <div class="col-md-6 col-xs-12">                                                                                                                                                        
                                                     <input type="text"
                                               name="first_name"
                                               id="first_name"
                                               class="form-control {{ $errors->has('first_name') ? 'is-invalid' : '' }}"
                                               value="{{ $employee->first_name }}"
                                               placeholder="First name..."
                                        >
                                        @if ($errors->has('first_name'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('first_name') }}</strong>
                                            </span>
                                        @endif                                                   
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 col-xs-12 control-label">Last Name</label>
                                                <div class="col-md-6 col-xs-12">                                          
                                                       <input type="text"
                                               name="last_name"
                                               id="last_name"
                                               class="form-control {{ $errors->has('last_name') ? 'is-invalid' : '' }}"
                                               value="{{ $employee->last_name }}"
                                               placeholder="Last name..."
                                        >
                                        @if ($errors->has('last_name'))
                                            <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('last_name') }}</strong>
                                                </span>
                                        @endif
                                                </div>
                                            </div>

                                             <div class="form-group">
                                                <label class="col-md-3 col-xs-12 control-label">Other Name </label>
                                                <div class="col-md-6 col-xs-12">                                            
                                                      <input type="text"
                                               name="other_name"
                                               id="other_name"
                                               class="form-control {{ $errors->has('other_name') ? 'is-invalid' : '' }}"
                                               value="{{ $employee->other_name }}"
                                               placeholder="other name..."
                                        >
                                        @if ($errors->has('last_name'))
                                            <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('other_name') }}</strong>
                                                </span>
                                        @endif
                                                </div>
                                            </div>


                                            
                                            <div class="form-group">                                        
                                                <label class="col-md-3 col-xs-12 control-label">Gender</label>
                                                <div class="col-md-6 col-xs-12">  
                                                  <div class="custom-control custom-control-inline custom-radio">
                                                <input type="radio"
                                                       class="custom-control-input"
                                                       name="gender"
                                                       id="female"
                                                       {{ old("gender", $employee->gender) == "female" ? "checked" : "" }}
                                                       value="female"
                                                >
                                                <label class="custom-control-label" for="female">Female</label>
                                            </div>
                                            <div class="custom-control custom-control-inline custom-radio">
                                                <input type="radio"
                                                       class="custom-control-input"
                                                       name="gender"
                                                       {{ old("gender", $employee->gender) == "male" ? "checked" : "" }}
                                                       id="male"
                                                       value="male"
                                                >
                                                <label class="custom-control-label" for="male">Male</label>
                                            </div>
                                                </div>                                            
                                            </div>

                                             <div class="form-group">
                                                <label class="col-md-3 col-xs-12 control-label">Work E-mail</label>
                                                <div class="col-md-6 col-xs-12">                                                                                                                                                        
                                                     <input type="email"
                                               name="email"
                                               class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                               id="email"
                                               placeholder="you@example.com"
                                               value="{{ $employee->email }}"
                                        >
                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
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
                        </div>

                                            <div class="form-group">                                        
                                               <label for="branch">Branch <a href="" data-toggle="modal" data-target="#exampleModal1">+ Add new </a></label>
                                                <div class="col-md-5">
                                                       <select name="branch"
                                                class="form-control d-block w-100 {{ $errors->has('branch') ? 'is-invalid' : '' }}"
                                                id="branch"
                                                required=""
                                        >
                                            <option value=""> Choose... </option>
                                            @foreach(\App\Models\Branch::latest()->get() as $branch)
                                                <option value="{{ $branch->id }}" {{ old("branch",$employee->branch_id) == $branch->id ? "selected" : "" }}>
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
                                            </div>


                                            <div class="form-group">                                        
                                                <label for="department">Department <a href="" data-toggle="modal" data-target="#exampleModal">+ Add new </a></label>
                                                <div class="col-md-5">
                                                    <select name="department"
                                                class="form-control d-block w-100 {{ $errors->has('department') ? 'is-invalid' : '' }}"
                                                id="department"
                                                required=""
                                        >
                                            <option value=""> Choose... </option>
                                            @foreach(\App\Models\Department::latest()->get() as $department)
                                                <option value="{{ $department->id }}" {{ old("department",$employee->department_id) == $department->id ? "selected" : "" }}>
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
                                            </div>


                                               <div class="form-group">                                        
                                               <label for="job">Job <a href="" data-toggle="modal" data-target="#exampleModal2">+ Add new </a></label>
                                                <div class="col-md-5">
                                                    <select name="job"
                                                class="form-control d-block w-100 {{ $errors->has('job') ? 'is-invalid' : '' }}"
                                                id="job"
                                                required=""
                                        >
                                            <option value=""> Choose... </option>
                                            @foreach(\App\Models\Job::latest()->get() as $job)
                                                <option value="{{ $job->id }}" {{ old("job",$employee->job_id) == $job->id ? "selected" : "" }}>
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
                                           
                                           
                                            <div class="form-group">                                        
                                                <label class="col-md-3 col-xs-12 control-label">Include in Payroll?</label>
                                                <div class="col-md-2">
                                                      <div class="custom-control custom-control-inline custom-radio">
                                            <input type="radio"
                                                   class="custom-control-input"
                                                   name="active"
                                                   id="yes"
                                                   value="yes"
                                                   {{ old("active", $employee->active) == "yes" ? "checked" : "" }}
                                                       value="yes"
                                            >
                                            <label class="custom-control-label" for="yes">yes</label>
                                        </div>
                                        <div class="custom-control custom-control-inline custom-radio">
                                            <input type="radio"
                                                   class="custom-control-input"
                                                   name="active"
                                                   id="no"
                                                   value="no"
                                                    {{ old("active", $employee->active) == "no" ? "checked" : "" }}
                                                       value="no"
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

                                           
                                            <div class="form-group">
                                                <label class="col-md-3 col-xs-12 control-label">Declaration</label>
                                                <div class="col-md-6 col-xs-12">                                            
                                                    <textarea class="form-control" rows="5" name="about_employee">{{$employee->about_employee}}</textarea>
                                                    <span class="help-block">Any particular condition that the Administrator may require to know</span>
                                                </div>
                                            </div>                                           

                                            <div class="form-group">
                                                <label class="col-md-3 col-xs-12 control-label">E-mail</label>
                                                <div class="col-md-6 col-xs-12">                                                                                                                                        
                                                    <label class="check"><input type="checkbox" class="icheckbox" checked="checked"/> I want to get emails</label>
                                                    
                                                </div>
                                            </div>
                                           @include("employees._page_profilepic"); 
                                        </div>
                                        <div class="tab-pane" id="tab-second">
                                           Salary Info
                                            
                                            <div class="form-group">                                        
                                                <label class="col-md-3 col-xs-12 control-label">Pay type</label>
                                                <div class="col-md-5">
                                                    <select name="pay_type"
                                                 class="form-control {{ $errors->has('pay_type') ? 'is-invalid' : '' }}"
                                                id="pay_type"
                                        >   
                                        @if($employee->pay_type=="Salary")
                                             <option selected="selected" value="Salary">Salary</option>
                                            <option value="Hourly">Hourly</option>
                                            @elseif($employee->pay_type=="Hourly")
                                             <option value="Salary">Salary</option>
                                            <option selected="selected" value="Hourly">Hourly</option>
                                            @else
                                            <option value="">select--</option>
                                            <option value="Salary">Salary</option>
                                            <option value="Hourly">Hourly</option>
                                            @endif
                                        </select>
                                         @if ($errors->has('pay_type'))
                                            <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('pay_type') }}</strong>
                                                </span>
                                        @endif
                                                </div>  

                                                                                     
                                            </div>

                                                                                        
                                            <div class="form-group">
                                                <label class="col-md-3 col-xs-12 control-label">Basic Salary</label>
                                                <div class="col-md-3 col-xs-12">  

                                                    <input type="text"
                                                    readonly
                                               name="period_rate"
                                               class="form-control {{ $errors->has('period_rate') ? 'is-invalid' : '' }}"
                                               id="period_rate"
                                               value="{{ old("period_rate", optional($employee)->period_rate) }}" 
                                        ><a href="" data-toggle="modal" data-target="#exampleModalSalary">Change Salary </a>  

                                        @if ($errors->has('period_rate'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('period_rate') }}</strong>
                                            </span>
                                        @endif                                                   
                                                </div>
                                            </div>

                                             <div class="form-group">
                                                <label class="col-md-3 col-xs-12 control-label">Hourly Rate</label>
                                                <div class="col-md-3 col-xs-12">                                                                                                                                                        
                                                      <input type="text"
                                                      readonly
                                               name="hourly_rate"
                                               class="form-control {{ $errors->has('hourly_rate') ? 'is-invalid' : '' }}"
                                               id="hourly_rate"
                                               value="{{ old("hourly_rate", optional($employee)->hourly_rate) }}"
                                        >

                                        @if ($errors->has('hourly_rate'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('hourly_rate') }}</strong>
                                            </span>
                                        @endif                                                 
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="col-md-3 col-xs-12 control-label"></label>
                                                <div class="col-md-6 col-xs-12">                                                                                                                                        
                                                    
                                                </div>
                                            </div>

                                                <div class="form-group">
                                                <label class="col-md-3 col-xs-12 control-label">Pay Period</label>
                                                <div class="col-md-3 col-xs-12">                                                                                                                                                        
                                                        <select class="form-control {{ $errors->has('payperiod') ? 'is-invalid' : '' }}" name="payperiod">
                                                        <option  value='' selected="selected">Select </option>

                                                        @foreach($payperiods as $payperiod)

                                                         @if($payperiod->payperiodid ==$employee->pay_period)
                                                        <option  value='{{$employee->pay_period}}' selected="selected">{{$payperiod->payperioddesc }}</option>
                                                            @else
                                                          <option value="{{ $payperiod->payperiodid }}">{{ $payperiod->payperioddesc }}</option>
                                                           @endif 
                                                        @endforeach
                                                                                                             
                                                    </select>
                                             @if ($errors->has('payperiod'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('payperiod') }}</strong>
                                    </span>
                                @endif
                                            </div>
                                          </div>


                                             @include("employees._page_profilepic")
                                            
                                        </div>                                        
                                        <div class="tab-pane" id="tab-third">
                                          

                                          
                                            <div class="form-group">
                                                <label class="col-md-3 col-xs-12 control-label">Phone</label>
                                                <div class="col-md-6 col-xs-12">                                                                                                                                                        
                                                       <input type="text"
                                               name="phone"
                                               id="phone"
                                               class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}"
                                               value="{{ $employee->phone }}"
                                               placeholder="Phone number..."
                                        >
                                        @if ($errors->has('phone'))
                                            <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('phone') }}</strong>
                                                </span>
                                        @endif
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                 <div class="col-md-6 col-xs-12">                                                                                                                                                        
                                                       <label for="street">Street address</label>
                                            <input type="text"
                                                   name="street"
                                                   class="form-control {{ $errors->has('street') ? 'is-invalid' : '' }}"
                                                   id="street"
                                                   value="{{ old("street", optional($employee->address)->street) }}"
                                                   placeholder="1234 Main St"
                                            >
                                            @if ($errors->has('street'))
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('street') }}</strong>
                                                </span>
                                            @endif
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                
                                                <div class="col-md-6 col-xs-12">                                                                                                                                                        
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
                                                   value="{{ old("address", optional($employee->address)->address) }}"
                                            >
                                            @if ($errors->has('address'))
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('address') }}</strong>
                                                </span>
                                            @endif
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">                                        
                                                <label class="col-md-3 col-xs-12 control-label">Country</label>
                                                <div class="col-md-5">
                                                    <select name="country"
                                                    class="custom-select d-block w-100"
                                                    id="country"
                                            >
                                                <option value="Tanzania">Tanzania</option>
                                            </select>
                                                </div>                                            
                                            </div>

                                            <div class="form-group">                                        
                                                <label class="col-md-3 col-xs-12 control-label">City/Region</label>
                                                <div class="col-md-5">
                                                    <select name="state"
                                                    class="custom-select d-block w-100"
                                                    id="state"
                                                    required=""
                                            >
                                                <option value=""> Choose... </option>
                                                @foreach($states as $key => $state)
                                                    <option name="{{ $state["name"] }}" {{ old("state", optional($employee->address)->state) == $state["name"] ? "selected" : "" }}>
                                                        {{ $state["name"] }}
                                                    </option>
                                                @endforeach
                                            </select>
                                                </div>                                            
                                            </div>
                                          <div class="form-group">                                        
                                                <label class="col-md-3 col-xs-12 control-label">District</label>
                                                <div class="col-md-5">
                                                    <select class="form-control select" name="district">
                                                                                                                                             
                                                    </select>
                                                </div>                                            
                                            </div>


                                            <div class="form-group">
                                                <label class="col-md-3 col-xs-12 control-label">Zip Code</label>
                                                <div class="col-md-6 col-xs-12">                                                                                                                                                        
                                                    <input type="text"
                                                   name="postal_code"
                                                   class="form-control {{ $errors->has('postal_code') ? 'is-invalid' : '' }}"
                                                   id="postal_code"
                                                   value="{{ old("postal_code", optional($employee->address)->postal_code) }}"
                                            >
                                            @if ($errors->has('postal_code'))
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('postal_code') }}</strong>
                                                </span>
                                            @endif
                                                </div>
                                            </div>
                                             @include("employees._page_profilepic"); 
                                        </div>

                                            <div class="tab-pane" id="tab-fourth">
                                            <p>Login info</p> 
                                           
                                        </div>

                                        <div class="tab-pane"  id="tab-fifth">
                                        
                                      <h6 class="card-header">Other Details </h6>
                      <!-- .nav -->
                      <nav class="nav nav-tabs flex-column">
                        <a href="#" class="nav-link active"><b>Dependents</b> </a>
                        <ul>
                            @foreach( \App\Models\Dependant::where('employee_id',$employee->id)->get() as $dependant )
                          <li> {{$dependant->fullname}}</li>
                          @endforeach
                        </ul>
                        <a href="#" class="nav-link"><b>Education Qualification Details</b> </a>
                         <ul>
                            @foreach( \App\Models\Employeequalification::where('employee_id',$employee->id)->get() as  $equalification)
                          <li> computer siccss</li>
                          @endforeach
                        </ul>
                        <a href="#" class="nav-link"><b>Working Experience Details</b> </a>
                       
                                <table class="table">
                            <thead>
                                <tr>
                                    <th>Company</th>
                                     <th>Job Title</th>
                                     <th>Start Date</th>
                                    <th>End Date</th>
                                </tr>
                            </thead>
                            <tbody>
                             @foreach( \App\Models\WorkExperience::where('employee_id',$employee->id)->get() as $workexperience)
                                <tr>
                                    </td>
                                   
                                    <td>{{ $workexperience->companyname }}</td>
                                  
                                   
                                    <td>
                                       {{$workexperience->jobtitle}} 
                                    </td>
                                     <td>
                                       {{$workexperience->startdate}} 
                                    </td>
                                    <td>
                                        {{$workexperience->enddate }}
                                    </td>
                                  
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <a href="#" class="nav-link"><b>Referee details </b></a>
                         <ul>
                             @foreach( \App\Models\Employeequalification::where('employee_id',$employee->id)->get() as  $equalification)
                          <li> computer siccss</li>
                          @endforeach
                        </ul>
                      </nav>
                      <!-- /.nav -->
                  
 @include("employees._page_profilepic")
                                        </div>

                                         <div class="tab-pane"  id="tab-sixth">
                                       
                                      
                                         @include("employees._page_profilepic"); 
                                        </div>

                                        <div class="tab-pane"  id="tab-seventh">
                                         
                                          <div class="form-group">
                                                <label class="col-md-3 col-xs-12 control-label">Spouse Name</label>
                                                <div class="col-md-6 col-xs-12">                                                                                                                                                        
                                                    <input type="text" class="form-control" name="SpouseName" value="{{ $employee->spousename}}"/>                                                    
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 col-xs-12 control-label">Spouse Phone</label>
                                                <div class="col-md-6 col-xs-12">                                                                                                                                                        
                                                    <input type="text" class="form-control" name="SpousePhone" value="{{ $employee->spousephone}}"/>                                                    
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 col-xs-12 control-label">Spouse Email</label>
                                                <div class="col-md-6 col-xs-12">                                                                                                                                                        
                                                    <input type="text" class="form-control" name="SpouseEmail" value="{{ $employee->spouseemail}}"/>                                                    
                                                </div>
                                            </div>

                                          <div class="form-group">
                                                <label class="col-md-3 col-xs-12 control-label">Spouse Address</label>
                                                <div class="col-md-6 col-xs-12">                                            
                                                    <textarea class="form-control" rows="5" name="SpouseAddress"></textarea>
                                                    
                                                </div>
                                            </div> 

                                            <div class="form-group">
                                                <label class="col-md-3 col-xs-12 control-label">Next of Kin Name</label>
                                                <div class="col-md-6 col-xs-12">                                                                                                                                                        
                                                    <input type="text" class="form-control" name="NextOfKinName" value="{{ $employee->nextofkinname}}"/>                                                    
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 col-xs-12 control-label">Next of Kin Phone</label>
                                                <div class="col-md-6 col-xs-12">                                                                                                                                                        
                                                    <input type="text" class="form-control" name="NextOfKinPhone" value="{{ $employee->nextofkinphone}}"/>                                                    
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 col-xs-12 control-label">Next of Kin Email</label>
                                                <div class="col-md-6 col-xs-12">                                                                                                                                                        
                                                    <input type="text" class="form-control" name="NextOfKinEmail" value="{{ $employee->nextofkinemail}}"/>                                                    
                                                </div>
                                            </div>

                                          <div class="form-group">
                                                <label class="col-md-3 col-xs-12 control-label">Next of Kin Address</label>
                                                <div class="col-md-6 col-xs-12">                                            
                                                    <textarea class="form-control" rows="5" name="NextOfKinAdress"></textarea>
                                                    
                                                </div>
                                            </div>     
                                       @include("employees._page_profilepic"); 

                                        </div>
                                       

                                         <div class="tab-pane" id="tab-eight">
                                                    <header class="card-header border-bottom-0">
                                 Membership
                            </header>
                                      

                                          <div class="form-group">                                        
                                                <label class="col-md-3 col-xs-12 control-label">Social Security Scheme</label>
                                                <div class="col-md-5">
                                                    <select class="form-control select" name="sstype_id">
                                                       <option value=""> Choose... </option>
                                            @foreach(\App\Models\Prlsstype::latest()->get() as $sstype)
                                                <option value="{{ $sstype->id }}" {{ old("sstype_id",$employee->sstype_id) == $sstype->id ? "selected" : "" }}>
                                                    {{ $sstype->penname }} 
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

                                            <div class="form-group">
                                                <label class="col-md-3 col-xs-12 control-label">Social Security Number</label>
                                                <div class="col-md-6 col-xs-12">                                                                                                                                                        
                                                    <input type="text" name="ss_number" class="form-control" value="{{$employee->ss_number}}"/>
                                                </div>
                                            </div>

                                             <div class="form-group">                                        
                                                <label class="col-md-3 col-xs-12 control-label">Health Insuarance</label>
                                                <div class="col-md-5">
                                                    <select class="form-control select" name="health_id">
                                                            @foreach(\App\Prlhealthtype::latest()->get() as $health)
                                                <option value="{{ $health->id }}" {{ old("health_id",$employee->health_id) == $health->id ? "selected" : "" }}>
                                                    {{ $health->healthname }} 
                                                </option>
                                            @endforeach
                                        </select>
                                             @if ($errors->has('health_id'))
                                            <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('health_id') }}</strong>
                                                </span>
                                        @endif
                                                                                                                                                                   
                                                    </select>
                                                </div>                                            
                                            </div>

                                              <div class="form-group">
                                                <label class="col-md-3 col-xs-12 control-label">Health Insuarance Number</label>
                                                <div class="col-md-6 col-xs-12">                                                                                                                                                        
                                                    <input type="text" name="health_number" class="form-control" value="{{$employee->health_number}}"/>
                                                </div>
                                            </div>

                                                <div class="form-group">                                        
                                                <label class="col-md-3 col-xs-12 control-label">Workers Union</label>
                                                <div class="col-md-5">
                                                    <select class="form-control select" name="hdmf_id">
                                                            @foreach(\App\Prlhdmftype::latest()->get() as $hdmf)
                                                <option value="{{ $hdmf->id }}" {{ old("hdmf_id",$employee->hdmf_id) == $hdmf->id ? "selected" : "" }}>
                                                    {{ $hdmf->hdmfname }} 
                                                </option>
                                            @endforeach
                                        </select>
                                             @if ($errors->has('hdmf_id'))
                                            <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('hdmf_id') }}</strong>
                                                </span>
                                        @endif
                                                                                                                                                                   
                                                    </select>
                                                </div>                                            
                                            </div>


                                             <div class="form-group">
                                                <label class="col-md-3 col-xs-12 control-label">Servings Number</label>
                                                <div class="col-md-6 col-xs-12">                                                                                                                                                        
                                                    <input type="text" name="hdmf_number" class="form-control" value="{{$employee->hdmf_number}}"/>
                                                </div>
                                            </div>

                                            <div class="form-group">                                        
                                                <label class="col-md-3 col-xs-12 control-label">Deduct Social Security Scheme?</label>
                                                <div class="col-md-5">
                                                    <select class="form-control select" name="deduct_ss">
                                                      
                                                           @foreach($yesornos as $ss)
                                                        @if($ss->name==$employee->deduct_ss)
                                                        <option  value="{{$employee->deduct_ss}}" selected="selected">{{$ss->name}}</option>
                                                        @else
                                                        <option value="{{$ss->name}}">{{$ss->name}}</option>
                                                          @endif  
                                                        @endforeach
                                                                                                                                                                            
                                                    </select>
                                                </div>                                            
                                            </div>

                                            <div class="form-group">                                        
                                                <label class="col-md-3 col-xs-12 control-label">Deduct Tax?</label>
                                                <div class="col-md-5">
                                                    <select class="form-control select" name="deduct_tax">
                                                          @foreach($yesornos as $ss)
                                                        @if($ss->name==$employee->deduct_tax)
                                                        <option  value="{{$employee->deduct_tax}}" selected="selected">{{$ss->name}}</option>
                                                        @else
                                                        <option value="{{$ss->name}}">{{$ss->name}}</option>
                                                          @endif  
                                                        @endforeach
                                                                                                                                                                   
                                                    </select>
                                                </div>                                            
                                            </div>

                                            <div class="form-group">                                        
                                                <label class="col-md-3 col-xs-12 control-label">Deduct Workers Union?</label>
                                                <div class="col-md-5">
                                                    <select class="form-control select" name="deduct_hdmf">
                                                     @foreach($yesornos as $ss)
                                                        @if($ss->name==$employee->deduct_hdmf)
                                                        <option  value="{{$employee->deduct_hdmf}}" selected="selected">{{$ss->name}}</option>
                                                        @else
                                                        <option value="{{$ss->name}}">{{$ss->name}}</option>
                                                          @endif  
                                                        @endforeach
                                                                                                                                                                   
                                                    </select>
                                                </div>                                            
                                            </div>
                                             @include("employees._page_profilepic"); 

                                        </div>


                                         <div class="tab-pane" id="tab-eleventh">
                                        
                                        Bank Info 

                                          <div class="form-group">                                        
                                                <label class="col-md-3 col-xs-12 control-label">Bank</label>
                                                <div class="col-md-5">
                                                              <select class="form-control select" name="bank_id">
                                                       <option value=""> Choose... </option>
                                            @foreach(\App\Models\Bank::latest()->get() as $bank)
                                                <option value="{{ $bank->id }}" {{ old("bank_id",$employee->bank_id) == $bank->id ? "selected" : "" }}>
                                                    {{ $bank->bankname }} 
                                                </option>
                                            @endforeach
                                        </select>
                                             @if ($errors->has('bank'))
                                            <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('bank') }}</strong>
                                                </span>
                                        @endif
                                                </div>                                            
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 col-xs-12 control-label">Account Name</label>
                                                <div class="col-md-6 col-xs-12">                                                                                                                                                        
                                                    <input type="text" name="account_name" class="form-control" value="{{$employee->account_name}}"/>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 col-xs-12 control-label"> Account Number</label>
                                                <div class="col-md-6 col-xs-12">                                                                                                                                                        
                                                    <input type="text" name="account_number" class="form-control" value="{{$employee->account_number}}"/>
                                                </div>
                                            </div>

                                             @include("employees._page_profilepic"); 
                                        </diV>


                                         <div class="tab-pane" id="tab-ninth">
                                       
                                       <img src="" alt="J"/>
                                      
                                   </br>
                                       <a href=""> Add new Image </a>
                                       
                                        </div>


                                            <div class="tab-pane" id="tab-tenth">
                                   
                                                      
                                         <div class="form-group">
                                            <label class="col-md-3 control-label">Date of Birth</label>
                                            <div class="col-md-5">
                                                <input type="date" name="birth_date" class="form-control datepicker" value="{{$employee->birth_date}}">
                                            </div>
                                        </div>

                                         
                                         
                                         <div class="form-group">
                                            <label class="col-md-3 control-label">Hired Date</label>
                                            <div class="col-md-5">
                                                <input type="date" name="hire_date" class="form-control datepicker" value="{{$employee->hire_date}}">
                                            </div>
                                        </div>
                                    
                                         
                                         <div class="form-group">
                                            <label class="col-md-3 control-label">Probation End Date</label>
                                            <div class="col-md-5">
                                                <input type="date" name="probation_date" class="form-control datepicker" value="{{$employee->probation_date}}">
                                            </div>
                                        </div>
                                   
                                       
                                         
                                         <div class="form-group">
                                            <label class="col-md-3 control-label">End of Contract</label>
                                            <div class="col-md-5">
                                                <input type="date" name="terminate_date" class="form-control datepicker" value="{{$employee->terminate_date }}">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Retired Date</label>
                                            <div class="col-md-5">
                                                <input type="date" name="retired_date" class="form-control datepicker" value="{{$employee->retired_date}}">
                                            </div>
                                        </div>
                               
                                        
                                         <div class="form-group">               
                                                <label class="col-md-3 col-xs-12 control-label">End Of Contract Reason</label>
                                                <div class="col-md-5">
                                                    <select class="form-control select" name="terminatereason">
                                                                                                            

                                                   

                                                    </select>
                                                </div>                                            
                                            </div> 

                                             @include("employees._page_profilepic")
                                   
                                        </div>

                                        
                                        </div>
                                    <div class="panel-footer">                                                                        
                                        <button class="btn btn-primary pull-right">Update Employee<span class="fa fa-floppy-o fa-right"></span></button>
                                    </div>
                                </div>                                
                            
                            </form>
                            
                        </div>
                    </div>                    
                    
                </div>
                <!-- END PAGE CONTENT WRAPPER -->
                </div>            
            <!-- END PAGE CONTENT -->

        </div>
        <!-- END PAGE CONTAINER 

      @include("employees._page_profilepic");-->



                   <!-- Modal -->
                           <div  data-keyboard="false" data-backdrop="static"  class="modal fade" id="exampleModalSalary" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <form class="form-horizontal"  method="POST" action="{{ url('/addsalary') }}">
                        {!! csrf_field() !!}
                        <div class="modal-header">
                                                <h6 class="modal-title" id="exampleModalLabel">Salary Change</h6>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                        <div class="form-group{{ $errors->has('jobGroup') ? ' has-error' : '' }}">
                            <label for="employee" class="col-md-4 control-label">Employee</label>

                            <div class="col-md-6">
                                <select id="category"  class="form-control" name="employee">
                                    
                               @foreach (App\Employee::where('id',$employee->id)->get() as $employee)
                        <option value="{{ $employee->id }}"> {{ $employee->first_name }} {{ $employee->last_name }}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('employee'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('employee') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('SalaryFrom') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-4 control-label">Current Salary</label>

                            <div class="col-md-6">
                                <input id="SalaryFrom" type="text" readonly="true" class="form-control" name="SalaryFrom" value="{{ old('SalaryFrom',$employee->period_rate) }}">

                                @if ($errors->has('SalaryFrom'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('SalaryFrom') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('ChangedBy') ? ' has-error' : '' }}">
                            <label for="jobGroup" class="col-md-4 control-label">Change By</label>

                            <div class="col-md-6">
                                  <select class="form-control select" onchange='showDiv(this)' name="ChangedBy">

                                                     <option value='' selected > Select -- </option>
                                                        <option value="Percent"> Percent</option> 
                                                        <option value="Amount"> Amount</option>
                                                          
                                                                                                             
                                                    </select>

                                @if ($errors->has('ChangedBy'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ChangedBy') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                          <div id='Amount' style='display:none;' class="form-group{{ $errors->has('AmountChanged') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-4 control-label">Addition Amount </label>

                            <div class="col-md-6" >
                                <input  type="text" class="form-control" id="AmountChange" onkeyup='calculateNewSalaryByAmount();' name="AmountChanged" >

                                @if ($errors->has('AmountChanged'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('AmountChanged') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div id='Percent' style='display:none;' class="form-group{{ $errors->has('ParcentChange') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-4 control-label"> Percent </label>

                            <div class="col-md-6" >
                                <input  type="decimal"  class="form-control" id="PercentChange" onkeyup='calculateNewSalary();' name="ParcentChange"  >

                                @if ($errors->has('ParcentChange'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ParcentChange') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                           <div class="form-group{{ $errors->has('SalaryTo') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-4 control-label">New Salary</label>

                            <div class="col-md-6">
                                <input id="SalaryTo" type="text"  class="form-control" name="SalaryTo" >

                                @if ($errors->has('SalaryTo'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('SalaryTo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group{{ $errors->has('HourlyRate') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-4 control-label">Hourly  Rate</label>

                            <div class="col-md-6">
                                <input id="HourlyRate" type="text"  class="form-control" name="HourlyRate" 
                                       value="{{ old('HourlyRate',$employee->hourly_rate) }}">

                                @if ($errors->has('HourlyRate'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('HourlyRate') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                         <div class="form-group{{ $errors->has('SalaryTo') ? ' has-error' : '' }}">
                            <label for="DateChanged" class="col-md-4 control-label">Date</label>

                            <div class="col-md-6">
                                <input id="DateChanged" type="date"  class="form-control" name="DateChanged" >

                                @if ($errors->has('DateChanged'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('DateChanged') }}</strong>
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
                      
                       
                  

             <!--- department model -->

                                      <!-- Modal -->
                            <div  data-keyboard="false" data-backdrop="static"  class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                    <div  data-keyboard="false" data-backdrop="static" class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                           <div data-keyboard="false" data-backdrop="static" class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

             <script type="text/javascript">
function showDiv(select){
   if(select.value=="Percent"){
    document.getElementById('Percent').style.display = "block";
     document.getElementById('Amount').style.display = "none";
     
   } 


     else if(select.value=="Amount"){
    document.getElementById('Percent').style.display = "none";
     document.getElementById('Amount').style.display = "block";
    
   } 

   else {
  
     document.getElementById('Percent').style.display = "none";
     document.getElementById('Amount').style.display = "none";
     
   } 


  
} 

function calculateNewSalary() {
      var SalaryFrom = document.getElementById('SalaryFrom').value;
      var PercentChange = document.getElementById('PercentChange').value;
      var Amount= document.getElementById('Amount').value;

  
    var result = (((parseInt(PercentChange) / 100) * parseInt(SalaryFrom)) + parseInt(SalaryFrom));
      
   

      if (!isNaN(result)) {
         document.getElementById('SalaryTo').value = result;
   }
      
}




</script>
