@extends("layouts.master")

@section("content")
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"></div>

                <div class="panel-body">
                    @include('includes.flash')

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('leaveformreport') }}">
                        {!! csrf_field() !!}

                         <fieldset>
                        <legend>leave Balance</legend>
                        <!-- grid row -->
                        <div class="row">
                          <!-- grid column -->


                           <div class="col-md-6">
                            <!-- .form-group -->
                          
                          <div class="col-md-6">
                            <!-- .form-group -->
                            <div class="form-group">
                              <label for="sel1">Select Leave type</label>
                              <select name="leavetype" class="custom-select{{ $errors->has('leavetype') ? ' has-error' : '' }}" id="sel1" required="">
                                <option value=""> Choose... </option>
                                @foreach(\App\Models\Leave\Leavetype::All() as $leavetype)
                                <option value="{{$leavetype->id}}"> {{$leavetype->name}}</option>
                                @endforeach
                              </select>

                               @if ($errors->has('leavetype'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('leavetype') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <!-- /.form-group -->

                               <div class="form-group">
                              <label for="sel1">Employee</label>
                              <select name="employee" class="custom-select{{ $errors->has('employee') ? ' has-error' : '' }}" id="sel1" required="">
                                <option value=""> Choose... </option>
                                @foreach(\App\Employee::All() as $employee)
                                <option value="{{$employee->id}}"> {{$employee->full_name}} {{$employee->id}} </option>
                                @endforeach
                              </select>

                                @if ($errors->has('employee'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('employee') }}</strong>
                                    </span>
                                @endif
                            </div>
                      

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-ticket"></i> Generate Report
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            @endsection


             <script type="text/javascript">
function showDiv(select){
   if(select.value=="Percent"){
    document.getElementById('hidden_div').style.display = "block";
     document.getElementById('hidden_div2').style.display = "block";
     document.getElementById('hidden_div3').style.display = "none";
     document.getElementById('hidden_div4').style.display = "none";
   } 

   else {
    document.getElementById('hidden_div2').style.display = "none";
     document.getElementById('hidden_div').style.display = "none";

     document.getElementById('hidden_div3').style.display = "block";
     document.getElementById('hidden_div4').style.display = "block";
   } 

  
} 
</script>
