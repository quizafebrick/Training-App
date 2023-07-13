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
            'firstname' => 'required',
            'middlename' => 'required',
            'lastname' => 'required',
            'contact_no' => 'required',
            'gender' => 'required|string',
            'birthday' => 'required',
            'age' => 'required',
            'email_address' => 'required|email:filter|unique:students,email_address',
            'address' => 'required'
        ];
    }
}
