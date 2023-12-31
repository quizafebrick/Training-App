<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateStudentInformationRequest extends FormRequest
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
            'firstname' => 'required',
            'middlename' => 'required',
            'lastname' => 'required',
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
            'age' => 'nullable',
            'email_address' => [Rule::unique('students', 'email_address')->ignore($this->id), 'required'],
            'address' => 'required',
            'image' => 'nullable'
        ];
    }
}
