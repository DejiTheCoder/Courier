<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WireTransferRequest extends FormRequest
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
            'beneficiary_country' => 'required|string',
            'beneficiary_bank' => 'required|string',
            'beneficiary_bank_address' => 'required|string',
            'beneficiary_account_number' => 'required|between:9, 12',
            'beneficiary_routing_number' => 'required|digits:9',
            'beneficiary_sort_code' => 'sometimes|string',
            'beneficiary_swift_code' => 'sometimes|string',
            'beneficiary_name' => 'required|string|max:100',
            'beneficiary_address' => 'required|string',
            'pay_amount' => 'required|integer|between:1500,500000'
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
             'beneficiary_country.required' => 'Kindly provide beneficiary Country!',
             'beneficiary_bank.required' => 'Kindly provide beneficiary bank information!',
             'beneficiary_bank_address.required' => 'Kindly provide beneficiary bank address!',
             'beneficiary_account_number.required' => 'Kindly provide beneficiary bank account number!',
             'beneficiary_routing_number.required' => 'Kindly provide beneficiary bank routing number!',
             'beneficiary_name.required' => 'Kindly provide beneficiary full name!',
             'beneficiary_address.required' => 'Kindly provide beneficiary valid address!',
             'pay_amount.required' => 'Kindly provide preferred amount!',

             //other validations
             'beneficiary_account_number.min' => 'Should not exceed 50 characters!',
             'beneficiary_name.max' => 'Beneficiary name should no exceed 100 characters!',
             'beneficiary_account_number.between' => 'Kindly provide a valid account number!',
             'beneficiary_routing_number.digits' => 'Kindly provide a valid routing number!',
             'pay_amount.between' => 'Kindly provide a valid amount!'
         ];
     }
}
