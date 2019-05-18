<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateMember extends FormRequest
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
            //create member validation rules
            'firstName' => 'required|min:3|max:100',
            'lastName' => 'required|min:3|max:100',
            'email' => 'required|email',
            'address_line_1' => 'required|min:2',
            'address_line_2' => 'nullable|min:2',
            'town' => 'required|min:2',
            'county' => 'required|min:2',
            'postcode' => 'required|min:4',
            'membership_id' => 'integer',
            'phone' => 'nullable|string|min:6',
            'DOB' => 'nullable|date',
        ];
    }
}
