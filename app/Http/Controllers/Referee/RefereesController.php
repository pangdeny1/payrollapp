<?php

namespace App\Http\Controllers\Referee;

use Illuminate\Http\Request;
use App\Employee;
use App\Models\Country;
use App\Models\Referee;
use App\Http\Controllers\Controller;

class RefereesController extends Controller
{
     public function index()
    {
        
        $referees=Referee::All();
        $countries=Country::All();
        $employees=Employee::All();
        $pagetitle="referees ";
        return view('referees.index',compact('pagetitle','referees','countries','referees','employees'));

    }
 public function create()
    {
        $employees=Employee::All();
        $countries=Country::All();
        $referees=Referee::All();
        $pagetitle="Add New institution ";
        

        return view('referees.create', compact('pagetitle','employees','referees','countries'));
    }

    public function store(Request $request, AppMailer $mailer)
    {
        //store addes files
        
        $this->validate($request, [
           
            'InstituteName'     => 'required|unique:referees',
            'country'             =>'required'   
        ]);

        $institution= new institute([
            'institutename'     => $request->input('InstituteName'),
            'country'     => $request->input('country')
            
        ]);

        $institution->save();

       // $mailer->sendTicketInformation(Auth::user(), $ticket);
         $referees=Referee::All();
         $countries=Country::All();
        $pagetitle="referees ";
         return view('referees.index',compact('referees','pagetitle','countries'))->with("status", $request->input('institutionDesc')." institution  Added Successfully.");
        //return redirect()->back()->with("status", $request->input('institutionDesc')." institution  Added Successfully.");
    }


     public function show($institution_id)
    {   
        $pagetitle="institution View";
        $institute= Referee::where('id', $institution_id)->firstOrFail();

        //$comments = $ticket->comments;

        //$category = $ticket->category;

        return view('referees.show', compact('institute','pagetitle'));
    }



     public function edit($institution_id)
    {   
        $pagetitle="institution Edit";
        $institution= Referee::where('id', $institution_id)->firstOrFail();
         $countries=Country::All();
        return view('referees.edit', compact('pagetitle','employees','institution','countries'));
   }



       public function update(Request $request, AppMailer $mailer,$institution_id)
    {
        $this->validate($request, [
            'InstituteName'     => 'required',
            'country'             =>'required'
        ]);
       

            $institution = Referee::where('id', $institution_id)->firstOrFail();

             $institution->institutename    = $request->input('InstituteName');
             $institution->country    = $request->input('country');
                     
             $institution->save();

       // $mailer->sendTicketInformation(Auth::user(), $ticket);

         $referees=Referee::All();
         $countries=Country::All();
         $pagetitle="referees ";
    return view('referees.index',compact('referees','pagetitle','countries'))->with("status", $request->input('institutionDesc')." institution  Updated Successfully.");

       // return redirect()->back()->with("status", "A institution Title has been Updated.");
    }


     public function destroy($institution_id)
        {
    $referees = Referee::findOrFail($institution_id);

    $referees->delete();

      // return redirect()->route('tasks.index');
     return redirect()->back()->with("status", "institution successfully deleted!");
           }
}

