<?php

namespace App\Http\Requests;

use App\Employee;
use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {  
        //  $employees = Employee::find($this->route('employee'));
        // $employee = $employees?$employees->first():false;
        // return $employee && $this->user()->can('create', $employee);
        return true ;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'emp_name'=>'required|max:20',
            'emp_id'=>'required|max:20',
            'emp_jobdesp'=>'required',
            'emp_position'=>'required',
            'group_id'=>'required',
            // 'dept_id'=>'required',
            // 'subdept_id'=>'required',
            // 'team_id'=>'required'
        ];
    }

    public function messages()
    {
        return [
            'emp_name.required' => '* Employee Name is required',
            'emp_id.required' => '* Employee ID is required',
            'emp_jobdesp.required' => '* Employee Job Description is required',
            'emp_position.required' => '* Employee Position is required',
            'group_id.required' => '* A Group is required',
            // 'dept_id.required' => '* A Department is required',
            // 'subdept_id.required' => '* A Sub Department is required',
            // 'team_id.required' => '* A Team is required',
          
        ];
    }
}
