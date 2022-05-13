<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddAttendanceRequest extends FormRequest
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
            'student_id.*' => 'required|exists:students,id',
            'grade_id.*' => 'required|exists:grades,id',
            'class_id.*' => 'required|exists:classes,id',
            'section_id.*' => 'required|exists:sections,id',
            'teacher_id.*' => 'required|exists:teachers,id',
            'attendance_status.*' => 'required',
            'attendance_date.*' => 'required'
        ];
    }
}
