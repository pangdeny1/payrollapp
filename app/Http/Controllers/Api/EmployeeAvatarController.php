<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Employee;

class EmployeeAvatarController extends Controller
{
    public function store(Request $request, Employee $employee)
    {
        $employee
            ->addMedia($request->file("avatar"))
            ->preservingOriginal()
            ->toMediaCollection();
        //return $request->file("avatar");

        return response(["result" => $employee->getFirstMediaUrl()], 201);
    }
}
