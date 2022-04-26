<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UploadFileRequest extends FormRequest
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
            'student_name' => 'required',
            'student_id' => 'required|exists:students,id',
            'photos.*' => 'required|image|mimes:jpg,png,wamp,pdf.svf.gif,jpeg'
        ];
    }

    public function messages()
    {
        return [
            'student_name.required' => trans('validation.required'),
            'student_id.required' => trans('validation.required'),
            'photos.required' => trans('validation.required'),

        ];
        
    }
}
