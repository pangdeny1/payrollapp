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
                            @foreach(\App\Employee::latest()->get() as $employee)
                          <li class="dd-item" data-id="{{$employee->id}}">
                            <div class="dd-handle">
                              <span class="drag-indicator"></span>
                              <div> {{$employee->full_name}} </div>
                              <div class="dd-nodrag btn-group ml-auto">
                                <button class="btn btn-sm btn-secondary">asign</button>
                                
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
                            @foreach(\App\Models\Leave\leaveEmployeeApprover::latest()->get() as $employee)
                            
                          <li class="dd-item" data-id="{{$employee->id}}">
                            <div class="dd-handle">
                              <span class="drag-indicator"></span>
                              <div> {{$employee->employee->full_name}} </div>
                              <div class="dd-nodrag btn-group ml-auto">
                               
                                <button class="btn btn-sm btn-secondary">
                                  <i class="far fa-trash-alt"></i>
                                </button>
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