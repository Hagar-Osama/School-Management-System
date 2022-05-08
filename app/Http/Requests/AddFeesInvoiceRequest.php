<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddFeesInvoiceRequest extends FormRequest
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
            'fees_list.*student_id' => 'required|exists:students,id',
            'fees_list.*amount' => 'required',
            'fees_list.*description' => 'required',
            'fees_list.*fee_id' => 'required|exists:fees,id',
            'grade_id' => 'required|exists:grades,id',
            'class_id' => 'required|exists:classes,id',


        ];
    }
}
