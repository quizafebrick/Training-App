<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Exports\StudentsExport;
use App\Imports\StudentsImport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use App\Http\Requests\StudentInformationRequest;
use App\Http\Requests\UpdateStudentInformationRequest;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function students(User $user, Student $student)
    {
        $userEmail = ['userEmail' => $user->where('id', session('userEmail'))->first()];
        $students = $student->orderBy('id', 'ASC')->get();

        return view('user.students', $userEmail, compact('students'));
    }

    public function create(User $user)
    {
        $userEmail = ['userEmail' => $user->where('id', session('userEmail'))->first()];

        return view('components.add-student', $userEmail);
    }

    public function store(StudentInformationRequest $request, Student $student)
    {
        $requests = $request->validated();

        // * GET THE MAXIMUM EXISTING STUDENT NUMBER FROM THE DATABASE * //
        $maxStudentNumber = $student->max('student_no');

        // * EXTRACT THE COUNTER PART AND INCREMENT IT FOR THE NEXT STUDENT NUMBER * //
        if ($maxStudentNumber === null) {
            $counter = 1;
        }
        $counter = (int) explode('-', $maxStudentNumber)[1] + 1;

        // * GENERATE THE STUDENT NUMBER IN THE FORMAT '2023-00001' IF NOT PROVIDED IN THE REQUEST * //
        if (!isset($requests['student_no'])) {
            $studentNumber = '2023-' . str_pad($counter, 5, '0', STR_PAD_LEFT);
        }
        $requests['student_no'] = $studentNumber;

        $requests['password'] = Hash::make(strtolower($requests['lastname']));

        $save = $student->create($requests);

        if (!$save) {
            return redirect()->with("error", "Saving Failed");
        }
        return to_route('user-index')->with("success", "Saved Successfull");
    }

    public function edit(Student $student, User $user, $id)
    {
        $userEmail = ['userEmail' => $user->where('id', session('userEmail'))->first()];
        $studentDetails = $student->findOrFail($id);

        return view('components.edit-student', $userEmail, compact('studentDetails'));
    }

    public function update(UpdateStudentInformationRequest $request, Student $student, $id)
    {
        $update = $student->where('id', $id)->update($request->validated());

        if (!$update) {
            return redirect()->with("error", "Updating Failed");
        }
        return to_route('student-list')->with("success", "Update Successfull");
    }

    public function destroy(Student $student, $id)
    {
        $student->findOrFail($id)->delete();

        return to_route('student-list')->with("success", "Delete Successful!");
    }

    public function downloadPDF(Student $student)
    {
        $students = $student->get();

        $pdfDownload = FacadePdf::loadView('components.pdf-table-export', array('students' => $students))->setOption(['defaultFont' => 'sans-serif'])->setPaper('legal', 'landscape');

        return $pdfDownload->download('all_students.pdf');
    }

    public function exportExcel()
    {
        return Excel::download(new StudentsExport, 'all_students.xlsx');
    }

    public function importExcel(Request $request)
    {
        $request->validate(['students' => 'required']);

        try {
            Excel::import(new StudentsImport, $request->file('students'));
        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            $failures = $e->failures();

            return back()->with("failures", $failures);
        }

        return to_route('student-list')->with("success", "Import Successful!");
    }
}
