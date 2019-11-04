<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BillpayAza extends FormRequest
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
            'pay_account_name' => 'required|string',
            'pay_account_address' => 'required|string|max:100',
            'pay_city_state_zip' => 'required|string',
            'pay_account_number' => 'required|unique:billpay_accounts|max:12',
            'pay_account_phone' => 'required|max:15'
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
            'pay_account_name.required' => 'Kindly provide payee name!',
            'pay_account_address.required' => 'Kindly provide payee address!',
            'pay_city_state_zip.required' => 'Kindly provide payee city, state and zip code!',
            'pay_account_number.required' => 'Kindly provide payee bank account number!',
            'pay_account_phone.required' => 'Kindly provide payee phone number!',

            //other validations
            'pay_account_address.max' => 'Payee address should not exceed 100 characters!',
            'pay_account_number.max' => 'Kindly provide a valid account number!',
            'pay_account_phone.max' => 'Kindly provide a valid phone number!',
            'pay_account_number.unique' => 'Sorry! Account number seems attached to a different payee!'
        ];
    }
}
