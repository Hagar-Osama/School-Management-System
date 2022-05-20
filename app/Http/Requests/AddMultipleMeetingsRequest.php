<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddMultipleMeetingsRequest extends FormRequest
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
            'grade_id' => 'required|exists:grades,id',
            'class_id' => 'required|exists:classes,id',
            'section_id' => 'required|exists:sections,id',
            'duration' => 'required|numeric',
            'start_time' => 'required',
            'topic' => 'required',
            'join_url' => 'required|url',
            'start_url' => 'required|url',
            'password' => 'required',
            'meeting_id' => 'required',

        ];
    }
}
