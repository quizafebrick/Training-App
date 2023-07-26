<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentChangePasswordRequests;
use App\Http\Requests\StudentVerifyPasswordRequests;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentAccountSettingController extends Controller
{

    // * PRIVATE PROPERTY TO HOLD AN INSTANCE OF THE STUDENTACCOUNTMANAGERCONTROLLER CLASS * //
    private $studentManager;

    // * CONSTRUCTOR METHOD WITH DEPENDENCY INJECTION * //
    public function __construct(StudentAccountSettingManagerController $studentManager)
    {
        // * INJECTING THE STUDENTMANAGER INSTANCE INTO THE $STUDENTMANAGER PROPERTY * //
        $this->studentManager = $studentManager;
    }

    public function edit(Student $student, $id)
    {
        $studentEmail = ['studentEmail' => $student->where('id', session('studentEmail'))->first()];
        $studentDetails = $student->findOrFail($id);

        return view('student.account-settings', $studentEmail, compact('studentDetails'));
    }

    public function check(StudentVerifyPasswordRequests $request)
    {
        $requests = $request->validated();

        // * CALL THE CHECKSTUDENT METHOD OF THE STUDENTACCOUNTMANAGERCONTROLLER INSTANCE * //
        // * AND PASS THE REQUESTS ARRAY * //
        return $this->studentManager->checkStudent($requests);
    }

    public function changePassword(StudentChangePasswordRequests $request, $id)
    {
        $requests = $request->validated();

        // * CALL THE CHANGEPASSWORDSTUDENT METHOD OF THE STUDENTACCOUNTMANAGERCONTROLLER INSTANCE * //
        // * AND PASS THE REQUESTS ARRAY AND ID AS ARGUMENTS * //
        return $this->studentManager->changePasswordStudent($requests, $id);
    }
}
