<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddClassRequest extends FormRequest
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
            'class_lists.*.name' => 'required|unique:classes,name->ar',
            'class_lists.*.name_en' => 'required|unique:classes,name->en',
            'class_lists.*.grade_id' => 'required|exists:grades,id'
        ];
    }
    public function messages()
    {
        return [
            'class_lists.*.name.required' => trans('validation.required'),
            'class_lists.*.name_en.required' => trans('validation.required'),
            'class_lists.*.name.unique' => trans('validation.unique'),
            'class_lists.*.name_en.unique' => trans('validation.unique'),
            'class_lists.*.grade_id.required' => trans('validation.required'),

        ];
    }
}
