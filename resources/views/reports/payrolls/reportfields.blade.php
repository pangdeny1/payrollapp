 @extends("layouts.master")

@section("content")
 <!-- .card-body -->
                  <div class="card-body border-top">
<form>
                      <!-- .fieldset -->
                      <fieldset>
                        <legend>Selects</legend>
                        <!-- grid row -->
                        <div class="row">
                          <!-- grid column -->
                          <div class="col-md-6">
                            <!-- .form-group -->
                            <div class="form-group">
                              <label for="sel1">Payrolls</label>
                              <select class="custom-select" id="sel1" required="">
                                <option value=""> Choose... </option>
                                @foreach(\App\Models\Payroll::All() as $payroll)
                                <option value="{{$payroll->id}}"> {{$payroll->id}} {{$payroll->payrolldesc}}</option>
                                @endforeach
                              </select>
                            </div>
                            <!-- /.form-group -->
                          </div>
                          <!-- /grid column -->
                          <!-- grid column -->
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="sel2">State</label>
                              <select class="custom-select" id="sel2" required="">
                                <option value=""> Choose... </option>
                                <option> California </option>
                              </select>
                            </div>
                          </div>
                          <!-- /grid column -->
                        </div>
                      </form>
                      </div>


                        @endsection