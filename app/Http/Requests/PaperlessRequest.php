<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaperlessRequest extends FormRequest
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
            'general_statement' => 'required',
            'tax_statement' => 'required',
            'notification' => 'required'
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
            'general_statement.required' => 'Kindly select preferred option!',
            'tax_statement.required' => 'Kindly select preferred option!',
            'notification.required' => 'Kindly select preferred option!'

        ];
    }

    
}
