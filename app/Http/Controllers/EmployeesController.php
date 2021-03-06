<?php
namespace App\Http\Controllers;

use App\Farm;
use App\Http\Requests\EmployeeCreateRequest;
use App\State;
use App\Employee;
use App\Purchase;
use App\Models\job;
use App\Models\Jobgroup;
use App\Models\Payperiod;
use App\GroupMember;
use App\Models\Picture;
use App\Models\CsvData;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use employees;
use App\Models\YesOrNo;
use Image;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use App\Http\Requests\CsvImportRequest;
use Maatwebsite\Excel\Facades\Excel;




class EmployeesController extends Controller
{
	public function __construct()
    {
        $this->middleware("auth");
    }

    /**
     * @return View
     * @throws AuthorizationException
     */
    public function index()
    {
        $this->authorize("view", Employee::class);

        //$employees = Employee::latest()->paginate();
        //$groups = GroupMember::all()->load('Groups');

             $employees= Employee::latest()
            ->when(request("q"), function($query){
                return $query
                    ->where("first_name", "LIKE", "%". request("q") ."%")
                    ->orWhere("last_name", "LIKE", "%". request("q") ."%");
            })
            ->paginate();

       return view("employees.index", compact("employees"));
    }

    /**
     * @return View
     * @throws AuthorizationException
     */
    public function create()
    {
        $this->authorize("create", Employee::class);
        $payperiods     =Payperiod::All();

        return view("employees.create", [
            "states" => State::getCountryName("Tanzania"),
            "payperiods" =>Payperiod::All(),
        ]);
    }

    /**
     * @param EmployeeCreateRequest $request
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function store(EmployeeCreateRequest $request)
    {
        $this->authorize("create", Employee::class);

         $imageName = request("first_name").' '.request("last_name").' '.time().'.'.request()->image->getClientOriginalExtension();
        $employee = Employee::create([
            "first_name" => request("first_name"),
            "last_name" => request("last_name"),
            "other_name" => request("other_name"),
            "phone" => request("phone"),
            "hire_date" => request("hire_date"),
            "email" => request("email"),
            "gender" => request("gender"),
            "period_rate" =>request("period_rate"),
            "pay_type"  =>request("pay_type"),
            "hourly_rate" =>request("hourly_rate"),
            "pay_period"  =>request("payperiod"),
            "active"      =>request("active"),
            "branch_id"   =>request("branch"),
            "department_id"  =>request("department"),
            "job_id"         =>request("job"),
            "picture"        =>$imageName,
            "creator_id" => auth()->id(),
        ]);

        

  

        request()->image->move(public_path('images/profiles'), $imageName);

        $employee->address()->create($request->only([
            "street",
            "address",
            "state",
            "country",
            "postal_code",
        ]));

          $employee->logins()->create($request->only([
            "first_name",
            "last_name",
            "email",
            "gender",
            "phone",
            "password"=>request("last_name"),
        ]));

       // $employee->groups()->attach($request->group_id);
        
        /* \employees::send(phone(request("phone"), "TZ"), $this->messageBody(
            request("first_name"),
            request("last_name"),
            request("phone")
        ));
        */
        return redirect()->route("employees.index", $employee);
    }

    /**
     * @param Employee $employee
     * @return RedirectResponse
     * @throws AuthorizationException
     */

    public function edit(Employee $employee)
    {
        $this->authorize("edit", Employee::class);

        return view("employees.edit", [
            "states" => State::getCountryName("Tanzania"),
            "employee" =>$employee,
            "payperiods" =>Payperiod::All(),
            "yesornos"   =>YesOrNo::All(),

        ]);
    } 
