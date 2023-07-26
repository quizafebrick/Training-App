<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentInformationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'user_id' => 'required',
            'firstname' => 'required|regex:/^[A-Za-z-]+$/',
            'middlename' => 'required|regex:/^[A-Za-z-]+$/',
            'lastname' => 'required|regex:/^[A-Za-z-]+$/',
            'contact_no' => [
                'required',
                'regex:/^(?:(?:\+639\d{9})|(?:09\d{9}))$/',
                function ($attribute, $value, $fail) {
                    if (!preg_match('/^(?:\+639)|(?:09)/', $value)) {
                        $fail('The ' . $attribute . ' field must start with +639 or 09.');
                    } elseif (strpos($value, '+639') === 0 && strlen($value) !== 13) {
                        $fail('The ' . $attribute . ' field must be exactly 13 digits when starting with +639.');
                    } elseif (strpos($value, '09') === 0 && strlen($value) !== 11) {
                        $fail('The ' . $attribute . ' field must be exactly 11 digits when starting with 09.');
                    }
                },
                'max:13',
                'min:11'
            ],
            'gender' => 'required',
            'birthday' => 'required',
            'age' => 'required',
            'email_address' => 'required|email:filter|unique:students,email_address|ends_with:@gmail.com',
            'address' => 'required'
        ];
    }
}
