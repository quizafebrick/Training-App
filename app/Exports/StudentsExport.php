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
        return Student::orderBy('id', 'ASC')
            ->get()
            ->map(function ($students) {
                return $students->makeHidden(['id', 'password', 'image', 'created_at', 'updated_at']);
            });
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
