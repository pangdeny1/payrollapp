@extends("layouts.master")

@section("content")
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"></div>

                <div class="panel-body">
                    @include('includes.flash')

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('monthlysssreport') }}">
                        {!! csrf_field() !!}

                         <fieldset>
                        <legend>Social Security Monthly Remmitance</legend>
                        <!-- grid row -->
                        <div class="row">
                          <!-- grid column -->
                          <div class="col-md-6">
                            <!-- .form-group -->
                            <div class="form-group">
                              <label for="sel1">Select Payrolls</label>
                              <select name="payroll" class="custom-select{{ $errors->has('payroll') ? ' has-error' : '' }}" id="sel1" required="">
                                <option value=""> Choose... </option>
                                @foreach(\App\Models\Payroll::All() as $payroll)
                                <option value="{{$payroll->id}}"> {{$payroll->payrolldesc}}</option>
                                @endforeach
                              </select>

                               @if ($errors->has('payroll'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('payroll') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <!-- /.form-group -->


                            <div class="form-group">
                              <label for="sel1">Social Security Type</label>
                              <select name="sss" class="custom-select{{ $errors->has('sss') ? ' has-error' : '' }}" id="sel1" required="">
                                <option value=""> Choose... </option>
                                @foreach(\App\Models\Prlsstype::All() as $sss)
                                <option value="{{$sss->id}}"> {{$sss->penname}}  </option>
                                @endforeach
                              </select>

                                @if ($errors->has('sss'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('sss') }}</strong>
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
