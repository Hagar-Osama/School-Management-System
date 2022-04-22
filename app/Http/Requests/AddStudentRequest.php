<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddStudentRequest extends FormRequest
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
            'name_ar' => 'required',
            'name_en' => 'required',
            'birth_date' => 'required',
            'academic_year' => 'required',
            'email'  => 'required|unique:students,email',
            'password' =>  'required|min:5|max:100',
            'parent_id'  => 'required|exists:parents,id',
            'gender_id'  => 'required|exists:genders,id',
            'grade_id'  => 'required|exists:grades,id',
            'class_id'  => 'required|exists:classes,id',
            'blood_id'  => 'required|exists:bloods,id',
            'nationality_id'  => 'required|exists:nationalities,id',
            'section_id'  => 'required|exists:sections,id',

        ];
    }

    public function messages()
    {
        return [
            'name_ar.required' => trans('validation.required'),
            'name_en.required' => trans('validation.required'),
            'email.unique' => trans('validation.unique'),
            'birth_date.required' => trans('validation.required'),
            'academic_year.required' => trans('validation.required'),
            'password.required' => trans('validation.required'),
            'gender_id.required' => trans('validation.required'),
            'parent_id.required' => trans('validation.required'),
            'blood_id.required' => trans('validation.required'),
            'nationality_id.required' => trans('validation.required'),
            'grade_id.required' => trans('validation.required'),
            'class_id.required' => trans('validation.required'),
            'section_id.required' => trans('validation.required'),




        ];
    }
}
