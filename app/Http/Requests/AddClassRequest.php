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
            'class_lists.*.name' => 'required',
            'class_lists.*.name_en' => 'required',
            'class_lists.*.grade_id' => 'required|exists:grades,id'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => trans('validation.required'),
        ];
    }
}
