<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentChangePasswordRequests;
use App\Http\Requests\StudentLoginRequest;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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

    public function check(Request $request)
    {
        $validatedData = $request->validate([
            'old_password' => 'required|string',
            'email_address' => 'required|email',
        ]);

        // * CALL THE CHECKSTUDENT METHOD OF THE STUDENTACCOUNTMANAGERCONTROLLER INSTANCE * //
        // * AND PASS THE VALIDATED EMAIL AND OLD PASSWORD AS ARGUMENTS * //
        return $this->studentManager->checkStudent($validatedData['email_address'], $validatedData['old_password']);

    }

    public function changePassword(StudentChangePasswordRequests $request, $id)
    {
        // Validate that the "password" field is confirmed (matches "password_confirmation")
        $requests = $request->validated();

        return $this->studentManager->changePasswordStudent($requests['password'], $id);
    }
}
