@extends("layouts.master")

@section("content")
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    #{{ $otherdeduction->id }} - {{ $otherdeduction->payrollname }}
                </div>

                <div class="panel-body">
                    @include('includes.flash')

                    <div class="payroll-info">
                        <p><b>payroll Description :: </b>{{ $otherdeduction->payrolldesc }}</p>
                      
                        <p>
                        @if ($otherdeduction->status === 'Open')
                            Status: <span class="label label-success">{{ $otherdeduction->status }}</span>
                        @else
                            Status: <span class="label label-danger">{{ $otherdeduction->status }}</span>
                        @endif
                        </p>
                        <p>Created on: {{ $otherdeduction->created_at->diffForHumans() }}</p>
                    </div>

                    <hr>


            </div>
        </div>
    </div>
@endsection