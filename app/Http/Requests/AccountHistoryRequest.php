<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccountHistoryRequest extends FormRequest
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
            'account_type' => 'required',
            'transaction_start_date' => 'required',
            'transaction_end_date' => 'required'
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
            'account_type.required' => 'Kindly select preferred account!',
            'transaction_start_date.required' => 'Kindly select preferred transaction date!',
            'transaction_start_date.required' => 'Kindly select preferred transaction date!'
        ];
    }
}
