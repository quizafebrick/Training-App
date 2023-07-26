<?php

namespace App\Exports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class StudentsExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $students = Student::orderBy('id', 'ASC')
            ->where('user_id', session('userEmail'))
            ->get()
            ->map(function ($studentsHidden) {
                return $studentsHidden->makeHidden(['id', 'user_id', 'password', 'image', 'created_at', 'updated_at']);
            });

        return $students;
    }

    public function headings(): array
    {
        return [
            "Student No.",
            "Firstname",
            "Middlename",
            "Lastname",
            "Contact No.",
            "Gender",
            "Email Address",
            "Birthday",
            "Age",
            "Address"
        ];
    }
}
