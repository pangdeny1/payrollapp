<?php

namespace App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\Leave\Leavebalance;
use App\Employee;
use App\Models\Payroll;
use App\Models\Salary;
use App\prltransaction;
use App\Employee;
use App\Mailers\AppMailer;
use App\Models\YesOrNo;
use App\Models\Year;
use DB;
use App\Prltaxtransaction;
use App\Models\Prldailytran;
use App\Models\Prlsstransaction;
use App\Models\Prltaxtablerate;
use App\Models\Prlssfile;
use App\Models\Prlsstype;
use App\Models\Month;
use App\Models\Payperiod;
use App\Models\Prlothintransaction;
use App\Models\Prlothinfile;
use app\Models\Prlothintype;
use App\Models\Prlothdedtransaction;
use App\Models\Prlothdedfile;
use App\Models\Prlothdedtype;
use App\Prlhdmftype;
use App\Models\Prlhdmftransaction;
use App\prlhealthtransaction;
use App\prlhealthtype;
use App\Models\Prlloantransaction;
use App\Models\Prlloanfile;
use App\Models\Prlloantype;

use Illuminate\Foundation\Http\FormRequest;


class LeaveRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
          $leavebal=0;
          
        $leavebalance=Leavebalance::where('employee_id',request('employee'))->where('leavetype_id',request('leavetype'))->where('active','yes')->first();
         if(!empty($leavebalance->id))
         {
           $leavebal=$leavebalance->balance; 
         }

        
        return [
            "remark" => "required",
            "employee" => "required|exists:leavebalances,employee_id|exists:leave_employee_approvers,employee_id",
            "leavetype" => "required|exists:leavebalances,leavetype_id,employee_id,".Request::get('employee'),
            "start_date" => "required",
            "end_date" => "required",
            "duration" => "required|integer|min:1|max:". $leavebal,
        ];
    }

        public function messages()
{
      $leavebal=0; 
         $employee=Employee::where('id',request('employee'))->first();
         $full_name=$employee->full_name;
         $leavetype=Leavetype::where('id',request('leavetype'))->first();
         $leavetype=$leavetype->name;

         $leavebalance=Leavebalance::where('employee_id',request('employee'))->where('leavetype_id',request('leavetype'))->first();
         if(!empty($leavebalance->id))
         {
           $leavebal=$leavebalance->balance; 
         }
    return [
        'remark.required' => 'Reason of the leave is required',
        'employee.required'  => 'Employee is required',
        'leavetype.required'  => 'Leave type is required',
        'duration.required'  => 'Days to apply is required, select start date and end date',
        "employee.exists"=>"No Leave balance for employee",
        "employee.exists"=>"No Employee Leave Approver",
        "leavetype.exists"=>"Days not Allocated for Employee ".$full_name." for leavetype ".$leavetype,
        "duration.min"=>"Days to apply not allowed",
        "duration.max"=>"Insufficient leave balance ,Your leave balance is ".$leavebal." days",


    ];
}

}
