<?php

namespace App\Http\Controllers\leave;

use Illuminate\Http\Request;
use App\Models\Leave\Leavebalance;
use App\Mailers\AppMailer;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

class LeaveBalanceController extends Controller
{
      public function __construct()
    {
        $this->middleware('auth');
    }

	public function index()
    {
         $pagetitle="leavebalances";
        $leavebalances=Leavebalance::latest()
            ->when(request("q"), function($query){
                return $query
                    ->where("first_name", "LIKE", "%". request("q") ."%")
                    ->orWhere("name", "LIKE", "%". request("q") ."%");

            })
            ->paginate();

        return view('leaves.leavebalances.index', compact('pagetitle','leavebalances'));

    }

     public function create()
    {
        
        $pagetitle="Add leavebalance";

        return view('leaves.leavebalances.create', compact('pagetitle'));

    }

    public function store(Request $request, AppMailer $mailer)
    {
        $this->authorize("create", Leavebalance::class);
          $this->validate($request, [
            "employee" => "required",
            "start_date" => "required",
            'leavetype'  =>"required",
            "end_date" => "required",
            "duration" => "required|integer|min:364|max:365",
            "balance"  =>'required',
            "allocated_days"  =>'required',
            'days_spent'=>'required'
            
        ]);
       
        $leave = Leavebalance::create([
            "start_date" => request("start_date"),
            "end_date" => request("end_date"),
            "employee_id" => request("employee"),
            "leavetype_id" =>request("leavetype"),
            "days" =>request("duration"),
            "balance"=>request("balance"),
            "allocated_days"=>request("allocated_days"),
            "days_spent"    =>request("days_spent"),
            "creator_id" => auth()->id(),
        ]);


       // $mailer->sendTicketInformation(Auth::user(), $ticket);
        $pagetitle="leavebalances";
        $leavebalances = Leavebalance::paginate(10);

          return view('leaves.leavebalances.index', compact('pagetitle','leavebalances'))->with("status", "A leavebalance has been created successfully.");

       // return redirect()->back()->with("status", "A leavebalance with Title has been created.");
    }
 public function show($leavebalanceid)
    {   
        $pagetitle="leavebalance View";
        $leavebalance= Leavebalance::where('id', $leavebalanceid)->firstOrFail();

        //$comments = $ticket->comments;

        //$category = $ticket->category;

        return view('leaves.leavebalances.show', compact('leavebalance','pagetitle'));
    }



     public function edit($leavebalanceid)
    {   
        $pagetitle="Edit leavebalance";
        $leavebalance= Leavebalance::where('id', $leavebalanceid)->firstOrFail();
        
        return view('leaves.leavebalances.edit', compact('leavebalance','pagetitle'));
    }



       public function update(Request $request, AppMailer $mailer,$leavebalanceid)
    {
             $this->validate($request, [
            "employee" => "required",
            "start_date" => "required",
            "end_date" => "required",
            "duration" => "required|integer|min:364|max:365",
            "balance"  =>"required",
            
        ]);
       

            $leavebalance = Leavebalance::where('id', $leavebalanceid)->firstOrFail();

             
            $leavebalance->start_date=request("start_date");
            $leavebalance->end_date = request("end_date");
            $leavebalance->employee_id=request("employee");
            $leavebalance->leavetype_id=request("leavetype");
            $leavebalance->days =request("duration");
            $leavebalance->balance=request("balance");        
             $leavebalance->days_spent=request("days_spent");
             $leavebalance->allocated_days=request("allocated_days");
             $leavebalance->save();

       // $mailer->sendTicketInformation(Auth::user(), $ticket);
         //$pagetitle="leavebalances";
       
        // $leavebalances = Leavebalance::paginate(10);

          //return view('leaves.leavebalances.index', compact('pagetitle'))->with("status", "A leavebalance Title has been Updated.");

      // return redirect()->url('viewleavebalances')->with("status", "A leavebalance Title has been Updated.");
       return redirect('viewleavebalances')->with("status", "A leavebalance Title has been Updated.");
    }


     public function destroy($leavebalanceid)
        {
    $leavebalance = Leavebalance::findOrFail($leavebalanceid);

    $leavebalance->delete();

      // return redirect()->route('tasks.index');
     return redirect()->back()->with("status", "leavebalance  deleted successfully!");
           }
       }
