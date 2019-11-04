<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientProfileUpdateRequest extends FormRequest
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
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'home_address' => ['required', 'string', 'max:255'],
            'postal_address' => ['required', 'string'],
            'dob' => ['required', 'string'],
            'country' => ['required'],
            'mobile_number' => ['required', 'string', 'max:255'],
            'occupation' => ['required', 'string', 'max:255'],
            'next_of_kin' => ['required', 'string', 'max:255'],
            'welcome_message' => ['required', 'string', 'max:255'],
            'account_sq' => ['required', 'string'],
            'sq_answer' => ['required', 'string', 'max:255']
        ];
    }
}
