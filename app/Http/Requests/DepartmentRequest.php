<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DepartmentRequest extends FormRequest
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
            'dept_name'=>'required|max:20',
            'group_id'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'dept_name.required' => '* A Department is required',
            'group_id.required' => '* A Group is required',
          
        ];
    }

}
