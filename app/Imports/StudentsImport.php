<?php

namespace App\Imports;

// use DateTime;
use Carbon\Carbon;
use App\Models\Student;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class StudentsImport implements ToCollection, WithHeadingRow, WithValidation
{
    // use SkipsErrors;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function collection(Collection $rows)
    {
        foreach ($rows as $row)
        {
            $birthday = $row['birthday'];
            $age = $this->calculateAge($birthday);

            Student::create([
                'firstname' => $row['firstname'],
                'middlename' => $row['middlename'],
                'lastname' => $row['lastname'],
                'contact_no' => $row['contact_no'],
                'gender' => $row['gender'],
                'birthday' => $birthday,
                'age' => $age,
                'email_address' => $row['email_address'],
                'address' => $row['address']
            ]);
        }
    }

    public function calculateAge($birthday)
    {
        $birthdate = Carbon::createFromFormat('m-d-Y', $birthday);
        $age = $birthdate->diffInYears(Carbon::now());

        return $age;
    }

    public function rules(): array
    {
        return [
            '*.firstname' => ['required', 'regex:/^[A-Za-z-]+$/'],
            '*.middlename' => ['required', 'regex:/^[A-Za-z-]+$/'],
            '*.lastname' => ['required', 'regex:/^[A-Za-z-]+$/'],
            '*.contact_no' => ['required','regex:/^(?:\+63|09)\d{9,11}$/', 'max:13', 'min:11'],
            '*.gender' => ['required', 'regex:/^[A-Za-z]+$/'],
            '*.birthday' => ['required', 'regex:/^\d{2}-\d{2}-\d{4}$/'],
            '*.email_address' => ['required', 'email:filter', 'unique:students,email_address', 'ends_with:@gmail.com'],
            '*.address' => ['required']
        ];
    }

    public function customValidationMessages()
    {
        return [
            'email_address.ends_with' => 'The email_address must end only with: @gmail.com',
        ];
    }
}
