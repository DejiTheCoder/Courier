<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientNewPasswordRequest extends FormRequest
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
            'new' => 'required|string|min:6',
            'newconfirm' => 'required|string|min:6|same:new'
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
            'new.required' => 'Kindly provide your new password!',
            'newconfirm.required' => 'Kindly confirm your new password!',
            'newconfirm.same' => 'your passwords doesn\'t match!'

           
        ];
    }
}
