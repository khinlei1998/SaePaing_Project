<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CbpFormRequest extends FormRequest
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
            'cbp_name' => 'required|max:255',
            'dept_id'  => 'required|integer'
        ];
    }

    public function attributes()
    {
        return [
            'cbp_name' => "CBP Name",
            'dept_id'  => 'Department ID'
        ];
    }


}
