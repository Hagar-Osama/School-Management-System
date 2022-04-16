<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTeacherRequest extends FormRequest
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
            'address' => 'required',
            'hiring_date' => 'required',
            'email'  => 'required|unique:teachers,email,'.$this->teacher_id,
            'password' =>  'required|min:5|max:100',
            'specialization_id'  => 'required|exists:specializations,id',
            'gender_id'  => 'required|exists:genders,id',
            'teacher_id' => 'required|exists:teachers,id'
        ];
    }

    public function messages()
    {
        return [
            'name_ar.required' => trans('validation.required'),
            'name_en.required' => trans('validation.required'),
            'email.unique' => trans('validation.unique'),
            'address.required' => trans('validation.required'),
            'hiring_date.required' => trans('validation.required'),
            'password.required' => trans('validation.required'),
            'gender_id.required' => trans('validation.required'),
            'specialization_id.required' => trans('validation.required'),
            'teacher_id.required' => trans('validation.required'),



        ];
    }
}
