<?php

namespace App\Http\Requests;

use App\Group;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class GroupRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // $group = Group::find($this->route('group'));

        // return $group && $this->user()->can('create', $group);
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
            'group_name'=>'required|max:20',
        ];
    }

    public function messages()
    {
        return [
            'group_name.required' => '* A Group is required',
           
        ];
    }
}
