@extends("layouts.master")

@section("content")
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"></div>

                <div class="panel-body">
                    @include('includes.flash')

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('leaveformreport') }}">
                       
                        {{ csrf_field() }}

                         <fieldset>
                        <legend>leave Balance</legend>
                        <!-- grid row -->
                        <div class="row">
                          <!-- grid column -->


                           <div class="col-md-6">
                            <!-- .form-group -->
                          
                          <div class="col-md-6">
                            
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

                            <!-- .form-group -->
                            <div class="form-group">
                              <label for="leavetype">Select Leave type</label>
                              <select name="leavetype" class="custom-select{{ $errors->has('leavetype') ? ' has-error' : '' }}" id="leavetype">
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
                              <label for="leaveform">Leave Form</label>
                              <select name="leaveform" class="custom-select{{ $errors->has('leaveform') ? ' has-error' : '' }}" id="leaveform" >
                             
                              </select>

                                 @if ($errors->has('leaveform'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('leaveform') }}</strong>
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


                
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script type="text/javascript" src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
        
     <script>
             $(document).ready(function() {
            $('#leavetype').on('change', function() {
                var leavetypeID = $(this).val();
                if(leavetypeID) {
                    $.ajax({
                        url: '/findLeaveForm/'+leavetypeID,
                        type: "GET",
                        data : {"_token":"{{ csrf_token() }}"},
                        dataType: "json",
                        success:function(data) {
                            //console.log(data);
                          if(data){
                            $('#leaveform').empty();
                            $('#leaveform').focus;
                            $('#leaveform').append('<option value="">-- Select leaveform --</option>'); 
                            $.each(data, function(key, value){
                            $('select[name="leaveform"]').append('<option value="'+ value.id +'">leave form No: ' + value.id+' from: '+ value.start_date+' to: '+ value.end_date+'</option>');
                        });
                      }else{
                        $('#leaveform').empty();
                      }
                      }
                    });
                }else{
                  $('#leaveform').empty();
                }
            });
        });
        </script>


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
