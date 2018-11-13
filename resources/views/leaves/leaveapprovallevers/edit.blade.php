@extends("layouts.master")

@section("content")
<div class="wrapper">
    <div class="page has-sidebar">
        <div class="page-inner">
            <header class="page-title-bar">
                <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">
                    <a href="#">
                        <i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Edit leave Approval Level</a>
                    </li>
                </ol>
                </nav>
                <h4 class="page-title">leave Approval Level</h4>
            </header>
            <div class="page-section">
                <div class="row">
                    <div class="col-md-12">

                        <form action="{{ url("updateleaveapproval",$leaveapprovallevel->id) }}"
                              method="post"
                              class="card border-0"
                        >
                            @csrf
                           @include('includes.flash')
                            <div class="card-body">
                              
                                    

                                    <div class="form-row">
                        <!-- grid column -->
                        <div class="col-md-5 mb-3">
                         <label for="last_name">Name</label>
                                <input id="name"  type="text" name="name"
                             class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                              value="{{old('name',$leaveapprovallevel->name)}}">

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif  
                      
                        </div>
                        <!-- /grid column -->
                        <!-- grid column -->
                        <div class="col-md-4 mb-3">
                         <label for="last_name">Priority</label>
                                  <input  id="priority" type="number" name="priority"
                                   class="form-control {{ $errors->has('priority') ? 'is-invalid' : '' }}"
                                  value="{{old('priority',$leaveapprovallevel->priority)}}">

                                @if ($errors->has('priority'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('priority') }}</strong>
                                    </span>
                                @endif
                          
                        </div>
                      
                        <!-- /grid column -->
                      </div>
                      <!-- /.form-row -->
                      <hr class="mb-4">
                           <div class="form-group">
                          <label class="d-flex justify-content-between" for="lbl4">
                            <span>Description</span>
                            <span class="text-muted"></span>
                          </label>
                          <textarea name="remark"  class="form-control {{ $errors->has('remark') ? "is-invalid" : "" }}" id="lbl4" rows="3" placeholder=" description">
                            {{old('remark',$leaveapprovallevel->desctription)}}</textarea>
                            @if ($errors->has('remark'))
                                                        <span class="invalid-feedback">
                                                            <strong>{{ $errors->first('remark') }}</strong>
                                                        </span>
                                                    @endif
                        </div>
                                </div>

                                                    
                                <hr>
                                <button class="btn btn-primary btn-lg btn-block" type="submit">
                                    Save changes
                                </button>
                            </div>
                      </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="page-sidebar border-left bg-white">
            <header class="sidebar-header d-sm-none">
                <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">
                    <a href="#" onclick="Looper.toggleSidebar()">
                        <i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Back</a>
                    </li>
                </ol>
                </nav>
            </header>
            <div class="sidebar-section">
                {{-- <h3 class="section-title"> I'm a sidebar </h3> --}}


            </div>
        </div>
    </div>
</div>


@endsection
<script type="text/javascript">
        function GetDays(){
                var dropdt = new Date(document.getElementById("name").value);
                var pickdt = new Date(document.getElementById("priority").value);
                return parseInt((pickdt - dropdt) / (24 * 3600 * 1000));
        }

        function cal(){
        if(document.getElementById("name")){
            document.getElementById("duration").value=GetDays();
        }  
    }

    </script>