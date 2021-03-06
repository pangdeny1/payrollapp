<aside class="app-aside">
    <div class="aside-content">
        <header class="aside-header d-block d-md-none">
            <!-- .btn-account -->
            <button class="btn-account" type="button" data-toggle="collapse" data-target="#dropdown-aside">
                <span class="user-avatar user-avatar-lg">
                    <img src="{{ asset("themes/looper/assets/images/avatars/profile.jpg")}}" alt="">
                </span>
                <span class="account-icon">
                    <span class="fa fa-caret-down fa-lg"></span>
                </span>

                <span class="account-summary">
                    <span class="account-name">{{ auth()->user()->full_name }}</span>
                    <span class="account-description">{{ auth()->user()->role() }}</span>
                </span>
            </button>

            <!-- .dropdown-aside -->
            <div id="dropdown-aside" class="dropdown-aside collapse">
                <!-- dropdown-items -->
                <div class="pb-3">
                    <a class="dropdown-item" href="#">
                        <span class="dropdown-icon oi oi-person"></span> Profile
                    </a>
                    <a class="dropdown-item" href="#">
                        <span class="dropdown-icon oi oi-person"></span> Change password
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">
                        <span class="dropdown-icon oi oi-account-logout"></span> Logout
                    </a>
                </div>
                <!-- /dropdown-items -->
            </div>
            <!-- /.dropdown-aside -->
        </header>

        <!-- .aside-menu -->
        <section class="aside-menu has-scrollable">
            <!-- .stacked-menu -->
            <nav id="stacked-menu" class="stacked-menu">

                <nav class="menu">
                    <a href="{{ route("home") }}" class="menu-link">
                        <span class="menu-text">Dashboard</span>
                    </a>

                    <hr>
                    <li class="menu-item has-child">
                  <a href="#" class="menu-link">
                    <i class="fa fa-address-card"></i>
                    
                    <span class="menu-text">Self Service</span>
                  </a>
                  <!-- child menu -->
                  <ul class="menu">
                    @foreach(\App\Models\Payroll::latest()->take(1)->get() as $payroll)
                    <li class="menu-item">
                      <a href="{{ url("mytimesheet",$payroll->id) }}" class="menu-link">{{ $payroll->payrollid }}-Timesheet</a>
                    </li>
                    @endforeach
                     <li class="menu-item">
                      <a href="{{ url("mytimesheet") }}" class="menu-link">My Timesheet</a>
                    </li>

                     <li class="menu-item">
                      <a href="{{ url("viewemployeequalifications") }}" class="menu-link">My Invoice </a>
                    </li>

                     <li class="menu-item">
                      <a href="{{ url("viewworkexpiriences") }}" class="menu-link">My Reports</a>
                    </li>
                                     
                </ul>
            </li>

                    @if(auth()->user()->manager=="yes")
                    <div class="menu-header">Employees</div>
                    <a href="{{ route("employees.index")}}" class="menu-link mb-2">
                        <i class="fas fa-user-friends text-muted mr-2"></i>
                        <span class="menu-text">Employee list</span>
                    </a>
                    @can("create", \App\Employee::class)
                    <a href="{{ route("employee.create")}}" class="menu-link mb-2">
                        <i class="fa fa-user-plus"></i>
                        <span class="menu-text">New Employee</span>
                    </a>
                    @endcan

                                         <li class="menu-item has-child">
                  <a href="#" class="menu-link">
                    <i class="fa fa-address-card"></i>
                    
                    <span class="menu-text">Hr data</span>
                  </a>
                  <!-- child menu -->
                  <ul class="menu">
                     <li class="menu-item">
                      <a href="{{ url("viewdependants") }}" class="menu-link">Dependants</a>
                    </li>

                     <li class="menu-item">
                      <a href="{{ url("viewemployeequalifications") }}" class="menu-link">Qualifications  </a>
                    </li>

                     <li class="menu-item">
                      <a href="{{ url("viewworkexpiriences") }}" class="menu-link">Work Experiences </a>
                    </li>
                  
                   <li class="menu-item">
                      <a href="{{ url("viewReferees") }}" class="menu-link">Referee details </a>
                    </li>
                </ul>
            </li>

                                          <li class="menu-item has-child">
                  <a href="#" class="menu-link">
                    <i class="menu-icon oi oi-list-rich"></i>
                    
                    <span class="menu-text">Location</span>
                  </a>
                  <!-- child menu -->
                  <ul class="menu">
                     <li class="menu-item">
                      <a href="{{ url("viewbranches") }}" class="menu-link">Branch</a>
                    </li>

                     <li class="menu-item">
                      <a href="{{ url("viewdepartments") }}" class="menu-link">Departments  </a>
                    </li>

                     <li class="menu-item">
                      <a href="{{ url("viewjobgroups") }}" class="menu-link">Job Group</a>
                    </li>
                  
                   <li class="menu-item">
                      <a href="{{ url("jobs") }}" class="menu-link">Jobs</a>
                    </li>
                </ul>
            </li>


                     
                    <hr>
                    <div class="menu-header">Payroll</div>
                    <a href="{{url('viewpayrollperiods')}}" class="menu-link mb-2">
                       <i class="fa fa-google-wallet" aria-hidden="true"></i>
                        <span class="menu-text">Payrolls list</span>
                    </a>
                     <a href="{{url('createpayrollperiod')}}" class="menu-link mb-2">
                        <i class="fas fa-plus text-muted mr-2"></i>
                        <span class="menu-text">New Payroll</span>
                    </a>

                      <a href="{{url('processpayroll')}}" class="menu-link mb-2">
                        <i class="fa fa-cogs" aria-hidden="true"></i>

                        <span class="menu-text">Process Payroll</span>
                    </a>

                      <a href="{{url('approvepayroll')}}" class="menu-link mb-2">
                       <i class="fa fa-thumbs-down" aria-hidden="true"></i>
                       
                        <span class="menu-text"> Payroll Payment</span>
                    </a>

                      <a href="{{url('authorizepayroll')}}" class="menu-link mb-2">
                        <i class="fa fa-thumbs-up" aria-hidden="true"></i>

                        <span class="menu-text">Authorize Payment</span>
                    </a>

                      <a href="{{url('closeopenpayroll')}}" class="menu-link mb-2">
                        <i class="fa fa-window-close" aria-hidden="true"></i>

                        <span class="menu-text">Close/Open Payroll</span>
                    </a>
                    <!--<a href="{{url('salaries')}}" class="menu-link mb-2">
                        <i class="fa fa-paypal"></i>
                        <span class="menu-text">Salaries</span>
                    </a> -->
                    
                    <a href="{{ route('payrolls.approves.index') }}" class="menu-link mb-2">
                        <i class="fa fa-phone" ></i>
                        <span class="menu-text">Send payroll approve</span>
                    </a>
                    @can("create", \App\Models\Payroll::class)

                     <a href="{{url('viewDailyTrans')}}" class="menu-link mb-2">
                        <i class="fa fa-calendar-plus-o" aria-hidden="true"></i>

                        <span class="menu-text">Timesheet Data Entry</span>
                    </a>
                   
                     <a href="{{url('viewotherincomes')}}" class="menu-link mb-2">
                        <i class="fa fa-plus-square"></i>
                        <span class="menu-text">Incomes</span>
                    </a>
                     <a href="{{url('viewotherdeductions')}}" class="menu-link mb-2">
                        <i class="fa fa-minus-square"></i>
                        <span class="menu-text">Deductions</span>
                    </a>
                     <a href="{{url('viewloans')}}" class="menu-link mb-2">
                       <i class="fa fa-minus-circle"></i>
                        <span class="menu-text">Loans</span>
                    </a>
                    
                    @endcan

                    <hr>
                    <div class="menu-header">Leave</div>
                    <a href="{{ route("leaves.index") }}" class="menu-link mb-2">
                        <i class="fa fa-paypal" aria-hidden="true"></i>
                        <span class="menu-text">Browse Leave forms</span>
                    </a>
                    <a href="{{ route("leaves.leaveapply") }}" class="menu-link mb-2">
                        <i class="fa fa-paypal" aria-hidden="true"></i>
                        <span class="menu-text">New Leave form</span>
                    </a>
                    <a href="{{ route("approvals.index") }}" class="menu-link mb-2">
                        <i class="fa fa-paypal" aria-hidden="true"></i>
                        <span class="menu-text">Proces Leave</span>
                    </a>

                    <div class="menu-header">Reports</div>

                              <li class="menu-item has-child">
                  <a href="#" class="menu-link">
                    <i class="far fa-chart-bar text-muted mr-2"></i>
                    
                    <span class="menu-text">Employee Reports</span>
                  </a>
                  <!-- child menu -->
                  <ul class="menu">
                     <li class="menu-item">
                      <a href="" class="menu-link">Employee Details</a>
                    </li>

                     <li class="menu-item">
                      <a href="" class="menu-link">Employee CV  </a>
                    </li>
                    <li class="menu-item">
                      <a href="" class="menu-link">Employee Head Count</a>
                    </li>
                    <li class="menu-item">
                      <a href="" class="menu-link">Newly Hired employees</a>
                    </li>
                </ul>
            </li>
                     <li class="menu-item has-child">
                  <a href="#" class="menu-link">
                    <i class="far fa-chart-bar text-muted mr-2"></i>
                    
                    <span class="menu-text">Payroll Reports</span>
                  </a>
                  <!-- child menu -->
                  <ul class="menu">
                    <li class="menu-item">
                      <a href="{{url("payrollregister")}}" class="menu-link">Payroll Register</a>
                    </li>
                    <li class="menu-item">
                      <a href="{{url("payrollsummeryform")}}" class="menu-link">Payroll Summery</a>
                    </li>
                    <li class="menu-item">
                      <a href=" {{url("payslipform")}} " class="menu-link">Payslips</a>
                    </li>
                   
                      <li class="menu-item">
                      <a href="" class="menu-link">Bank Transmmittal</a>
                    </li>
                      <li class="menu-item">
                      <a href="" class="menu-link">Cash Payment Listing</a>
                    </li>
                                 
                  </ul>
                  <!-- /child menu -->
               </li>

                 <li class="menu-item has-child">
                  <a href="#" class="menu-link">
                    <i class="far fa-chart-bar text-muted mr-2"></i>
                    
                    <span class="menu-text">Statutory Reports</span>
                  </a>
                  <!-- child menu -->
                  <ul class="menu">
                    <li class="menu-item">
                      <a href="{{url("monthlysssform")}}" class="menu-link">Pension Fund</a>
                    </li>

                     <li class="menu-item">
                      <a href="{{url("monthlytaxform")}} " class="menu-link">Tax Monthly return</a>
                    </li>
                     <li class="menu-item">
                      <a href="" class="menu-link">PAYE Income Tax P9</a>
                    </li>
                     <li class="menu-item">
                      <a href="" class="menu-link">Skill Development Levy(SDL)</a>
                    </li>
                   <li class="menu-item">
                      <a href="" class="menu-link">PAYE Employer Certificate P10</a>
                    </li>
                     <li class="menu-item">
                      <a href="" class="menu-link">Workers Compassation Fund(WCF)</a>
                    </li>


                     <li class="menu-item">
                      <a href="" class="menu-link">NHIF</a>
                    </li>
                </ul>
            </li>

                  <li class="menu-item has-child">
                  <a href="#" class="menu-link">
                    <i class="far fa-chart-bar text-muted mr-2"></i>
                    
                    <span class="menu-text">Leave Reports</span>
                  </a>
                  <!-- child menu -->
                  <ul class="menu">
                    <li class="menu-item">
                      <a href="{{url("leavebalance")}}" class="menu-link">Leave Balance</a>
                    </li>
                    <li class="menu-item">
                      <a href="{{url("leaveform")}}" class="menu-link">Leave forms</a>
                    </li>
                </ul>
            </li>
                   
                </nav>
                 @endif
            </nav>
        </section>
    </div>
</aside>