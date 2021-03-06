<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddUpgradedStudentRequest extends FormRequest
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
            'student_id.*' =>'required|exists:students,id',
            'from_grade.*' =>'required',
            'from_class.*' =>'required',
            'from_section.*' =>'required',
            'to_grade.*' =>'required',
            'to_class.*' =>'required',
            'to_section.*' =>'required',
            'academic_year.*' => 'required',
            'new_academic_year.*' => 'required'
        ];
    }
}
