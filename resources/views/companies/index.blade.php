@extends("layouts.master")
@section("content")
    @if($companies->count())
        <div class="wrapper">
            <div class="page">
                <div class="page-inner">
                    <header class="page-title-bar">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route("home") }}">
                                        <i class="breadcrumb-icon fa fa-angle-left mr-2"></i> Dashboard
                                    </a>
                                </li>
                                <li class="breadcrumb-item active">
                                 Companies
                                </li>
                            </ol>
                        </nav>
                        <div class="d-sm-flex align-items-sm-center">
                            <h1 class="page-title mr-sm-auto mb-0">
                               Companies 
                                
                            </h1>
                            <div class="btn-toolbar">
                                <a href="" class="btn btn-light">
                                    <i class="oi oi-data-transfer-download"></i>
                                    <span class="ml-1">Export as excel</span>
                                </a>
                                
                                @can("create", \App\Models\Company::class)
                                <a href="{{url('createcompany')}}" class="btn btn-primary">
                                    <span class="fas fa-plus mr-1"></span>
                                    New Companies
                                </a>
                                @endcan
                            </div>
                        </div>
                    </header>

                    <div class="page-section">
                        <section class="card shadow-1 border-0 card-fluid">
                            <header class="card-header">
                                <ul class="nav nav-tabs card-header-tabs">
                                    <li class="nav-item">
                                        <a class="nav-link {{ request()->query("status") ? "" : "active" }}" href="{{ url("viewcompany") }}">
                                            All
                                        </a>
                                    </li>
                                </ul>
                            </header>

                            <div class="card-body">

                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <span class="oi oi-magnifying-glass"></span>
                                            </span>
                                        </div>
                                        <form action="">
                                            <input type="text" name="q" class="form-control" placeholder="Search record...">
                                        </form>
                                    </div>
                                </div>

                                <!-- .table-responsive -->

                                 <div class="text-muted">  Showing {{ $companies->firstItem() }} to {{ $companies->lastItem() }} of {{ $companies->total() }} entries </div>

                                
                                <div class="text-muted"> 
                                 @include('includes.flash') </div>

                                

                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                   <tr>
                                    <th>#</th>
                                    <th>Code</th>
                                    <th>Name</th>
                                    <th>Address </th>
                                    <th>Phone</th>
                                     <th>Fax </th>
                                    <th>Email</th>
                                    
                                    <th>Action</th>
                                    
                                </tr>
                                        </thead>
                                        <tbody>
                                         
                                             @foreach ($companies as $company)
                                           <td>
                                  
                            
                                    </td>
                                    <td>
                                   {{$company->coycode}}
                                    </td>
                                    <td>
                                  {{ $company->coyname}}
                                    </td>
                                    <td>
                                        {{ $company->regoffice1}}
                                    </td>
                                    <td>
                                        {{ $company->telephone}}
                                    </td>
                                    <td>
                                        {{ $company->fax}}
                                    </td>
                                    <td>{{ $company->email}}</td>
                                    <td class="align-middle text-right">
                                                    @can("edit", \App\Models\Company::class)
                                                    <a href="{{ url('editcompany/'.$company->id) }}" class="btn btn-sm btn-secondary">
                                                        <i class="fa fa-pencil-alt"></i>
                                                        <span class="sr-only">Edit</span>
                                                    </a>
                                                    @endcan

                                                    @can("delete", \App\Models\Company::class)
                                                    <a href="{{ url('deletecompany/'.$company->id) }}" onclick="return confirm('Are you sure you want to Delete this record')"  class="btn btn-sm btn-secondary">
                                                        <i class="far fa-trash-alt"></i>
                                                        <span class="sr-only">Remove</span>
                                                    </a>
                                                    @endcan
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <!-- .pagination -->
                                  {{ $companies->links() }}
                                
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="wrapper">
            <!-- .empty-state -->
            <section id="notfound-state" class="empty-state">
                <!-- .empty-state-container -->
                <div class="empty-state-container">
                    <div class="state-figure">
                        <img class="img-fluid"
                             src="{{ asset("themes/looper/assets/images/illustration/img-7.png") }}"
                             alt=""
                             style="max-width: 300px"
                        >
                    </div>
                    <h3 class="state-header"> No Content, Yet. </h3>
                    <p class="state-description lead text-muted">
                        Use the button below to Register new .
                    </p>
                    @can("create", \App\Models\Company::class)
                    <div class="state-action">
                        <a href="{{url('createcompany')}}" class="btn btn-primary">Register new</a>
                    </div>
                    @endcan
                </div>
                <!-- /.empty-state-container -->
            </section>
            <!-- /.empty-state -->
        </div>
    @endif
@endsection