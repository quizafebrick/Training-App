<?php

namespace App\Imports;

// use DateTime;
use Carbon\Carbon;
use App\Models\Student;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
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

    private $studentNumberCounter;

    public function __construct()
    {
        // * CHECK IF THERE ARE NO EXISTING STUDENT RECORDS IN THE DATABASE * //
        if (!Student::max('student_no')) {
            // * IF THERE ARE NO EXISTING RECORDS, START THE COUNTER FROM 1 * //
            $this->studentNumberCounter = 1;
        }
        // * IF THERE ARE EXISTING RECORDS, FIND THE HIGHEST STUDENT NUMBER * //
        $highestStudentNo = Student::max('student_no');

        // * SPLIT THE HIGHEST STUDENT NUMBER INTO YEAR AND COUNTER PARTS * //
        $parts = explode('-', $highestStudentNo);

        // * EXTRACT THE COUNTER PART AND CONVERT IT TO AN INTEGER * //
        $lastCounter = (int) $parts[1];

        // * INCREMENT THE COUNTER TO PREPARE FOR THE NEXT STUDENT NUMBER * //
        $this->studentNumberCounter = $lastCounter + 1;
    }

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $lastname = $row['lastname'];
            $birthday = $row['birthday'];
            $age = $this->calculateAge($birthday);
            $password = Hash::make(strtolower($lastname));

            $studentNumber = '2023-' . str_pad($this->studentNumberCounter++, 5, '0', STR_PAD_LEFT);

            Student::create([
                'student_no' => $studentNumber,
                'user_id' => session('userEmail'),
                'firstname' => $row['firstname'],
                'middlename' => $row['middlename'],
                'lastname' => $row['lastname'],
                'contact_no' => $row['contact_no'],
                'gender' => $row['gender'],
                'birthday' => $birthday,
                'age' => $age,
                'email_address' => $row['email_address'],
                'password' => $password,
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
            '*.firstname' => ['required', 'regex:/^[A-Za-z\'-]+$/'],
            '*.middlename' => ['required', 'regex:/^[A-Za-z\'-]+$/'],
            '*.lastname' => ['required', 'regex:/^[A-Za-z\'-]+$/'],
            '*.contact_no' => ['required', 'regex:/^(?:\+63|09)\d{9,11}$/', 'max:13', 'min:11'],
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
