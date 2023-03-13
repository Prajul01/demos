<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class SchoolRequest extends FormRequest
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

    public function rules()
    {
        return [
            'school_type'=>'required',
            'school'=>'required',
            'principal_name'=>'required',
            'school_email'=>'required',
            'school_phone'=>'required',
            'ward_no'=>'required',
            'school_level'=>'required',
            'principal_no'=>'required',
            'principal_email'=>'required',
            'created_by'=>'required',





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
