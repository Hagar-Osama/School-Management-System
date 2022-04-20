<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddSectionRequest extends FormRequest
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
            'name' => 'required|unique:sections,name->ar',
            'name_en' => 'required|unique:sections,name->en',
            'class_id' => 'required|exists:classes,id',
            'grade_id' => 'required|exists:grades,id',
            'teacher_id' => 'required|exists:teachers,id'


        ];

    }

    public function messages()
    {
        return [
            'name.required' => trans('validation.required'),
            'name_en.required' => trans('validation.required'),
            'grade_id.required' => trans('validation.required'),
            'teacher_id.required' => trans('validation.required'),
            'class_id.required' => trans('validation.required'),
            'name.unique' => trans('validation.unique'),
            'name_en.unique' => trans('validation.unique'),
        ];
    }
}
