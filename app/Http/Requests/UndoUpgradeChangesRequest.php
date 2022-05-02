<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UndoUpgradeChangesRequest extends FormRequest
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
            // 'student_id.*' =>'required|exists:students,id',
            // 'grade_id.*' =>'required|exists:students,grade_id',
            // 'class_id.*' =>'required|exists:students,class_id',
            // 'section_id.*' =>'required|exists:students,section_id',
            // 'academic_year.*' => 'required',
        ];
    }
}
