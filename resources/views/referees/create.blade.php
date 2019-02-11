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
                        <i class="breadcrumb-icon fa fa-angle-left mr-2"></i>referees</a>
                    </li>
                </ol>
                </nav>
                <h1 class="page-title">Referee </h1>
            </header>
            <div class="page-section">
                <div class="row">
                    <div class="col-md-12">

                        <form action="{{ url("storeleavebalance") }}"
                              method="post"
                              class="card border-0"
                        >
                            @csrf
                           @include('includes.flash')
                            <div class="card-body">
                              
                                    <div class="form-group col-md-12 mb-3">
                                        <label for="employee">Employee</label>
                                        <select name="employee"
                                                class="form-control d-block w-100 {{ $errors->has('employee') ? 'is-invalid' : '' }}"
                                                id="employee"
                                                required=""
                                        >
                                            <option value=""> Choose... </option>
                                            @foreach(\App\Employee::where('active','yes')->get() as $employee)
                                                <option value="{{ $employee->id }}" {{ old("employee") == $employee->id ? "selected" : "" }}>
                                                    {{ $employee->first_name }} {{ $employee->last_name }} 
                                                </option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback"> Please provide active employee </div>
                                    </div>
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="title">Position</label>
                                        <input type="text"
                                               name="title"
                                               class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}"
                                               id="title"
                                               value="{{ old("title") }}"
                                               placeholder="Tittle"
                                        >
                                        @if ($errors->has('title'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('title') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="company">
                                          Company
                                           
                                        </label>
                                        <input type="text"
                                               name="company"
                                               class="form-control {{ $errors->has('company') ? 'is-invalid' : '' }}"
                                               id="company"
                                               placeholder="Company/Organisation"
                                               value="{{ old("company") }}"
                                        >
                                        @if ($errors->has('company'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('company') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                               
                          
                            <div class="card-body">
                              <div class="form-row">
                        <!-- grid column -->
                        <div class="col-md-5 mb-3">
                         <label for="last_name">Phone</label>
                                <input id="phone"  type="text" name="phone" onchange="cal()"
                             class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}"
                              value="{{old('phone')}}">

                                @if ($errors->has('phone'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif  
                          <div class="invalid-feedback"> Please select a valid text. </div>
                        </div>
                        <!-- /grid column -->
                        <!-- grid column -->
                        <div class="col-md-4 mb-3">
                         <label for="last_name">Email</label>
                                  <input  id="email" type="text" name="email" onchange="cal()"
                                   class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                  value="{{old('email')}}">

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                         
                        </div>
                        <!-- /grid column -->
                        <!-- grid column -->
                        <div class="col-md-3 mb-3">
                          <label for="zip">Website</label>
                          <input type="text" name="website" class="form-control {{ $errors->has('website') ? 'is-invalid' : '' }}" id="website" value="{{old('website')}}" readonly required="">
                          @if ($errors->has('website'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('website') }}</strong>
                                    </span>
                                @endif
                          <div class="invalid-feedback"> </div>
                        </div>
                        <!-- /grid column -->
                      </div>
                      <!-- /.form-row -->


                      

                     
                        <!-- /grid column -->
                      <hr class="mb-4">
                           <div class="form-group">
                          <label class="d-flex justify-content-between" for="lbl4">
                            <span>company</span>
                            <span class="text-muted"></span>
                          </label>
                          <textarea name="company"  class="form-control {{ $errors->has('company') ? "is-invalid" : "" }}" id="lbl4" rows="3" placeholder=" description"></textarea>
                            @if ($errors->has('company'))
                                                        <span class="invalid-feedback">
                                                            <strong>{{ $errors->first('company') }}</strong>
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


@endsection
<script type="text/javascript">
        function GetDays(){
                var dropdt = new text(document.getElementById("phone").value);
                var pickdt = new text(document.getElementById("email").value);
                return parseInt((pickdt - dropdt) / (24 * 3600 * 1000));
        }

        function cal(){
        if(document.getElementById("phone")){
            document.getElementById("website").value=GetDays();
        }  
    }

    </script>


  <script type="text/javascript">
        function GetBalance(){
                var allocated = document.getElementById("allocated_days").value;
                var spent = document.getElementById("days_spent").value;
                return parseInt(allocated - spent);
        }

        function calc(){
        if(document.getElementById("allocated_days")){
            document.getElementById("balance").value=GetBalance();
        }  
    }

    </script>