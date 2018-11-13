@extends("layouts.master")

@section("content")
<div class="wrapper">
    <div class="page">
        <div class="sidebar-backdrop"></div>
        <!-- .page-cover -->
       
        <div class="wrapper">
            <div class="page">
                <div class="page-inner">
                    <header class="page-title-bar">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ url("home") }}">
                                        <i class="breadcrumb-icon fa fa-angle-left mr-2"></i> Dashboard
                                    </a>
                                </li>
                                <li class="breadcrumb-item active">
                                    leaveapprovers
                                </li>
                            </ol>
                        </nav>
                        <div class="d-sm-flex align-items-sm-center">
                          
                          
                        </div>
                    </header>
       

                <!-- .card -->
                <div class="card card-fluid">
                    <header class="card-header d-flex align-items-center">
                        <span class="mr-auto">Achievement</span>
                        <!-- .card-header-control -->
                        <div class="card-header-control font-weight-normal">
                            <!-- .dropdown -->
                       
                    </header>
                    <!-- grid row -->
                    <div class="row no-gutters">
                        <!-- grid column -->
                        <div class="col-lg-8 order-lg-4">
                            <!-- .card-body -->
                            <div class="card-body border-left"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                                <canvas id="canvas-achievement" class="chartjs chartjs-render-monitor" width="600" height="250" style="display: block; width: 600px; height: 250px;"></canvas>
                            </div>
                            <!-- /.card-body -->
                        </div>
                     
                </div>
            </div>
        </div>
    </div>
</div>
@endsection