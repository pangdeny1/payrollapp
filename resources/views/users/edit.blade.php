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
                                    <i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Users</a>
                            </li>
                        </ol>
                    </nav>
                    <h1 class="page-title"> Edit user </h1>
                </header>
                <div class="page-section">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="{{ route("users.update", $user) }}"
                                  method="post"
                                  class="card border-0"
                            >
                                @csrf
                                @method("put")
                                <header class="card-header border-bottom-0">
                                    Basic information
                                </header>
                                <div class="card-body">
                                
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="email">
                                                Username/Email
                                            </label>
                                            <input type="email"
                                                   name="email"
                                                   class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                                   id="email"
                                                   value="{{ old("email",$user->email) }}"
                                                   placeholder="you@example.com"
                                            >
                                            @if ($errors->has('email'))
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                      <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="email">
                                                Password
                                            </label>
                                            <input type="text"
                                                   name="password"
                                                   class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                                                   id="password"
                                                   value="{{ old("password") }}"


                                                   
                                            >
                                            @if ($errors->has('password'))
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>


                                <div class="form-group col-md-12 mb-3">
                                        <label for="employee">Employee</label>
                                        <select name="employee"
                                                class="form-control d-block w-100 {{ $errors->has('employee') ? 'is-invalid' : '' }}"
                                                id="employee"
                                                required=""
                                        >
                                           
                                            @foreach(\App\Employee::where('id',auth()->user()->employee_id)->get() as $employee)
                                            
                                                <option value="{{ $employee->id }}" {{ old("employee",$user->employee_id) == $employee->id ? "selected" : "" }}>
                                                    {{ $employee->first_name }} {{ $employee->last_name }} 
                                                </option>
                                                
                                            @endforeach
                                        </select>

                                           @if ($errors->has('employee'))
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('employee') }}</strong>
                                                </span>
                                            @endif
                                        </div>

 </div>
                                   <div class="form-group col-md-12 mb-3">
                                            <label class="d-block">Manager ?</label>
                                            <div class="custom-control custom-control-inline custom-radio">
                                                <input type="radio"
                                                       class="custom-control-input"
                                                       name="manager"
                                                       id="yes"
                                                       {{ old("manager", $user->manager) === "yes" ? "checked" : "" }}
                                                       value="yes"
                                                >
                                                <label class="custom-control-label" for="yes">yes</label>
                                            </div>
                                            <div class="custom-control custom-control-inline custom-radio">
                                                <input type="radio"
                                                       class="custom-control-input"
                                                       name="manager"
                                                       {{ old("manager", $user->manager) === "no" ? "checked" : "" }}
                                                       id="no"
                                                       value="no"
                                                >
                                                <label class="custom-control-label" for="no">no</label>
                                            </div>
                                        </div>
                                
                                        
                               
                                <div class="card-body">
                                    <roles-picker inline-template>
                                        <div>
                                            <div class="form-row mb-4">
                                               <div class="form-group col-md-12">
                                                    <label for="roles">Roles</label>
                                                    <select id="roles"
                                                            class="form-control {{ $errors->has('roles') ? 'is-invalid' : '' }}"
                                                            v-model="newRole"
                                                            @change.prevent="addRole"
                                                    >
                                                        <option value="">Choose...</option>
                                                        <option v-for="role in roles"
                                                                :value="role.id"
                                                                v-text="role.title"
                                                        >
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="list-group list-group-flush list-group-divider" v-if="selectedRoles.length">
                                                <div class="list-group-item" v-for="selectedRole in selectedRoles">
                                                    <div class="list-group-item-figure">
                                                        <div class="tile tile-circle" :class="selectedRole.color">
                                                            @{{ selectedRole.placeholder }}
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="roles[]" :value="selectedRole.name">
                                                    <div class="list-group-item-body">
                                                        <h4 class="list-group-item-title">
                                                            <a href="#" v-text="selectedRole.title"></a>
                                                        </h4>
                                                        <p class="list-group-item-text" v-text="selectedRole.description"></p>
                                                    </div>
                                                    <div class="list-group-item-figure">
                                                        <button @click.prevent="removeRole(selectedRole.id)" class="btn btn-sm btn-light">
                                                            <i class="far fa-trash-alt"></i>
                                                        </button>
                                                    </div>
                                                </div >
                                            </div>
                                        </div>
                                    </roles-picker>
                                </div>
                                <hr class="mb-4">

                     
                                
                                    <button type="submit" class="btn btn-primary btn-lg btn-block">
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