<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StudentInformationRequest;
use App\Models\Student;
use App\Models\User;

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
}
