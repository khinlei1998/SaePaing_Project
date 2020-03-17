<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectFormRequest extends FormRequest
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
            // 'project_code' => 'required|min:2',
            // 'project_title' => 'required|min:4|max:255',
            // 'project_description' => 'required',
            // 'project_region' => 'required',
            // 'project_startDate' => 'required',
            // 'project_endDate' => 'required',
        ];
    }

    public function messages()
    {
        return [
            // 'project_code.required' => 'Project code is required!',
            // 'project_title.required' => 'Project title is required!',
            // 'project_description.required' => 'Project description is required!',
            // 'project_region.required' => 'Project region is required!',
            // 'project_startDate.required' => 'Project Start Date is required!',
            // 'project_endDate.required' => 'Project End Date is required!',
        ];
    }
}
