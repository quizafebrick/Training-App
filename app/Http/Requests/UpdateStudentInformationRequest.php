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
            'contact_no' => ['required', 'regex:/^(?:\+639|09)\d{9,11}$/'],
            'gender' => 'required',
            'birthday' => 'required',
            'age' => 'nullable',
            'email_address' => [Rule::unique('students', 'email_address')->ignore($this->id), 'required'],
            'address' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'contact_no.regex' => 'The contact no. must starts with +639 or 09',
        ];
    }
}
