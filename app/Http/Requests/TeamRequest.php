<?php

namespace App\Http\Requests;


use App\Team;
use Illuminate\Foundation\Http\FormRequest;

class TeamRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
//        $team = team::find($this->route('team'));
//        return $team && $this->user()->can('create', $team);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'team_name'=>'required|max:20',
//            'group_id'=>'required',
//            'dept_id'=>'required',
//            'subdept_id'=>'required',

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
