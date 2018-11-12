<?php

namespace App\Http\Controllers\leave;

use Illuminate\Http\Request;
use App\Models\Leave\leaveapprovallevel;
use App\Http\Controllers\Controller;

class LeaveApprovalLevelsController extends Controller
{
      public function __construct()
    {
        $this->middleware('auth');
    }

	public function index()
    {
        $pagetitle="leaveapprovallevel";
        $leaveapprovallevers=leaveapprovallevel::latest()
            ->when(request("q"), function($query){
                return $query
                    ->where("name", "LIKE", "%". request("q") ."%")
                    ->orWhere("description", "LIKE", "%". request("q") ."%");

            })
            ->paginate();

        return view('leaves.leaveapprovallevers.index', compact('pagetitle','leaveapprovallevers'));

    }

     public function create()
    {
        
        $pagetitle="Add leavebalance";

        return view('leaves.leaveapprovallevers.create', compact('pagetitle'));

    }

    public function store(Request $request, AppMailer $mailer)
    {
        $this->authorize("create", leaveapprovallevel::class);
          $this->validate($request, [
            "employee" => "required",
            "start_date" => "required",
            'leavetype'  =>"required",
            "end_date" => "required",
            "duration" => "required|integer|min:364|max:365",
            
        ]);
       
        $leave = leaveapprovallevel::create([
            "start_date" => request("start_date"),
            "end_date" => request("end_date"),
            "employee_id" => request("employee"),
            "leavetype_id" =>request("leavetype"),
            "days" =>request("duration"),
            "creator_id" => auth()->id(),
        ]);


       // $mailer->sendTicketInformation(Auth::user(), $ticket);
        $pagetitle="leaveapprovallevel";
        $leaveapprovallevels = leaveapprovallevel::paginate(10);

          return view('leaves.leaveapprovallevers.index', compact('pagetitle','leaveapprovallevel'))->with("status", "A leavebalance has been created successfully.");

       // return redirect()->back()->with("status", "A leavebalance with Title has been created.");
    }
 public function show($leaveapprovallevelid)
    {   
        $pagetitle="leavebalance View";
        $leaveapprovallevel= leaveapprovallevel::where('id', $leaveapprovallevelid)->firstOrFail();

        //$comments = $ticket->comments;

        //$category = $ticket->category;

        return view('leaves.leaveapprovallevers.show', compact('leavebalance','pagetitle'));
    }



     public function edit($leaveapprovallevelid)
    {   
        $pagetitle="Edit leavebalance";
        $leaveapprovallevel= leaveapprovallevel::where('id', $leaveapprovallevelid)->firstOrFail();
        
        return view('leaves.leaveapprovallevers.edit', compact('leavebalance','pagetitle'));
    }



       public function update(Request $request, AppMailer $mailer,$leaveapprovallevelid)
    {
             $this->validate($request, [
            "employee" => "required",
            "start_date" => "required",
            "end_date" => "required",
            "duration" => "required|integer|min:364|max:365",
            
        ]);
       

            $leaveapprovallevel = leaveapprovallevel::where('id', $leaveapprovallevelid)->firstOrFail();

             
            $leaveapprovallevel->start_date=request("start_date");
            $leaveapprovallevel->end_date = request("end_date");
            $leaveapprovallevel->employee_id=request("employee");
            $leaveapprovallevel->leavetype_id=request("leavetype");
            $leaveapprovallevel->days =request("duration");
           
             

         $leaveapprovallevel->save();

       // $mailer->sendTicketInformation(Auth::user(), $ticket);
         $pagetitle="leaveapprovallevel";
       
         $leaveapprovallevels = leaveapprovallevel::paginate(10);

          return view('leaves.leaveapprovallevers.index', compact('pagetitle','leaveapprovallevel'))->with("status", "A leavebalance Title has been Updated.");

       // return redirect()->back()->with("status", "A leavebalance Title has been Updated.");
    }


     public function destroy($leaveapprovallevelid)
        {
    $leaveapprovallevel = leaveapprovallevel::findOrFail($leaveapprovallevelid);

    $leaveapprovallevel->delete();

      // return redirect()->route('tasks.index');
     return redirect()->back()->with("status", "leavebalance  deleted successfully!");
           }
       }
