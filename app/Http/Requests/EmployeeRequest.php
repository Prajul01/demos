<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class EmployeeRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'school_name' => 'required',
            'category' => 'required',
            'type' => 'required',
            'post' => 'required',
            'grade' => 'required',
            'phone' => 'required',
            'status' => 'required',
            'gender' => 'required',
            'marital_status' => 'required',
            'contact_no' => 'required',
            'bank' => 'required',
            'account_no' => 'required',
            'provident_no' => 'required',
            'citizen_inv_no' => 'required',
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success'   => false,
            'message'   => 'Validation errors',
            'data'      => $validator->errors()
        ]));
    }
}
