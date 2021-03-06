@extends("layouts.master")

@section("content")
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Add New Job</div>

                <div class="panel-body">
                    @include('includes.flash');

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/new_job') }}">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-4 control-label">Job Title</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}">

                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('jobGroup') ? ' has-error' : '' }}">
                            <label for="jobGroup" class="col-md-4 control-label">Job Group</label>

                            <div class="col-md-6">
                                <select id="category" type="jobGroup" class="form-control" name="jobGroup">
                                    <option value="">Select Job Group</option>
                                   
                               @foreach ($jobgroups as $jobgroup)
                        <option value="{{ $jobgroup->id }}">{{ $jobgroup->jobgroupname }}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('jopGroup'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('jobGroup') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                      

                        <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
                            <label for="message" class="col-md-4 control-label">Job Description</label>

                            <div class="col-md-6">
                                <textarea rows="10" id="message" class="form-control" name="message"></textarea>

                                @if ($errors->has('message'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('message') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-ticket"></i> Save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            @endsection