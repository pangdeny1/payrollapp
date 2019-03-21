@extends("layouts.master")

@section("content")
<div class="wrapper">
    <div class="page has-sidebar">
        <div class="page-inner">
            <header class="page-title-bar">
                <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">
                     <a href="{{ route("home") }}">
                                        <i class="breadcrumb-icon fa fa-angle-left mr-2"></i> Dashboard
                                    </a>
                        <i class="breadcrumb-icon fa fa-angle-left mr-2"></i> Add Payroll</a>
                    </li>
                </ol>
                </nav>
              
            </header>
            @include('includes.flash')
            <div class="page-section">
                <div class="row">
                    <div class="col-md-12">
 
                        <form action="{{ url('/addpayrollperiod') }}"
                              method="POST"
                              class="card border-0"
                        >
                            @csrf
                            <header class="card-header border-bottom-0">
                                Payroll Infomation
                            </header>


                              <div class="card-body">
                                  <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="email">
                                            Pay periods
                                           
                                        </label>
                                                    <select  id="payperiod" onchange="calDesc()" class="form-control {{ $errors->has('payperiod') ? 'is-invalid' : '' }}" name="payperiod">
                                                        <option   value='' selected="selected">Select </option>

                                                        @foreach($payperiods as $payperiod)

                                                        
                                                         <option value="{{ $payperiod->payperiodid }}">{{ $payperiod->payperioddesc }}</option>
                                                          @endforeach
                                                                                                             
                                                    </select>
                                             @if ($errors->has('payperiod'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('payperiod') }}</strong>
                                    </span>
                                @endif
                                    </div>
                                </div>


                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="email">
                                           Months
                                           
                                        </label>
                                                          <select onchange="calDesc()"  class="form-control {{ $errors->has('FSMonth') ? 'is-invalid' : '' }}" 
                                                            name="FSMonth"
                                                            id="FSMonth">
                                                        <option value="">Select </option>
                                                        @foreach($months  as $month)
                                                        <option value="{{$month->id}}">{{$month->month}}</option> 
                                                        @endforeach                                                                                                             
                                                    </select>
                                             @if ($errors->has('FSMonth'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('FSMonth') }}</strong>
                                    </span>
                                @endif
                                    </div>
                                </div>

                                  <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="email">
                                          Years
                                           
                                        </label>
                                                    <select  id="FSYear" onchange="calDesc()"  class="form-control {{ $errors->has('FSYear') ? 'is-invalid' : '' }}"
                                                         name="FSYear">
                                                         <option value="">Select </option>
                                                        @foreach($years  as $FSYear)
                                                       
                                                        <option value="{{$FSYear->id}}">{{$FSYear->year}}</option>
                                                        
                                                        @endforeach
                                                                                                                                                                   
                                                    </select>
                                             @if ($errors->has('FSYear'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('FSYear') }}</strong>
                                    </span>
                                @endif
                                    </div>
                                </div>
<hr>
                                     <div class="form-row">
                                    <div class="form-group col-md-6">
                                       <label for="phone">Payroll ID</label>
                                 <input id="PayrollID" readonly type="text" class="form-control {{ $errors->has('PayrollID') ? 'is-invalid' : '' }}"
                                  name="PayrollID" value="{{ old('PayrollID') }}">

                                @if ($errors->has('PayrollID'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('PayrollID') }}</strong>
                                    </span>
                                @endif             
                            </div>
                                    <div class="form-group col-md-6">
                                      <label for="PayrollDesc">Payroll Desc</label>
                                     <input type="text" 
                                     class="form-control {{ $errors->has('PayrollDesc') ? 'is-invalid' : '' }}"
                                     id="results"
                                     name="PayrollDesc" value="{{ old('PayrollDesc') }}">

                                @if ($errors->has('PayrollDesc'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('PayrollDesc') }}</strong>
                                    </span>
                                @endif
                                    </div>
                                </div>



                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="first_name">Start Date</label>
                             <input type="date" name="StartDate" 
                             class="form-control {{ $errors->has('StartDate') ? 'is-invalid' : '' }}"
                              value="{{old('StartDate')}}">

                                @if ($errors->has('StartDate'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('StartDate') }}</strong>
                                    </span>
                                @endif              
                            </div>
                                    <div class="form-group col-md-6">
                                        <label for="last_name">End Date</label>
                                  <input type="date" name="EndDate" 
                                   class="form-control {{ $errors->has('EndDate') ? 'is-invalid' : '' }}"
                                  value="{{old('EndDate')}}">

                                @if ($errors->has('EndDate'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('EndDate') }}</strong>
                                    </span>
                                @endif
                                    </div>
                                </div>
                              
                              
                         
                            <header class="card-header border-bottom-0">
                                Deduct Information
                                </header>
                                <div class="card-body">
                                     <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="address">
                                                Deduct Social Security (SS)
                                               
                                            </label>
                                     
                                                    <select  class="form-control {{ $errors->has('DeductSSS') ? 'is-invalid' : '' }}" name="DeductSSS">
                                                        @foreach($yesornos  as $ss)
                                                       
                                                        <option value="{{$ss->id}}">{{$ss->name}}</option>
                                                        
                                                        @endforeach
                                                                                                                                                                   
                                                    </select>
                                             @if ($errors->has('DeductSSS'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('DeductSSS') }}</strong>
                                    </span>
                                @endif
                                        </div>
                                    </div>
                                    <div class="form-row">

                                        <div class="form-group col-md-12">
                                            <label for="street">Deduct Health</label>
                                           
                                                    <select class="form-control select"  class="form-control {{ $errors->has('DeductHealth') ? 'is-invalid' : '' }}" name="DeductHealth">
                                                        @foreach($yesornos  as $ss)
                                                       
                                                        <option value="{{$ss->id}}">{{$ss->name}}</option>
                                                        
                                                        @endforeach
                                                                                                                                                                   
                                                    </select>
                                             @if ($errors->has('DeductHealth'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('DeductHealth') }}</strong>
                                    </span>
                                @endif
                                        </div>
                                    </div>
                                   

                                      <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="address">
                                               Deduct HDMF
                                               
                                            </label>
                                             
                                                    <select class="form-control select"
                                                     class="form-control {{ $errors->has('DeductHdmf') ? 'is-invalid' : '' }}"
                                                      name="DeductHdmf">
                                                        @foreach($yesornos  as $ss)
                                                       
                                                        <option value="{{$ss->id}}">{{$ss->name}}</option>
                                                        
                                                        @endforeach
                                                                                                                                                                   
                                                    </select>
                                             @if ($errors->has('DeductHdmf'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('DeductHdmf') }}</strong>
                                    </span>
                                @endif
                                        </div>
                                    </div>
                                    
                                    <hr class="mb-4">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block">
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

<script type="text/javascript">

function calDesc() {
var score1=document.getElementById("FSMonth").value
var score2=document.getElementById("FSYear").value
var score3=document.getElementById("payperiod").value
var pick1=document.getElementById("FSMonth").options[document.getElementById("FSMonth").selectedIndex].text
var pick2=document.getElementById("FSYear").options[document.getElementById("FSYear").selectedIndex].text
var pick3=document.getElementById("payperiod").options[document.getElementById("payperiod").selectedIndex].text
var grandscore=score1-score2;

document.getElementById("results").value=pick1 + " "+ pick2;

document.getElementById("PayrollID").value=pick1.substr(0, 3)+pick2+"-"+pick3.substr(0,1);
   
}


</script>