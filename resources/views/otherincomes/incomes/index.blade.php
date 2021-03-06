@extends("layouts.master")

@section("content")
    <div class="wrapper">
        <div class="page">
            <div class="page-inner">
                <header class="page-title-bar">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active">
                                <a href="#">
                                    <i class="breadcrumb-icon fa fa-angle-left mr-2"></i>
                                    Settings
                                </a>
                            </li>
                        </ol>
                    </nav>

                    <div class="d-sm-flex align-items-sm-center">
                        <h1 class="page-title mr-sm-auto mb-0">
                            Income types
                        </h1>
                        <div class="btn-toolbar">
                            <button type="button" class="btn btn-light">
                                <i class="oi oi-data-transfer-download"></i>
                                <span class="ml-1">Export</span>
                            </button>
                            <button type="button" class="btn btn-light">
                                <i class="oi oi-data-transfer-upload"></i>
                                <span class="ml-1">Import</span>
                            </button>
                            
                            <a href="{{url('createincometype')}}" class="btn btn-primary">
                                <span class="fas fa-plus mr-1"></span>
                                Add a income type

                            </a>
                           
                        </div>
                    </div>
                </header>
                <div class="page-section">
                    <section class="card card-fluid">
                        <header class="card-header">
                            <ul class="nav nav-tabs card-header-tabs">
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->query("status") ? "" : "active" }}"
                                       href=""
                                    >
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
                                    <input type="text" class="form-control" placeholder="Search record">
                                </div>
                            </div>
                            <div class="text-muted">  Showing {{ $incometypes->firstItem() }} to {{ $incometypes->lastItem() }} of {{ $incometypes->total() }} entries @include('includes.flash')</div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Taxable Income</th>
                                            <th>Account</th>
                                            <th>Action </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($incometypes as $incometype)
                                        <tr>
                                            <td>{{ $incometype->othincdesc }}</td>
                                            <td>{{ $incometype->incomedesc }}</td>
                                            <td>{{ $incometype->taxable }}</td>
                                            <td>
                                              {{ $incometype->accountcode }}</td>
                                                    <!-- Button trigger modal
                                                    <button type="button" class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#productModal{{ $incometype->id }}">
                                                        Add price
                                                    </button>-->
                                               

                                                <!-- Modal -->
                                                <div class="modal fade" id="productModal{{ $incometype->id }}" tabindex="-1" role="dialog" aria-labelledby="productModalLabel{{ $incometype->id }}" aria-hidden="true">
                                                  <form class="form-horizontal" role="form" method="POST" action="{{url('updatincometype/'.$incometype->id)}}">
                                                       @csrf
                                                        @method("patch")
                                                        
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="productModalLabel{{ $incometype->id }}">
                                                                       Income type ({{ $incometype->othincdesc }})
                                                                    </h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="card-body">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="name">Name</label>
                                            <input type="text"
                                                   name="name"
                                                   id="name"
                                                   class="form-control" value="{{ old("name",$incometype->othincdesc ) }}"
                                                   placeholder="income">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="description">Description</label>
                                            <textarea name="description"
                                                      id="description"
                                                      class="form-control"
                                                      rows="6"
                                                      placeholder="Type something..."
                                            >{{ old("description",$incometype->incomedesc) }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                                  <header class="card-header border-bottom-0">
                                                     Tax information
                                                        </header>
                                   <div class="card-body">
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="taxable">Taxable </label>
                                            <select name="taxable"
                                                    id="taxable"
                                                    class="form-control {{ $errors->has('taxable') ? "is-invalid" : "" }}"
                                            >
                                                 @if($incometype->taxable=="taxable")
                                                 <option selected="selected" value="taxable">Taxable</option>
                                                 <option value="non-taxable">Non Taxable</option>
                                                 
                                                @else
                                                 <option value="taxable">Taxable</option>
                                                 <option selected="selected"  value="non-taxable">Non Taxable</option>
                                                @endif
                                            </select>
                                            @if ($errors->has('taxable'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('taxable') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary">Save changes</button>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                    
                                                </div>
                                            </td>   
                                            <td class="align-middle text-right">
                                               <!-- 
                                                <a href="" class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#productModal{{ $incometype->id }}">
                                                    <i class="fa fa-pencil-alt"></i>
                                                    <span class="sr-only">Edit</span>
                                                </a>
-->
                                                 <a href="{{ url('editincometype/'.$incometype->id) }}" class="btn btn-sm btn-secondary" >
                                                    <i class="fa fa-pencil-alt"></i>
                                                    <span class="sr-only">Edit</span>
                                                </a>
                                                

                                                
                                                <a href="{{ url('deleteincometype/'.$incometype->id) }}" onclick="return confirm('Are you sure you want to Delete this record')" class="btn btn-sm btn-secondary">
                                                    <i class="far fa-trash-alt"></i>
                                                    <span class="sr-only">Remove</span>
                                                </a>
                                                
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            {{ $incometypes->links() }}
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
@endsection