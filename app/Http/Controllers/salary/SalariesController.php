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

        return view('salaries.create', compact('pagetitle','employees','payrolls'));
    }

    public function store(Request $request, AppMailer $mailer)
    {
        //store addes files
        
        $this->validate($request, [
            'employee'     => 'required',
            'ChangedBy'     => 'required',
            'SalaryFrom'    =>'required',
            'SalaryTo'      =>'required',
            'ChangedBy'     =>'required'
        ]);

        $salary= new Salary([
            'employee_id'     => $request->input('employee'),
            'salaryfrom'     => $request->input('SalaryFrom'),
            'salaryto'     => $request->input('SalaryTo'),
            'changedby'     => $request->input('ChangedBy'),
            'changedamount'     => $request->input('AmountChanged'),
            'parcentage'     => $request->input('ParcentageChanged'),
            'datechanged'     => $request->input('DateChanged'),
            'payroll_id'     => $request->input('payroll')
        ]);

        $salary->save();

       // $mailer->sendTicketInformation(Auth::user(), $ticket);

        return redirect()->back()->with("status", "Salary Changed Successfully.");
    }
}
