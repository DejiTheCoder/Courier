<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AchPaymentRequest extends FormRequest
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
            'sender_account' => 'required|string',
            'receiver_account' => 'required|string',
            'amount' => 'required|integer|between:500,2000',
            'transfer_type' => 'required',
            'schedule_date_transaction' => 'required',
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
            'sender_account.required' => 'Kindly select preferred account!',
            'receiver_account.required' => 'Kindly select preferred account!',
            'amount.required' => 'Kindly provide preferred amount!',
            'transfer_type.required' => 'Kindly select preferred transfer delivery type!',
            'schedule_date_transaction.required' => 'Kindly select preferred date!',

            //other validations
            'amount.between' => 'Preferred amount should be between $500 and $2000!'
        ];
    }
}
