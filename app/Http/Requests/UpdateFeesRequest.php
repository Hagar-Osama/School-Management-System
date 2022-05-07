<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFeesRequest extends FormRequest
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
            'title_ar' => 'required',
            'title_en' => 'required',
            'grade_id' => 'required|exists:grades,id',
            'class_id' => 'required|unique:fees,class_id,'.$this->fee_id,
            'amount' => 'required|numeric',
            'description' => 'required|min:3|max:200',
            'year' => 'required',
            'fee_id' => 'required|exists:fees,id'
        ];
    }
}