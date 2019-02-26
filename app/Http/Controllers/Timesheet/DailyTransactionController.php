<?php

namespace App\Http\Controllers\Timesheet;

use Illuminate\Http\Request;
use App\Models\Prldailytran;
use App\Employee;

use App\Mailers\AppMailer;
use App\Http\Controllers\Controller;

class DailyTransactionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $this->authorize("view", Employee::class);


             $dailytrans= Prldailytran::latest()->groupBy("employee_id")
            ->when(request("q"), function($query){
                return $query
                    ->where("employee_id", "LIKE", "%". request("q") ."%")
                    ->orWhere("payroll_id", "LIKE", "%". request("q") ."%")
                    ;
            })
            ->paginate();

       return view("timesheets.index", compact("dailytrans"));
   }

     public function create()
    {
        
        $pagetitle="Salary Change";
        $dailytrans=Employee::All();
        $payrolls=Payroll::All();

        return view("timesheets.create", compact("pagetitle","dailytrans","payrolls"));
    }

    public function store(Request $request, AppMailer $mailer)
    {
        //store addes files

        //$this->authorize("create", Prldailytran::class);

        
        $this->validate($request, [
            "employee"     => "required",
            "date"     => "required",
            "hours"    =>"required",
            
        ]);

        $time= Prldailytran::create([
            "employee_id"     => request("employee"),
            "reg_hours"      =>  request("hours"),
            "rtdate"     => request("date"),
            "payroll_id"     => request("payroll"),
            "creator_id"      => auth()->id(),
        ]);

        $time->save();


       // $mailer->sendTicketInformation(Auth::user(), $ticket);

        return redirect()->back()->with("status", "Time added.");
    }
}


