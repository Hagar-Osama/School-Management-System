<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClassRequest extends FormRequest
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
            'name' => 'required|unique:classes,name->ar,'.$this->class_id,
            'name_en' => 'required|unique:classes,name->en,'.$this->class_id,
            'grade_id' => 'required|exists:grades,id',
            'class_id' => 'required|exists:classes,id'

        
        ];
    }

    public function messages()
    {
        return [
            'name.required' => trans('validation.required'),
            'name_en.required' => trans('validation.required'),
            'grade_id.required' => trans('validation.required'),
            'class_id.required' => trans('validation.required'),
        ];
    }
}
