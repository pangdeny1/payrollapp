<?php

namespace App\Http\Controllers\qualification;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\employeequalification;
use App\Employee;
use App\Models\qualification;
use App\Models\institute;
use App\Models\qualificationlevel;
use App\Mailers\AppMailer;
use App\Http\Controllers\job\JobgroupsController;

class employeequalificationscontroller extends Controller
{
	public function index()
	{
        $employeequalifications=employeequalification::All();
        $employees=Employee::All();
        $qualifications=qualification::All();
        $institutions=institute::All();
        $levels=qualificationlevel::All();
        $pagetitle="employeequalifications ";
        return view('employeequalifications.index',compact('pagetitle','employeequalifications','employees','levels','institutions','qualifications','levels'));

	}
 public function create()
    {
        $employees=Employee::All();
        $qualifications=qualification::All();
        $institutions=institute::All();
        $levels=qualificationlevel::All();
        $pagetitle="Add New employeequalification Period";
        

        return view('employeequalifications.create', compact('pagetitle','employees','levels','institutions','qualifications','levels'));
    }

    public function store(Request $request, AppMailer $mailer)
    {
        //store addes files
        
        $this->validate($request, [
           
            'employee'     => 'required',
            'DateFrom'     => 'required',
            'DateTo'     => 'required',
            'level'     => 'required',
            'institution'     => 'required',
            'qualification'     => 'required'
        ]);

        $employeequalification= new employeequalification([
            'qualification_id'     => $request->input('qualification'),
            'employee_id'     => $request->input('employee'),
            'datefrom'     => $request->input('DateFrom'),
            'dateto'     => $request->input('DateTo'),
            'level_id'     => $request->input('level'),
            'institution_id'     => $request->input('institution')
            
        ]);

        $employeequalification->save();

     
         $employeequalifications=employeequalification::All();
         $pagetitle="employeequalifications ";
         $employees=Employee::All();
          $qualifications=qualification::All();
        $institutions=institute::All();
        $levels=qualificationlevel::All();
         
          return view('employeequalifications.index', compact('employeequalifications','pagetitle','employees','qualifications','institutions','levels'))->with("status", "employeequalification  Added Successfully");
}
     


     public function show($employeequalification_id)
    {   
    	$pagetitle="employeequalification View";
        $employeequalification= employeequalification::where('id', $employeequalification_id)->firstOrFail();

        //$comments = $ticket->comments;

        //$category = $ticket->category;

        return view('employeequalifications.show', compact('employeequalification','pagetitle'));
    }



     public function edit($employeequalification_id)
    {   
    	$pagetitle="employeequalification Edit";
        $employeequalification= employeequalification::where('id', $employeequalification_id)->firstOrFail();
        $employees=Employee::All();
        $qualifications=qualification::All();
        $institutions=institute::All();
        $levels=qualificationlevel::All();
        
        //$comments = $ticket->comments;

        //$category = $ticket->category;

        return view('employeequalifications.edit', compact('pagetitle','employees','levels','institutions','qualifications','employeequalification'));
   }



       public function update(Request $request, AppMailer $mailer,$employeequalification_id)
    {
        $this->validate($request, [
            'employee'     => 'required',
            'DateFrom'     => 'required',
            'DateTo'     => 'required',
            'level'     => 'required',
            'institution'     => 'required',
            'qualification'     => 'required'
        ]);
       

            $employeequalification = employeequalification::where('id', $employeequalification_id)->firstOrFail();

             $employeequalification->qualification_id     = $request->input('qualification');
             $employeequalification->employee_id     = $request->input('employee');
             $employeequalification->datefrom    = $request->input('DateFrom');
             $employeequalification->dateto    = $request->input('DateTo');
             $employeequalification->level_id    = $request->input('level');
             $employeequalification->institution_id     = $request->input('institution');
        
             $employeequalification->save();

       // $mailer->sendTicketInformation(Auth::user(), $ticket);

         $employeequalifications=employeequalification::All();
         $pagetitle="employeequalifications ";
         $employees=Employee::All();
          $qualifications=qualification::All();
        $institutions=institute::All();
        $levels=qualificationlevel::All();
         
          return view('employeequalifications.index', compact('employeequalifications','pagetitle','employees','qualifications','institutions','levels'))->with("status", "employeequalification  Updated Successfully");

       // return redirect()->back()->with("status", "A employeequalification Title has been Updated.");
    }


     public function destroy($employeequalification_id)
        {
    $employeequalifications = employeequalification::findOrFail($employeequalification_id);

    $employeequalifications->delete();

      // return redirect()->route('tasks.index');
     return redirect()->back()->with("status", "employeequalification successfully deleted!");
           }
}
