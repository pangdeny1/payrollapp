<?php

namespace App\Http\Controllers\salary;

use Illuminate\Http\Request;
use App\Employee;
use App\Models\Payroll;
use App\Models\Salary;
use App\Mailers\AppMailer;
use App\Http\Controllers\Controller;

class SalariesController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }

    /**
     * @return View
     * @throws AuthorizationException
     */
    public function index()
    {
        $this->authorize("view", Employee::class);


             $employees= Salary::latest()
            ->when(request("q"), function($query){
                return $query
                    ->where("employee_id", "LIKE", "%". request("q") ."%")
                    ->orWhere("payroll_id", "LIKE", "%". request("q") ."%");
            })
            ->paginate();

       return view("salaries.index", compact("employees"));
   }

     public function create()
    {
        
        $pagetitle="Salary Change";
        $employees=Employee::All();
        $payrolls=Payroll::All();

        return view("salaries.create", compact("pagetitle","employees","payrolls"));
    }

    public function store(Request $request, AppMailer $mailer)
    {
        //store addes files

        $this->authorize("create", Salary::class);

        
        $this->validate($request, [
            "employee"     => "required",
            "ChangedBy"     => "required",
            "SalaryFrom"    =>"required",
            "SalaryTo"      =>"required",
            "ChangedBy"     =>"required"
        ]);

        $salary= Salary::create([
            "employee_id"     => request("employee"),
            "salaryfrom"      =>  request("SalaryFrom"),
            "salaryto"     => request("SalaryTo"),
            "hourlyrate"   =>request("HourlyRate"),
            "changedby"     => request("ChangedBy"),
            "changedamount"     => request("AmountChanged"),
            "parcentage"     => request("ParcentChange"),
            "datechanged"     => request("DateChanged"),
            "payroll_id"     => request("payroll"),
            "creator_id"      => auth()->id(),
        ]);

        $salary->save();

        $employee_salary= Employee::where("id", request("employee"))->firstOrFail();

         $employee_salary->update([
            "period_rate" =>request("SalaryTo"),
            "hourly_rate" =>request("HourlyRate")
            ]);

       // $mailer->sendTicketInformation(Auth::user(), $ticket);

        return redirect()->back()->with("status", "Salary Changed Successfully.");
    }
}
