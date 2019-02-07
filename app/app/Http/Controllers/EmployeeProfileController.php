<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;

class EmployeeProfileController extends Controller
{
    public function index(Employee $employee)
    {
        return view("employees.profiles.index", compact("employee"));
    }
}