/* public function update(Employee $employee)
    {
        $this->authorize("edit", $employee);

        $employee->update([
            "first_name" => request("first_name", $employee->first_name),
            "last_name" => request("last_name", $employee->last_name),
            "phone" => request("phone", $employee->phone),
            "email" => request("email", $employee->email),
            "gender" => request("gender", $employee->gender),
        ]);

        return redirect()->back();
    }

*/

    public function update(Request $request,Employee $employee)
    {
        $this->authorize("update", $employee);

         if(empty(request()->image))
         {
            $imageName=$employee->picture;
         }
     else
     {
          $imageName = request("first_name").' '.request("last_name").' '.time().'.'.request()->image->getClientOriginalExtension();
          request()->image->move(public_path('images/profiles'), $imageName);
     }
         

          
        $this->validate($request, [
            "first_name" => "required",
            "last_name" => "required",
            "email" => "email:required",
            "country" => "required",
            "pay_type" => "required",
            "payperiod"  =>"required",
            "active" => ["required", Rule::in(["yes","no"])],
            "gender" => ["required", Rule::in(["male","female"])],
        ]);

        $employee->update([
            "first_name" => request("first_name"),
            "last_name" => request("last_name"),
            "other_name"=>request("other_name"),
            "email" => request("email"),
            "phone" => request("phone"),
            "gender" => request("gender"),
            "active" => request("active"),
            "pay_type"=>request("pay_type"),
            "hourly_rate" =>request("hourly_rate"),
            "period_rate" => request("period_rate"),
            "pay_period"  =>request("payperiod"),
            'branch_id'    =>request("branch"),
            "department_id"=>request("department"),
            "job_id"       =>request("job"),
            "health_id"    =>request("health_id"),
            "hdmf_id"      =>request('hdmf_id'),
            "bank_id"      =>request('bank_id'),
            "bankbranch_id" =>request('bankbranch_id'),
            "account_name"  =>request('account_name'),
            "account_number" =>request("account_number"),
            "sstype_id"      =>request("sstype_id"),
            "hire_date"      =>request("hire_date"),
            "terminate_date" =>request("terminate_date"),
            "employement_status"=>request('employement_status'),
            "code"              =>request('code'),
            "title_id"          =>request('title_id'),
            "picture"           =>request('picture'),
            "company_id"        =>request('company_id'),
            "marital"           =>request('marital'),
            "retired_date"      =>request('retired_date'),
            "birth_date"        =>request('birth_date'),
            "ss_number"         =>request('ss_number'),
            "about_employee"    =>request('about_employee'),
            "probation_date"    =>request("probation_date"),
            "deduct_ss"         =>request("deduct_ss"),
            "deduct_tax"        =>request('deduct_tax'),
            "deduct_hdmf"       =>request('deduct_hdmf'),
            "hdmf_number"       =>request('hdmf_number'),
            "health_number"     =>request('health_number'),
            "picture"           =>$imageName,


        ]);
       

       //picture 
/*
 if ($employee->pictures()->exists()){

        $file = Input::file('pic');
         $img = Image::make($file);
         Response::make($img->encode('JPG'));

         $picture = new Picture;
            $employee->pictures()->update([
                "name" => $request->get('name'),
                "pic" => $img,
                       ]);


        } else {


       $file = Input::file('pic');
        $img = Image::make($file);
         Response::make($img->encode('JPG'));

         $picture = new Picture;
            
         $employee->pictures()->create([
                "name" => $request->get('name'),
                "pic" => $img,
                       ]);
        }
*/

//end of picture 


        if ($employee->address()->exists()){
            $employee->address()->update([
                "street" => request("street", optional($employee->address)->street),
                "address" => request("address", optional($employee->address)->address),
                "state" => request("state", optional($employee->address)->state),
                "country" => request("country", optional($employee->address)->country),
                "postal_code" => request("postal_code", optional($employee->address)->postal_code),
            ]);
        } else {
            $employee->address()->create([
                "street" => request("street"),
                "address" => request("address", ""),
                "state" => request("state"),
                "country" => request("country"),
                "postal_code" => request("postal_code"),
            ]);
        }

      if ($employee->logins()->exists()){
            $employee->logins()->update([
                "first_name" => request("first_name", optional($employee->logins)->first_name),
                "last_name" => request("last_name", optional($employee->logins)->last_name),
                "email" => request("email", optional($employee->logins)->email),
                "gender" => request("gender", optional($employee->logins)->gender),
                "phone" => request("phone", optional($employee->logins)->phone),
            ]);

        } else {
            $employee->logins()->create([
                "first_name" => request("first_name"),
                "last_name" => request("last_name"),
                "email" => request("email"),
                "gender" => request("gender"),
                "phone" => request("phone"),
                "password"=>request("last_name"),
            ]);
        }


        //$employee->groups()->sync($request->group_id);
        return redirect()->route("employees.index");
        //return redirect()->back();
    }
    /**
     * @param Employee $employee
     * @return View
     * @throws AuthorizationException
     */
    public function show(Employee $employee)
    {
        $this->authorize("view", $employee);

        return view("employees.show", compact("employee"));
    }

    /**
     * @param Employee $employee
     * @return RedirectResponse
     * @throws \Exception
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();

        return redirect()->route("employees.index");
    }
    
   public function import()
   {
    return view('employees.import');
   }


   public function parseImport(CsvImportRequest $request)
    {

        $path = $request->file('csv_file')->getRealPath();

        if ($request->has('header')) {
            $data = Excel::load($path, function($reader) {})->get()->toArray();
        } else {
            $data = array_map('str_getcsv', file($path));
        }

        if (count($data) > 0) {
            if ($request->has('header')) {
                $csv_header_fields = [];
                foreach ($data[0] as $key => $value) {
                    $csv_header_fields[] = $key;
                }
            }
            $csv_data = array_slice($data, 0, count($data));

                $csv_data_file = CsvData::create([
                'csv_filename' => $request->file('csv_file')->getClientOriginalName(),
                'csv_header' => $request->has('header'),
                'csv_data' => json_encode($data)
            ]);
        } else {
            return redirect()->back();
        }

        return view('employees.import_fields', compact( 'csv_header_fields', 'csv_data', 'csv_data_file'));

    }

    public function processImport(Request $request)
    {
        $data = CsvData::find($request->csv_data_file_id);
        $csv_data = json_decode($data->csv_data, true);
        foreach ($csv_data as $row) {
            $importsm = new Employee();
            foreach (config('app.employees_fields1') as $index => $field) {
                if ($data->csv_header) {
                    $importsm->$field = $row[$request->fields[$field]];
                } else {
                    $importsm->$field = $row[$request->fields[$index]];
                }
            }
            $importsm->save();
        }

       // return view('employees.import_success');
        return redirect()->route("employees.index")->with('status','Employees imported Successfully');
    }

    public function sample()
    {
        $file= public_path(). "/downloads/xls/sample_import_sample_file.xls";

    $headers = array(
              'Content-Type: application/xls',
            );

    return Response::download($file, 'sample_import_sample_file.xls', $headers);
    }
}
