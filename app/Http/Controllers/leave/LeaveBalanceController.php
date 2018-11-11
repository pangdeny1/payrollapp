<?php

namespace App\Http\Controllers\leave;

use Illuminate\Http\Request;
use App\Models\Leave\Leavebalance;
use App\Mailers\AppMailer;
use App\Http\Controllers\Controller;

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
        
        $pagetitle="Add leavetype";

        return view('leaves.leavebalances.create', compact('pagetitle'));

    }

    public function store(Request $request, AppMailer $mailer)
    {
        //store addes files
        
        $this->validate($request, [
            'name'     => 'required',
            'description'     => 'required',
            'maximumdays' =>'required',
        ]);

        $leavebalance = new leavetype([
            'name'     => $request->input('name'),
            'description'     => $request->input('description'),
            'max_number'     => $request->input('maximumdays'),

        ]);

        $leavebalance->save();

       // $mailer->sendTicketInformation(Auth::user(), $ticket);
        $pagetitle="leavebalances";
        $leavebalances = Leavebalance::paginate(10);

          return view('leaves.leavebalances.index', compact('pagetitle','leavebalances'))->with("status", "A leavetype has been created successfully.");

       // return redirect()->back()->with("status", "A leavetype with Title has been created.");
    }
 public function show($leavebalanceid)
    {   
        $pagetitle="leavetype View";
        $leavebalance= Leavebalance::where('id', $leavebalanceid)->firstOrFail();

        //$comments = $ticket->comments;

        //$category = $ticket->category;

        return view('leaves.leavebalances.show', compact('leavetype','pagetitle'));
    }



     public function edit($leavebalanceid)
    {   
        $pagetitle="Edit leavetype";
        $leavebalance= Leavebalance::where('id', $leavebalanceid)->firstOrFail();
        
        return view('leaves.leavebalances.edit', compact('leavetype','pagetitle'));
    }



       public function update(Request $request, AppMailer $mailer,$leavebalanceid)
    {
        $this->validate($request, [
           'name'     => 'required',
            'description'     => 'required',
            'maximumdays' =>'required',
        ]);
       

            $leavebalance = Leavebalance::where('id', $leavebalanceid)->firstOrFail();

             $leavebalance->name    =$request->input('name');
             $leavebalance->description  =$request->input('description');
             $leavebalance->max_number  =$request->input('maximumdays');
             

         $leavebalance->save();

       // $mailer->sendTicketInformation(Auth::user(), $ticket);
         $pagetitle="leavebalances";
       
         $leavebalances = Leavebalance::paginate(10);

          return view('leaves.leavebalances.index', compact('pagetitle','leavebalances'))->with("status", "A leavetype Title has been Updated.");

       // return redirect()->back()->with("status", "A leavetype Title has been Updated.");
    }


     public function destroy($leavebalanceid)
        {
    $leavebalance = Leavebalance::findOrFail($leavebalanceid);

    $leavebalance->delete();

      // return redirect()->route('tasks.index');
     return redirect()->back()->with("status", "leavetype  deleted successfully!");
           }
       }
