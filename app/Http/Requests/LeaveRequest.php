<?php

namespace App\Http\Requests;

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
        return [
         "remark" => "required",
            "employee" => "required|exists:leavebalances,employee_id|exists:leave_employee_approvers,employee_id",
            "leavetype" => "required|exists:leavebalances,leavetype_id,employee_id,balance>=duration",
            "start_date" => "required",
            "end_date" => "required",
            "duration" => "required|integer|min:1",
        ];
    }

        public function messages()
{
    return [
        'remark.required' => 'A Remark is required',
        'employee.required'  => 'Employee is required',
        "employee.exists:leavebalances,employee_id"=>"No Leave balance for employee",
        "employee.exists:leave_employee_approvers,employee_id"=>"No Employee Approver"
    ];
}

}
