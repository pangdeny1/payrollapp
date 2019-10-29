<?php

namespace App\Http\Controllers\Timesheet;

use Illuminate\Http\Request;
use App\Models\Prldailytran;
use App\Employee;
use App\User;
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
       // $this->authorize("view", Employee::class);


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
            "hours"    =>"required"
            
        ]);

        $time= Prldailytran::create([
            "employee_id"     =>  $request->input("employee"),
            "reg_hours"      =>   $request->input("hours"),
            "rtdate"     =>  $request->input("date"),
            "payroll_id"     =>  $request->input("payroll"),
            "creator_id"      => auth()->id()
        ]);

        $time->save();


       // $mailer->sendTicketInformation(Auth::user(), $ticket);

        return redirect()->back()->with("status", "Time added.");
    }

     public function mytimesheet()
    {
       // $this->authorize("view", Employee::class);


             $dailytrans= Prldailytran::latest()
             ->groupBy("employee_id")

            ->when(request("q"), function($query){
                return $query
                    ->where("employee_id", "LIKE", "%". request("q") ."%")
                    ->orWhere("payroll_id", "LIKE", "%". request("q") ."%")

                    ;
            })
            ->paginate();

       return view("timesheets.mytimesheet", compact("dailytrans"));
   }

   public function thistimesheet($id)
    {
       // $this->authorize("view", Employee::class);


             $payrollid=$id;
              $dailytrans= Prldailytran::where('payroll_id',$id)
            
            ->paginate();
             

       return view("timesheets.thistimesheet", compact("payrollid","dailytrans"));
   }
}


