@extends("layouts.master")

@section("content")
    <div class="wrapper">
        <div class="page has-sidebar">
            <div class="sidebar-backdrop"></div>
            <div class="page-inner">
                <header class="page-title-bar">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active">
                                <a href="#">
                                    <i class="breadcrumb-icon fa fa-angle-left mr-2"></i> Settings
                                </a>
                            </li>
                        </ol>
                    </nav>
                    <h1 class="page-title"> Edit role </h1>
                </header>

                <div class="page-section">
                    <div class="section-block">
                        <div class="d-xl-none">
                            <button class="btn btn-danger btn-floated" type="button" data-toggle="sidebar">
                                <i class="fa fa-th-list"></i>
                            </button>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <form action="{{ route("roles.update", $role) }}"
                                  method="post"
                                  class="card"
                            >
                                @csrf
                                @method("put")
                                <header class="card-header border-bottom-0">
                                    Edit role
                                </header>
                                <div class="card-body">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="name">Name</label>
                                            <input type="text"
                                                   name="name"
                                                   id="name"
                                                   class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                                   value="{{ old("name", $role->name) }}"
                                                   placeholder="marketing-manager..."
                                            >
                                            @if ($errors->has('name'))
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="title">Title</label>
                                            <input type="text"
                                                   name="title"
                                                   id="title"
                                                   class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}"
                                                   value="{{ old("title", $role->title) }}"
                                                   placeholder="Marketing manager..."
                                            >
                                            @if ($errors->has('title'))
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('title') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="description">Description</label>
                                            <textarea name="description"
                                                      id="description"
                                                      class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}"
                                                      rows="6"
                                                      placeholder="Type something..."
                                            >{{ old("description", $role->description) }}</textarea>
                                            @if ($errors->has('description'))
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('description') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                     <hr>
                                <div class="card-body">
                                    <div class="mb-4">User with this role can:</div>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th class="text-right">View</th>
                                                <th class="text-right">Create</th>
                                                <th class="text-right">Edit</th>
                                                <th class="text-right">Delete </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                    
                                            
                                          
                                            <tr>
                                                <td>Dashboard</td>
                                                <td class="text-right">
                                                    <input type="checkbox" name="permissions[dashbord][view]" value="purchase-view">
                                                </td>
                                                <td class="text-right"></td>
                                                <td class="text-right"></td>
                                                <td class="text-right"></td>
                                            </tr>

                                              <tr>
                                                <td>Employees</td>
                                                 @foreach(\App\Abilitie::where('entity_type','App\Employee')->get() as $ability)
                                                <?php $string=explode(' ',$ability->title); ?>
                                                <td class="text-right">
                                                    <input type="checkbox"  @if(!empty(\App\Permission::where('ability_id',$ability->id)->first())) checked="true" @endif name="permissions[{{$string[1]}}][$ability->name]" value="{{$ability->name}}-{{$string[1]}}]">
                                                </td>
                                                                                           
                                                @endforeach
                                            </tr>
                                      
                                           
                                            <tr>
                                                <td> Leaves</td>
                                                 @foreach(\App\Abilitie::where('entity_type','App\Models\leave\Leave')->get() as $ability)
                                                <?php $string=explode(' ',$ability->title); ?>
                                                <td class="text-right">
                                                    <input type="checkbox"  @if(!empty(\App\Permission::where('ability_id',$ability->id)->first())) checked="true" @endif name="permissions[{{$string[1]}}][$ability->name]" value="{{$ability->name}}-{{$string[1]}}]">
                                                </td>
                                                                                           
                                                @endforeach
                                            </tr>

                                             <tr>
                                                <td>Payrolls</td>
                                                 @foreach(\App\Abilitie::where('entity_type','App\Models\Payroll')->get() as $ability)
                                                <?php $string=explode(' ',$ability->title); ?>
                                                <td class="text-right">
                                                    <input type="checkbox"  @if(!empty(\App\Permission::where('ability_id',$ability->id)->first())) checked="true" @endif name="permissions[{{$string[1]}}][$ability->name]" value="{{$ability->name}}-{{$string[1]}}]">
                                                </td>
                                                                                           
                                                @endforeach
                                            </tr>

                                             <tr>
                                                <td>Users</td>
                                                 @foreach(\App\Abilitie::where('entity_type','App\User')->get() as $ability)
                                                <?php $string=explode(' ',$ability->title); ?>
                                                <td class="text-right">
                                                    <input type="checkbox"  @if(!empty(\App\Permission::where('ability_id',$ability->id)->first())) checked="true" @endif name="permissions[{{$string[1]}}][{{$string[0]}}]" value="{{$string[0]}}-{{$string[1]}}]">
                                                </td>
                                                @endforeach
                                            </tr>
                                            

                                              <tr>
                                                <td>Reports</td>
                                                <td class="text-right">
                                                    <input type="checkbox" name="permissions[reports][view]" value="purchase-view">
                                                </td>
                                                <td class="text-right"></td>
                                                <td class="text-right"></td>
                                                <td class="text-right"></td>
                                            </tr>

                                        </tbody>
                                    </table>
                                    <hr>
                                    <button class="btn btn-block btn-primary">Save changes</button>
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
                                    <i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Back
                                </a>
                            </li>
                        </ol>
                    </nav>
                </header>
                <div class="sidebar-section">
                    {{--<h3 class="section-title"> I'm a sidebar </h3>--}}
                </div>
            </div>
        </div>
    </div>
@endsection