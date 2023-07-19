<?php

namespace App\Http\Controllers;

use App\Exports\StudentsExport;
use App\Models\User;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Requests\StudentInformationRequest;
use App\Http\Requests\UpdateStudentInformationRequest;
use App\Imports\StudentsImport;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Maatwebsite\Excel\Facades\Excel;

class StudentController extends Controller
{
    public function store(StudentInformationRequest $request, Student $student)
    {
        $requests = $request->validated();

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
        return to_route('user-index')->with("success", "Update Successfull");
    }

    public function destroy(Student $student, $id)
    {
        $student->findOrFail($id)->delete();

        return to_route('user-index')->with("success", "Delete Successful!");
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

        return to_route('user-index')->with("success", "Import Successful!");
    }
}
