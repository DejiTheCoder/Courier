<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EnrolAccount extends FormRequest
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
            'bank_account_type' => 'required',
            'bank_name' => 'required|string|max:100',
            'bank_account_number' => 'required|between:9,12',
            'bank_routing_number' => 'required|digits:9',
            'bank_nickname' => 'sometimes|max:100',
        ];
    }
       /**
     * Custom message for validation
     *
     * @return array
     */
     public function messages()
     {
         return [
             
             'bank_account_type.required' => 'Kindly select preferred bank account type!',
             'bank_name.required' => 'Kindly provide bank name!',
             'bank_account_number.required' => 'Kindly provide bank account number!',
             'bank_routing_number.required' => 'Kindly provide bank routing number!',

             //other validations
             'bank_account_number.min' => 'Should not exceed 50 characters!',
             'bank_nickname.max' => 'Account nickname shouldn\'t exceed 100 characters!',
             'bank_name.max' => 'Bank name shouldn\'t exceed 100 characters!',
             'beneficiary_account_number.between' => 'Kindly provide a valid account number!',
             'beneficiary_routing_number.digits' => 'Kindly provide a valid routing number!'
         ];
     }
}
