@extends("layouts.master")

@section("content")
  <div class="section-block">
                  <h2 class="section-title"> Approver:{{$leaveapprover->approvername->full_name}}</h2>
                  <p class="text-muted"> Tick to migrate employee </p>
                </div>
                <!-- /.section-block -->
                <!-- grid row -->
                <div class="row">
                  <!-- grid column -->
                  <div class="col-lg-6">
                    <!-- .card -->
                    <section class="card card-fluid">
                      <header class="card-header border-bottom-0"> Employee List </header>
                      <!-- .nestable -->
                      <div id="nestable01" class="dd">
                        <!-- .dd-list -->
                        <ol class="dd-list">
                            @foreach(\App\Employee::where('active','yes')->where('id','!=',$leaveapprover->approver)->latest()->get() as $employee)



                            @if(\App\Models\Leave\LeaveEmployeeApprover::where('active',1)->where("approver_id",$leaveapprover->id)->where('employee_id',$employee->id)->count()==0)
                            
                               <li class="dd-item" data-id="3">
                            <div class="dd-handle">
                              <span class="drag-indicator"></span>
                              <div> {{$employee->full_name}} </div>
                              <div class="dd-nodrag btn-group ml-auto">
                                    <form action="{{url("asignleaveapprover",4)}}"
                              method="post"
                              class="card border-0"
                        >
                           @csrf
                                <input value="{{$leaveapprover->approver}}" name="approver" type="hidden">
                                <input value=" {{$employee->id}} " name="employee" type="hidden">
                                <input name="approver_id" value="{{$leaveapprover->id}}" type="hidden">
                                <input name="leavetype" value="{{$leaveapprover->leavetype_id}}" type="hidden">
                                 <input name="level" value="{{$leaveapprover->level_id}}" type="hidden">
                                <a href="{{url("asignleaveapprover",4)}}">
                                <button class="btn btn-sm btn-secondary" type="submit">Asign</button>
                                </a>
                            </form>
                              </div>
                            </div>
                          </li>

                        @endif
                          
                          @endforeach
                                                
                        </ol>
                        <!-- /.dd-list -->
                      </div>
                      <!-- /.nestable -->
                      <!-- .card-footer -->
                      <footer class="card-footer bg-light">
                        <a href="#" class="card-footer-item justify-content-start">
                          <span>
                            <i class="fa fa-plus-circle mr-1"></i> Asign All checked</span>
                        </a>
                      </footer>
                      <!-- /.card-footer -->
                    </section>
                    <!-- /.card -->
                  </div>
                  <!-- /grid column -->
                  <!-- grid column -->
                  <div class="col-lg-6">
                    <!-- .card -->
                    <section class="card card-fluid">
                      <header class="card-header border-bottom-0"> Allocated Employees </header>
                      <!-- .nestable -->
                      <div id="nestable02" class="dd">
                        <!-- .dd-list -->
                        <ol class="dd-list">
                            @foreach(\App\Models\Leave\LeaveEmployeeApprover::where('active',1)->where('approver_id',$leaveapprover->id)->latest()->get() as $employee)
                            
                          <li class="dd-item" data-id="{{$employee->id}}">
                            <div class="dd-handle">
                              <span class="drag-indicator"></span>
                              <div> {{$employee->employee->full_name}} </div>
                              <div class="dd-nodrag btn-group ml-auto">
                               <a onclick="return confirm('Are you sure you want to Delete this record')" href="{{url("deactivateleaveapprover",$employee->id)}}">
                                <button class="btn btn-sm btn-secondary">
                                  <i class="far fa-trash-alt"></i>
                                </button>
                            </a>
                              </div>
                            </div>
                          </li>
                          @endforeach
                        
                        </ol>
                        <!-- /.dd-list -->
                      </div>
                      <!-- /.nestable -->
                      <!-- .card-footer -->
                      <footer class="card-footer bg-light">
                        <a href="#" class="card-footer-item justify-content-start">
                          <span>
                            <i class="fa fa-plus-circle mr-1"></i> Remove All</span>
                        </a>
                      </footer>
                      <!-- /.card-footer -->
                    </section>
                    <!-- /.card -->
                  </div>
                  <!-- /grid column -->
                </div>
                <!-- /grid row -->
                <!-- .section-block -->
                <div class="section-block"> <pre id="nestableOutput"></pre> </div>
                <!-- /.section-block -->
              </div>
              <!-- /.page-section -->
            </div>
            <!-- /.page-inner -->
          </div>
          <!-- /.p
@endsection