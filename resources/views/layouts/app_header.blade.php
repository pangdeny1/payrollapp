<header class="app-header">
        <!-- .top-bar -->
        <div class="top-bar">
          <!-- .top-bar-brand -->
          <div class="top-bar-brand">
            <a href="index-2.html">
               <img src="{{ asset("themes/looper/assets/images/bright_pay.png") }}" height="32" alt="">
            </a>
          </div>
          <!-- /.top-bar-brand -->
          <!-- .top-bar-list -->
          <div class="top-bar-list">
            <!-- .top-bar-item -->
            <div class="top-bar-item px-2 d-md-none d-lg-none d-xl-none">
              <!-- toggle menu -->
              <button class="hamburger hamburger-squeeze" type="button" data-toggle="aside" aria-label="Menu" aria-controls="navigation">
                <span class="hamburger-box">
                  <span class="hamburger-inner"></span>
                </span>
              </button>
              <!-- /toggle menu -->
            </div>
            <!-- /.top-bar-item -->
            <!-- .top-bar-item -->
            <div class="top-bar-item top-bar-item-full">
              <!-- .top-bar-search -->
              <div class="top-bar-search">
                <div class="input-group input-group-search">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <span class="oi oi-magnifying-glass"></span>
                    </span>
                  </div>
                  <input type="text" class="form-control" aria-label="Search" placeholder="Search"> </div>
              </div>
              <!-- /.top-bar-search -->
            </div>
            <!-- /.top-bar-item -->
            <!-- .top-bar-item -->
            <!-- .top-bar-item -->
            <div class="top-bar-item top-bar-item-right px-0">
              <!-- .nav -->
              <ul class="header-nav nav">
                <!-- .nav-item -->
                <li class="nav-item dropdown header-nav-dropdown">
                  <a class="nav-link has-badge" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="badge badge-pill badge-warning">{{\App\Models\Notification\Emailnotification::where('active',1)->where('sendto',auth()->user()->employee_id)->count() }}</span>
                    <span class="oi oi-pulse"></span>
                  </a>
                  <div class="dropdown-arrow"></div>
                  <!-- .dropdown-menu -->
                  <div class="dropdown-menu dropdown-menu-rich dropdown-menu-right">
                    <h6 class="dropdown-header stop-propagation">
                      <span>Activities
                        <span class="badge">({{\App\Models\Notification\Emailnotification::where('active',1)->where('sendto',auth()->user()->employee_id)->count() }})</span>
                      </span>
                    </h6>
                    <!-- .dropdown-scroll -->
                    <div class="dropdown-scroll has-scrollable">
                      <!-- .dropdown-item -->
                      @foreach(\App\Models\Notification\Emailnotification::where('active',1)->where('sendto',auth()->user()->employee_id)->get() as $notification)
                      <a href="#" class="dropdown-item unread">
                        <div class="user-avatar">
                          <img src="assets/images/avatars/uifaces15.jpg" alt=""> </div>
                        <div class="dropdown-item-body">
                          <p class="text"> {{$notification->title}} </p>
                          <span class="date">{{ $notification->created_at->diffForHumans() }}</span>
                        </div>
                      </a>
                      @endforeach
                     
                      <!-- /.dropdown-item -->
                    </div>
                    <!-- /.dropdown-scroll -->
                    <a href="{{route('leave.approvals')}}" class="dropdown-footer">All activities
                      <i class="fa fa-fw fa-long-arrow-alt-right"></i>
                    </a>
                  </div>
                  <!-- /.dropdown-menu -->
                </li>
                <!-- /.nav-item -->
                <!-- .nav-item -->
                <li class="nav-item dropdown header-nav-dropdown has-notified">
                  <a class="nav-link" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="oi oi-envelope-open"></span>
                  </a>
                  <div class="dropdown-arrow"></div>
                  <!-- .dropdown-menu -->
                  <div class="dropdown-menu dropdown-menu-rich dropdown-menu-right">
                    <h6 class="dropdown-header stop-propagation">
                      <span>Notifications</span>
                      <a href="#">Mark all as read</a>
                    </h6>
                    <!-- .dropdown-scroll -->
                    <div class="dropdown-scroll has-scrollable">
                      <!-- .dropdown-item -->
                      <a href="#" class="dropdown-item unread">
                        <div class="user-avatar">
                          <img src="assets/images/avatars/team1.jpg" alt=""> </div>
                        <div class="dropdown-item-body">
                          <p class="subject"> Hr and payroll System</p>
                          <p class="text text-truncate"> System menu comming soon</p>
                          <span class="date">2 hours ago</span>
                        </div>
                      </a>
                      <!-- /.dropdown-item -->
                      <!-- .dropdown-item -->
                  
                      <!-- /.dropdown-item -->
                    </div>
                    <!-- /.dropdown-scroll -->
                    <a href="app-messages.html" class="dropdown-footer">All messages
                      <i class="fa fa-fw fa-long-arrow-alt-right"></i>
                    </a>
                  </div>
                  <!-- /.dropdown-menu -->
                </li>
                <!-- /.nav-item -->
                <!-- .nav-item -->

                 @if(auth()->user()->manager=="yes")

                    <li class="nav-item dropdown header-nav-dropdown">
                        <a class="nav-link"
                           href="#"
                           data-toggle="dropdown"
                           aria-haspopup="true"
                           aria-expanded="false"
                        >
                            <i class="fas fa-cog"></i>
                        </a>

                        
                        <div class="dropdown-arrow"></div>
                        <div class="dropdown-menu">
                         
                        @can("view", \App\Models\Prlothinctype::class)
                            <a href="{{ url('incomestypes')}}" class="dropdown-item ">
                                <i class="fas fa-tree"></i> Incomes types
                            </a>
                            @endcan

                           @can("view", \App\Models\Prlothdedctype::class)
                            <a href="{{ url('deductionstypes')}}" class="dropdown-item ">
                                <i class="fas fa-tree"></i> Deductions types
                            </a>
                            @endcan

                            <div class="dropdown-divider"></div>

                            <a href="{{ url("viewsss") }}" class="dropdown-item ">
                                <i class="fas fa-th"></i> Social Security Types
                            </a>
                            
                             @can("view", \App\Prlhealthtype::class)
                            <a href="{{ url("viewhealth") }}" class="dropdown-item ">
                                <i class="fas fa-th"></i> Health Types
                            </a>
                            @endcan
                             @can("view", \App\Models\Prltaxtablerate::class)
                             <a href="{{ url("viewtax") }}" class="dropdown-item ">
                                <i class="fas fa-box"></i> Tax table
                            </a>
                              @endcan
                           

                            <div class="dropdown-divider"></div>

                            @can("view", \App\prlhdmftype::class)
                            <a href="{{ url("viewhdmf") }}" class="dropdown-item ">
                                <i class="fas fa-database"></i> Workers Union
                            </a>
                            @endcan

                            <div class="dropdown-divider"></div>

                            

                            @can("view", \App\Models\Company::class)
                            <a href="{{ url('viewcompany') }}" class="dropdown-item ">
                                <i class="fas fa-users"></i> Companies
                            </a>
                            @endcan

                            @can("view", \App\Models\Branch::class)
                            <a href="{{ url('viewbranches') }}" class="dropdown-item ">
                                <i class="fas fa-users"></i> Branches
                            @endcan

                            @can("view", \App\Models\Department::class)
                            <a href="{{ url('viewdepartments') }}" class="dropdown-item ">
                                <i class="fas fa-users"></i> Departments
                            </a>
                            @endcan
                            
                             @can("view", \App\Models\Leave\Leavetype::class)
                            <a href="{{ url('viewleavetypes') }}" class="dropdown-item ">
                                <i class="fas fa-users"></i> Leave types
                            </a>
                            @endcan
                         

                          

                              @can("view", \App\Models\Leave\Leavebalance::class)
                            <a href="{{ url('viewleavebalances') }}" class="dropdown-item ">
                                <i class="fas fa-users"></i> Leave Balances
                            </a>
                            @endcan

                              @can("view", \App\Models\Leave\Leaveapprovallevel::class)
                            <a href="{{ url('viewleaveapprovals') }}" class="dropdown-item ">
                                <i class="fas fa-users"></i> Leave Approval level
                            </a>
                            @endcan

                              @can("view", \App\Models\Leave\Leaveapprovalaction::class)
                            <a href="{{ url('viewleaveapprovalactions') }}" class="dropdown-item ">
                                <i class="fas fa-users"></i> Leave Approval Action
                            </a>
                            @endcan
                             
                             @can("view", \App\Models\Leave\Leaveapprover::class)
                            <a href="{{ url('viewleaveapprovers') }}" class="dropdown-item ">
                                <i class="fas fa-users"></i> Leave Approvers
                            </a>
                            @endcan



                           @can("view", \App\User::class)
                            <a href="{{ route("users.index") }}" class="dropdown-item ">
                                <i class="fas fa-users"></i> Users
                            </a>
                            @endcan

                            @can("view", \App\Role::class)
                            <a href="{{ route("roles.index") }}" class="dropdown-item ">
                                <i class="fas fa-user-lock"></i> Roles
                            </a>
                            @endcan
                        </div>
                         


                    </li>
                <li class="nav-item dropdown header-nav-dropdown">
                  <a class="nav-link" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="oi oi-grid-three-up"></span>
                  </a>
                  <div class="dropdown-arrow"></div>
                  <!-- .dropdown-menu -->
                  <div class="dropdown-menu dropdown-menu-rich dropdown-menu-right">
                    <!-- .dropdown-sheets -->
                    <div class="dropdown-sheets">
                      <!-- .dropdown-sheet-item -->

                      <div class="dropdown-sheet-item">
                        <a href="{{ route("roles.index") }}" class="tile-wrapper">
                          <span class="tile tile-lg bg-indigo">
                            <i class="oi oi-people"></i>
                          </span>
                          <span class="tile-peek">Roles</span>
                        </a>
                      </div>
                      <!-- /.dropdown-sheet-item -->
                      <!-- .dropdown-sheet-item -->
                      <div class="dropdown-sheet-item">
                        <a href="{{ route("employees.index") }}" class="tile-wrapper">
                          <span class="tile tile-lg bg-teal">
                            <i class="oi oi-fork"></i>
                          </span>
                          <span class="tile-peek">Employees</span>
                        </a>
                      </div>
                      <!-- /.dropdown-sheet-item -->
                      <!-- .dropdown-sheet-item -->
                      <div class="dropdown-sheet-item">
                        <a href="{{ route("users.index") }}" class="tile-wrapper">
                          <span class="tile tile-lg bg-pink">
                            <i class="oi oi-people"></i>
                          </span>
                          <span class="tile-peek">Users</span>
                        </a>
                      </div>
                      <!-- /.dropdown-sheet-item -->
                      <!-- .dropdown-sheet-item -->
                      <div class="dropdown-sheet-item">
                        <a href="#" class="tile-wrapper">
                          <span class="tile tile-lg bg-yellow">
                            <i class="oi oi-fire"></i>
                          </span>
                          <span class="tile-peek">Payrolls</span>
                        </a>
                      </div>
                      <!-- /.dropdown-sheet-item -->
                      <!-- .dropdown-sheet-item -->
                      <div class="dropdown-sheet-item">
                        <a href="#" class="tile-wrapper">
                          <span class="tile tile-lg bg-cyan">
                            <i class="oi oi-document"></i>
                          </span>
                          <span class="tile-peek">Leaves</span>
                        </a>
                      </div>

                       <div class="dropdown-sheet-item">
                        <a href="#" class="tile-wrapper">
                          <span class="tile tile-lg bg-cyan">
                            <i class="oi oi-document"></i>
                          </span>
                          <span class="tile-peek">Reports</span>
                        </a>
                      </div>

                      <!-- /.dropdown-sheet-item -->
                    </div>
                    <!-- .dropdown-sheets -->
                  </div>
                  <!-- .dropdown-menu -->
                </li>
                <!-- /.nav-item -->
                 @endif
              </ul>
              <!-- /.nav -->
              <!-- .btn-account -->
              <div class="dropdown">
                <button class="btn-account d-none d-md-flex" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="user-avatar">
                    <img src="{{ Avatar::create(auth()->user()->full_name)->toBase64() }}" />
                  </span>
                  <span class="account-summary pr-lg-4 d-none d-lg-block">
                     <span class="account-name">{{ auth()->user()->full_name }}</span>
                    <span class="account-description">  {{ auth()->user()->role() }} </span>
                  </span>
                </button>
                <div class="dropdown-arrow dropdown-arrow-left"></div>
                <!-- .dropdown-menu -->
                <div class="dropdown-menu">
                  <h6 class="dropdown-header d-none d-md-block d-lg-none">{{ auth()->user()->full_name }}</h6>
                  <a class="dropdown-item" href="{{ route("changepassword.index") }}">
                    <span class="dropdown-icon oi oi-person"></span> Profile</a>
                  
                        <a class="dropdown-item"
                           href="{{ route('logout') }}"
                           onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                        >
                            <i class="fas fa-sign-out-alt text-muted mr-2"></i>
                            {{ __('Logout') }}
                            <form id="logout-form"
                                  action="{{ route('logout') }}"
                                  method="POST"
                                  class="d-none"
                            >
                                @csrf
                            </form>
                        </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Help Center</a>
                  <a class="dropdown-item" href="#">Ask Forum</a>
                  <a class="dropdown-item" href="#">Keyboard Shortcuts</a>
                </div>
                <!-- /.dropdown-menu -->
              </div>
              <!-- /.btn-account -->
            </div>
            <!-- /.top-bar-item -->
          </div>
          <!-- /.top-bar-list -->
        </div>
        <!-- /.top-bar -->
      </header>
      <!-- /.app-header -->
      <!-- .app-aside -->