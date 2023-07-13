<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StudentInformationRequest;
use App\Models\Student;

class StudentController extends Controller
{
    public function studentStore(StudentInformationRequest $request, Student $student)
    {
        $save = $student->create($request->validated());

        if (!$save) {
            return redirect()->with("error", "Saving Failed");
        }
        return to_route('user-index')->with("success", "Saved Successfull");
    }
}
