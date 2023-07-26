<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentAccountSettingManagerController extends Controller
{
    // * ARRAY REQUESTS BECAUSE THERE ARE 2 INPUTS IN THE STUDENTVERIFYPASSWORDREQUESTS FILE * //
    public function checkStudent(array $requests)
    {
        // * FIND THE STUDENT BY EMAIL * //
        $students = Student::where('email_address', $requests['email_address'])->first();

        if (!$students) {
            // * STUDENT NOT FOUND, RETURN ERROR RESPONSE * //
            return response()->json(['error' => 'The user is not reflected in our database']);
        }

        if (!Hash::check($requests['old_password'], $students->password)) {
            // * PASSWORD VERIFICATION FAILED, RETURN RESPONSE WITH SHOW_CHANGE_PASSWORD FLAG SET TO FALSE * //
            return response()->json(['show_change_password' => false]);
        }

        // * PASSWORD VERIFICATION SUCCEEDED, RETURN RESPONSE WITH SHOW_CHANGE_PASSWORD FLAG SET TO TRUE * //
        return response()->json(['show_change_password' => true]);
    }

    // * ARRAY REQUESTS BECAUSE THERE ARE 2 INPUTS IN THE STUDENTCHANGEPASSWORDREQUESTS FILE * //
    public function changePasswordStudent(array $requests, $id)
    {
        // * FIND THE STUDENT BY ITS ID * //
        $student = Student::findOrFail($id);

        // * UPDATE THE STUDENT'S PASSWORD * //
        $newPassword = $requests['password'];
        $student->password = Hash::make($newPassword);
        $student->save();

        return response()->json(['message' => 'Password Updated!']);
    }
}
