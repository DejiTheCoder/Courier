<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FeedbackRequest extends FormRequest
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
            'department' => 'required',
            'subject' => 'required',
            'client_complaints' => 'required|max:250'
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
            'department.required' => 'Kindly select preferred option!',
            'subject.required' => 'Kindly select preferred option!',
            'client_complaints.required' => 'Kindly state your complaints or enquiries!',
            'client_complaints.max' => 'Complaints shouldn\'t exceed 250 character'

        ];
    }
}
