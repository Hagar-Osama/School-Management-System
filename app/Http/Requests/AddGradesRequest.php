<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddGradesRequest extends FormRequest
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
            'name' => 'required|unique:grades,name->ar',
            'name_en' => 'required|unique:grades,name->en',
            'notes' => 'min:5|max:100'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => trans('validation.required'),
            'name_en.required' => trans('validation.required'),
            'name.unique' => trans('validation.unique'),
            'name_en.unique' => trans('validation.unique'),



        ];
    }
}
