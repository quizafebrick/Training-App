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
            'firstname' => 'required|string',
            'middlename' => 'required|string',
            'lastname' => 'required|string',
            'contact_no' => ['required','regex:/^(?:\+63|09)/', 'max:13', 'min:11'],
            'gender' => 'required',
            'birthday' => 'required',
            'age' => 'required',
            'email_address' => 'required|email:filter|unique:students,email_address|ends_with:@gmail.com',
            'address' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'contact_no.regex' => 'The contact no. must starts with +63 or 09',
        ];
    }
}
