<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BillpayRequest extends FormRequest
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
            'pay_source_account' => 'required|string',
            'pay_destination_account' => 'required|string',
            'pay_amount' => 'required|integer|between:500,2000',
            'pay_date_transaction' => 'required',
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
            'pay_source_account.required' => 'Kindly select preferred account!',
            'pay_destination_account.required' => 'Kindly select preferred account!',
            'pay_amount.required' => 'Kindly provide preferred amount!',
            'pay_date_transaction.required' => 'Kindly select preferred date!',

            //other validations
            'pay_amount.between' => 'Preferred amount should be between $500 and $2000!'
        ];
    }
}
