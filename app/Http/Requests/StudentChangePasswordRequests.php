<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentChangePasswordRequests extends FormRequest
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
            'password' => [
                'required',
                'string',
                'min:8',
                // * A COMBINATION OF AT LEAST ONE UPPERCASE LETTER, ONE LOWERCASE LETTER, AND ONE DIGIT * //
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/',
            ],
            'confirm_password' => 'required|same:password',
        ];
    }
}
