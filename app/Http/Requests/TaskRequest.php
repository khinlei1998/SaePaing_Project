<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
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
            'task_title'=>'required|max:20',
        ];
    }
    public function messages()
    {
        return [
            'task_title.required' => '* A Task Title is required',
            'project_code.required'=>'* Project Code is required',
            'description.required'=>'* Desscription is required',
            'start_time.required'=>'* Project Code is required',
            'end_time.required'=>'* Project Code is required',
            'dept_id.required'=>'* Project Code is required',
            'assignee_person.required'=>'* Project Code is required',
          
        ];
    }
}
