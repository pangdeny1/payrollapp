<?php

namespace App\Http\Controllers;

use App\Role;
use App\State;
use App\User;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Events\UserRegistered;
use App\Employee;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserEditRequest;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|View
     * @throws AuthorizationException
     */
    public function index()
    {
        $this->authorize("view", User::class);

        $users = User::latest()->paginate();

        return view("users.index", compact("users"));
    }

    /**
     * @return View
     * @throws AuthorizationException
     */
    public function create()
    {
        $this->authorize("create", User::class);

        return view("users.create", [
            "states" => State::getCountryName("Tanzania"),
            "roles"  => Role::get(),
        ]);
    }

    /**
     * @param UserCreateRequest $request
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function store(Request $request)
    {
        $this->authorize("create", User::class);

 


        $this->validate($request, [
            "email" => "required|email|unique:users",
            "password" => "required",
            "employee" =>"required",
            "roles" => "required|array",
            "roles.*" => "required|exists:roles,name",
        ]);
        $employee=Employee::where('id',request('employee'))->firstOrFail();
        $password=request('password');

        $user = User::create([
            "first_name" => $employee->first_name,
            "last_name" => $employee->last_name,
            "email" => request("email"),
            "employee_id" =>request('employee'),
            "phone" => $employee->phone,
            "country" => $employee->country,
            "gender" => $employee->gender,
            "birthday" => $employee->birthday,
            "manager"  =>request('manager'),
            "password" => $password,
            "creator_id" => auth()->id(),
        ]);
/*
        $user->address()->create([
            "street" => request("street"),
            "address" => request("address", ""),
            "state" => request("state"),
            "country" => request("country"),
            "postal_code" => request("postal_code"),
        ]);
        */

        foreach (request("roles") as $role) {
            $user->assign($role);
        }

       // event(new UserRegistered($user, $password));

        return redirect()->route("users.index");
    }

    public function edit(User $user)
    {
        return view("users.edit", [
            "user" => $user,
            "states" => State::getCountryName("Tanzania"),
        ]);
    }

    public function update(Request $request, User $user)
    {
        $this->validate($request, [
                     
            "employee" => "required",
            "email" => "required|email",
            "roles" => "required|array",
            "roles.*" => "required|exists:roles,name",          
        ]);

        $employee=Employee::where('id',request('employee'))->firstOrFail();
          if(empty(request('password')))
                    {
              $user->update([            
            "email" => request("email"),
            "employee_id" => request("employee"),
            "manager"     =>request("manager"),
            "first_name"  => $employee->first_name,
            "last_name"   =>$employee->last_name,
            "phone" => $employee->phone,
            "country" => $employee->country,
            "gender" => $employee->gender,
            "birthday" => $employee->birthday,
            
                   ]);
          }

          else
          {
              $user->update([
            "email" => request("email"),
            "employee_id" => request("employee"),
            "password" => request("password"),
            "manager"     =>request("manager"),
            "first_name"  =>$employee->first_name,
            "last_name"   =>$employee->last_name,
            "phone" => $employee->phone,
            "country" => $employee->country,
            "gender" => $employee->gender,
            "birthday" => $employee->birthday,
        ]);
          }
          /*
      
        if ($user->address()->exists()){
            $user->address()->update([
                "street" => request("street", optional($user->address)->street),
                "address" => request("address", optional($user->address)->address),
                "state" => request("state", optional($user->address)->state),
                "country" => request("country", optional($user->address)->country),
                "postal_code" => request("postal_code", optional($user->address)->postal_code),
            ]);
        } else {
            $user->address()->create([
                "street" => request("street"),
                "address" => request("address", ""),
                "state" => request("state"),
                "country" => request("country"),
                "postal_code" => request("postal_code"),
            ]);
        } */
       
 foreach (request("roles") as $role) {
            $user->assign($role);
        }

        return redirect()->route("users.index");
    }

    public function show(User $user)
    {
        return view("users.show",compact("user"));
    }

    /**
     * @param User $user
     * @return RedirectResponse
     * 
     */
    public function destroy(User $user)
    {
        $user->addresses()->delete();

        $user->delete();

        return redirect()->route("users.index");
    }

    public function export() 
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }
}
