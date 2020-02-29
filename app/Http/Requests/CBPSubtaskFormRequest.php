<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CBPSubtaskFormRequest extends FormRequest
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
            'cbp_subtask' => 'required|max:255',
            'cbp_id' => 'required|integer'
        ];
    }

    public function attributes()
    {
        return [
            'cbp_subtask' => "CBP Subtask",
            'cbp_id'  => 'CBP Name'
        ];
    }
}
