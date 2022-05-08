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
            'class_id' => 'required',
            'amount' => 'required|numeric',
            'description' => 'required|min:3|max:200',
            'year' => 'required',
            'fees_type' => 'required|in:tuition fees,transportation fees',
            'fee_id' => 'required|exists:fees,id'
        ];
    }
}
