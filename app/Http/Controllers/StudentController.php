<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Student;
// use Barryvdh\DomPDF\Facade\Pdf;
use PDF;
use Illuminate\Http\Request;
use App\Http\Requests\StudentInformationRequest;
use App\Http\Requests\UpdateStudentInformationRequest;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;

class StudentController extends Controller
{
    public function store(StudentInformationRequest $request, Student $student)
    {
        $save = $student->create($request->validated());

        if (!$save) {
            return redirect()->with("error", "Saving Failed");
        }
        return to_route('user-index')->with("success", "Saved Successfull");
    }

    public function edit(Student $student, User $user, $id)
    {
        $userEmail = ['userEmail' => $user->where('id', session('userEmail'))->first()];
        $studentDetails = $student->findOrFail($id);

        return view('user.edit-student', $userEmail, compact('studentDetails'));
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

        $pdfDownload = FacadePdf::loadView('table-bootstrap.pdf-table-export', array('students' => $students))->setOptions(['defaultFont' => 'sans-serif', 'isHtml5ParserEnabled' => true,]);

        return $pdfDownload->download('all-students.pdf');

        // return view('table-bootstrap.pdf-table-export', compact('students'));
    }
}
