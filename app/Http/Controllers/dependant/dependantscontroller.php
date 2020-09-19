<?php

namespace App\Http\Controllers\dependant;

use Illuminate\Http\Request;
use App\Models\YesOrNo;
use App\Employee;
use App\Models\Dependant;
use App\Models\Gender;
use App\Models\Dependanttype;
use App\Mailers\AppMailer;
use App\Http\Controllers\Controller;

class dependantscontroller extends Controller
{

   public function __construct()
    {
        $this->middleware('auth');
    }

	public function index()
	{
        $dependants=Dependant::All();
        $employees=Employee::All();
        $yesornos=YesOrNo::All();
        $dependanttypes=Dependanttype::All();
      
        $pagetitle="Dependants ";
        //return view('dependants.index',compact('pagetitle','dependants','employees','yesornos','dependanttypes','genders'));

         $dependants=Dependant::latest()
            ->when(request("q"), function($query){
                return $query
                    ->where("fullname", "LIKE", "%". request("q") ."%")
                    ->orWhere("sex", "LIKE", "%". request("q") ."%");

            })
            ->paginate();
        return view('dependants.index', compact('pagetitle','employees','yesornos','dependants','dependanttypes'));

	}
 public function create()
    {
        $dependants=Dependant::All();
        $employees=Employee::All();
        $yesornos=YesOrNo::All();
        $dependanttypes=Dependanttype::All();
        
        $pagetitle="Add New dependant";
        

        return view('dependants.create', compact('pagetitle','dependants','employees','yesornos','dependanttypes'));
    }

    public function createemployeedependant($employeeid)
    {
        $dependants=Dependant::All();
        $employees = Employee::where('employee_id', $employeeid)->get();
        $yesornos=YesOrNo::All();
        $dependanttypes=Dependanttype::All();
        $genders=gender::All();
        $pagetitle="Add New dependant";
        

        return view('dependants.createemployeedependant', compact('pagetitle','dependants','employees','yesornos','dependanttypes','genders'));
    }

    public function store(Request $request, AppMailer $mailer)
    {
        //store addes files
        
        $this->validate($request, [
           
            'employee'     => 'required',
            'FullName'     => 'required',
            'DOB'     => 'required',
            'DependantType'=>'required'
        ]);

        $dependant= new dependant([
            'fullname'     => $request->input('FullName'),
            'employee_id'     => $request->input('employee'),
            'deptypeid'     => $request->input('DependantType'),
            'sex'     => $request->input('gender'),
            'email'     => $request->input('Email'),
            'phone'     => $request->input('Phone'),
            'dob'     => $request->input('DOB'),
            'phone'     => $request->input('Phone'),
            'nextofkeen'=>$request->input('NextOfKin'),
            
        ]);

        $dependant->save();

       // $mailer->sendTicketInformation(Auth::user(), $ticket);
         $dependants=Dependant::All();
         $pagetitle="Dependants ";
         //return view('dependants.index',compact('dependants','pagetitle'))->with("status", $request->input('dependantDesc')." dependant  Added Successfully.");
        return redirect()->back()->with("status", $request->input('dependantDesc')." dependant  Added Successfully.");
    }

     public function storeemployeedependant(Request $request, AppMailer $mailer)
    {
        //store addes files
        
        $this->validate($request, [
           
            'employee'     => 'required',
            'FullName'     => 'required',
            'DOB'     => 'required',
            'gender'     => 'required',
            'DependantType'=>'required'
        ]);

        $dependant= new dependant([
            'fullname'     => $request->input('FullName'),
            'employee_id'     => $request->input('employee'),
            'deptypeid'     => $request->input('DependantType'),
            'sex'     => $request->input('gender'),
            'email'     => $request->input('Email'),
            'phone'     => $request->input('Phone'),
            'dob'     => $request->input('DOB'),
            'phone'     => $request->input('Phone'),
            'nextofkeen'=>$request->input('NextOfKin'),
            
        ]);

        $dependant->save();

       // $mailer->sendTicketInformation(Auth::user(), $ticket);
         $dependants=Dependant::All();
         $pagetitle="Dependants ";
         //return view('dependants.index',compact('dependants','pagetitle'))->with("status", $request->input('dependantDesc')." dependant  Added Successfully.");
        return redirect()->to('editemployee/'.$request->input('employee').'#tab-sixth')->with("status", $request->input('dependantDesc')." dependant  Added Successfully.");
    }


     public function show($dependant_id)
    {   
    	$pagetitle="dependant View";
        $dependant= Dependant::where('id', $dependant_id)->firstOrFail();

        //$comments = $ticket->comments;

        //$category = $ticket->category;

        return view('dependants.show', compact('dependant','pagetitle'));
    }



     public function edit($dependant_id)
    {   
    	$pagetitle="Dependant Edit";
        $dependant=Dependant::where('id', $dependant_id)->firstOrFail();
        $employees=Employee::All();
        $yesornos=YesOrNo::All();
        $dependanttypes=Dependanttype::All();
        //$genders=Gender::All();
        $genders=['Male','Female'];

        return view('dependants.edit', compact('pagetitle','dependant','employees','yesornos','dependanttypes','genders'));
   }



       public function update(Request $request, AppMailer $mailer,$dependant_id)
    {
        $this->validate($request, [
            'employee'     => 'required',
            'FullName'     => 'required',
            'DOB'     => 'required',
            'gender'     => 'required',
            'DependantType'=>'required'
        ]);
       

            $dependant = Dependant::where('id', $dependant_id)->firstOrFail();

             $dependant->fullname    = $request->input('FullName');
            $dependant->employee_id     = $request->input('employee');
            $dependant->deptypeid     = $request->input('DependantType');
            $dependant->sex            =$request->input('gender');
           $dependant->email     = $request->input('Email');
           $dependant->phone     = $request->input('Phone');
           $dependant->dob    = $request->input('DOB');
            $dependant->phone     = $request->input('Phone');
            $dependant->nextofkeen=$request->input('NextOfKin');

        
             $dependant->save();

       // $mailer->sendTicketInformation(Auth::user(), $ticket);
         $dependants=Dependant::All();
         $pagetitle="Dependants ";
         //return view('dependants.index',compact('dependants','pagetitle'))->with("status", $request->input('dependantDesc')." dependant  Added Successfully.");
        return redirect()->back()->with("status", $request->input('dependantDesc')." Dependant  Updated Successfully.");
       //return redirect()->to("/editemployee/1#tab-sixth")->with("status", "A dependant Title has been Updated.");
    }


     public function destroy($dependant_id)
        {
    $dependants = Dependant::findOrFail($dependant_id);

    $dependants->delete();

      // return redirect()->route('tasks.index');
     return redirect()->back()->with("status", "Dependant successfully deleted!");
           }
}
