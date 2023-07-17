<?php

namespace App\Imports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StudentsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Student([
            'firstname' => $row['firstname'],
            'middlename' => $row['middlename'],
            'lastname' => $row['lastname'],
            'contact_no' => $row['contact_no'],
            'gender' => $row['gender'],
            'birthday' => $row['birthday'],
            'age' => $row['age'],
            'email_address' => $row['email_address'],
            'address' => $row['address'],
        ]);
    }

    public function uniqueBy()
    {
        return 'email_address';
    }
}
