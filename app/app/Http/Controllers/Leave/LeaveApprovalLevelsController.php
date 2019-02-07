<?php

namespace App\Http\Controllers\leave;

use Illuminate\Http\Request;
use App\Models\Leave\leaveapprovallevel;
use App\Mailers\AppMailer;
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
            "name" => "required",
            "priority" => "required|unique:leaveapprovallevels",
            
            
        ]);
       
        $leave = leaveapprovallevel::create([
            "name" => request("name"),
            "priority" => request("priority"),
            "desctription" => request("remark"),
           
            "creator_id" => auth()->id(),
        ]);


       // $mailer->sendTicketInformation(Auth::user(), $ticket);
        $pagetitle="leaveapprovallevel";
        $leaveapprovallevers= leaveapprovallevel::paginate(10);

          return view('leaves.leaveapprovallevers.index', compact('pagetitle','leaveapprovallevers'))->with("status", "A leavebalance has been created successfully.");



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
        
        return view('leaves.leaveapprovallevers.edit', compact('leaveapprovallevel','pagetitle'));
    }



       public function update(Request $request, AppMailer $mailer,$leaveapprovallevelid)
    {
             $this->validate($request, [
             "name"    => "required",
            "priority" => "required",
            
        ]);
       

            $leaveapprovallevel = leaveapprovallevel::where('id', $leaveapprovallevelid)->firstOrFail();
             
            $leaveapprovallevel->name=request("name");
            $leaveapprovallevel->priority = request("priority");
            $leaveapprovallevel->desctription=request("remark");
            
             

           $leaveapprovallevel->save();

        // $mailer->sendTicketInformation(Auth::user(), $ticket);
        $pagetitle="leaveapprovallevel";
        $leaveapprovallevers= leaveapprovallevel::paginate(10);

          return view('leaves.leaveapprovallevers.index', compact('pagetitle','leaveapprovallevers'))->with("status", "A leavebalance has edited created successfully.");
    }


     public function destroy($leaveapprovallevelid)
        {
    $leaveapprovallevel = leaveapprovallevel::findOrFail($leaveapprovallevelid);

    $leaveapprovallevel->delete();

      // return redirect()->route('tasks.index');
     return redirect()->back()->with("status", "leavebalance  deleted successfully!");
           }
       }
