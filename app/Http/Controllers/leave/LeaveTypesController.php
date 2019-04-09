<?php

namespace App\Http\Controllers\leave;

use Illuminate\Http\Request;
use App\Models\Leave\Leavetype;
use App\Mailers\AppMailer;
use App\Http\Controllers\Controller;

class LeaveTypesController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }

	public function index()
    {
         $pagetitle="leavetypes";
        $leavetypes=Leavetype::latest()
            ->when(request("q"), function($query){
                return $query
                    ->where("name", "LIKE", "%". request("q") ."%")
                    ->orWhere("description", "LIKE", "%". request("q") ."%");

            })
            ->paginate();

        return view('leaves.leavetypes.index', compact('pagetitle','leavetypes'));

    }

     public function create()
    {
        
        $pagetitle="Add leavetype";

        return view('leaves.leavetypes.create', compact('pagetitle'));

    }

    public function store(Request $request, AppMailer $mailer)
    {
        //store addes files
        
        $this->validate($request, [
            'name'     => 'required|unique:leavetypes',
            'description'     => 'required',
            'maximumdays' =>'required',
        ]);

        $leavetype = new leavetype([
            'name'     => $request->input('name'),
            'description'     => $request->input('description'),
            'max_number'     => $request->input('maximumdays'),

        ]);

        $leavetype->save();

       // $mailer->sendTicketInformation(Auth::user(), $ticket);
        $pagetitle="leavetypes";
        $leavetypes = Leavetype::paginate(10);

          return view('leaves.leavetypes.index', compact('pagetitle','leavetypes'))->with("status", "A leavetype has been created successfully.");

       // return redirect()->back()->with("status", "A leavetype with Title has been created.");
    }
 public function show($leavetypeid)
    {   
        $pagetitle="leavetype View";
        $leavetype= Leavetype::where('id', $leavetypeid)->firstOrFail();

        //$comments = $ticket->comments;

        //$category = $ticket->category;

        return view('leaves.leavetypes.show', compact('leavetype','pagetitle'));
    }



     public function edit($leavetypeid)
    {   
        $pagetitle="Edit leavetype";
        $leavetype= Leavetype::where('id', $leavetypeid)->firstOrFail();
        
        return view('leaves.leavetypes.edit', compact('leavetype','pagetitle'));
    }



       public function update(Request $request, AppMailer $mailer,$leavetypeid)
    {
        $this->validate($request, [
           'name'     => 'required',
            'description'     => 'required',
            'maximumdays' =>'required',
        ]);
       

            $leavetype = Leavetype::where('id', $leavetypeid)->firstOrFail();

             $leavetype->name    =$request->input('name');
             $leavetype->description  =$request->input('description');
             $leavetype->max_number  =$request->input('maximumdays');
             

         $leavetype->save();

       // $mailer->sendTicketInformation(Auth::user(), $ticket);
         $pagetitle="leavetypes";
       
         $leavetypes = Leavetype::paginate(10);

          return view('leaves.leavetypes.index', compact('pagetitle','leavetypes'))->with("status", "A leavetype Title has been Updated.");

       // return redirect()->back()->with("status", "A leavetype Title has been Updated.");
    }


     public function destroy($leavetypeid)
        {
    $leavetype = Leavetype::findOrFail($leavetypeid);

    $leavetype->delete();

      // return redirect()->route('tasks.index');
     return redirect()->back()->with("status", "leavetype  deleted successfully!");
           }
       }
