<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserAccountSettingManagerController extends Controller
{
    // * ARRAY REQUESTS BECAUSE THERE ARE 2 INPUTS IN THE USERVERIFYPASSWORDREQUESTS FILE * //
    public function checkUser(array $requests)
    {
        // * FIND THE USER BY EMAIL * //
        $users = User::where('email_address', $requests['email_address'])->first();

        if (!$users) {
            // * USER NOT FOUND, RETURN ERROR RESPONSE * //
            return response()->json(['error' => 'The user is not reflected in our database']);
        }

        if (!Hash::check($requests['old_password'], $users->password)) {
            // * PASSWORD VERIFICATION FAILED, RETURN RESPONSE WITH SHOW_CHANGE_PASSWORD FLAG SET TO FALSE * //
            return response()->json(['show_change_password' => false]);
        }

        // * PASSWORD VERIFICATION SUCCEEDED, RETURN RESPONSE WITH SHOW_CHANGE_PASSWORD FLAG SET TO TRUE * //
        return response()->json(['show_change_password' => true]);
    }

    // * ARRAY REQUESTS BECAUSE THERE ARE 2 INPUTS IN THE USERCHANGEPASSWORDREQUESTS FILE * //
    public function changePasswordUser(array $requests, $id)
    {
        // * FIND THE USER BY ITS ID * //
        $user = User::findOrFail($id);

        // * UPDATE THE USER'S PASSWORD * //
        $newPassword = $requests['password'];
        $user->password = Hash::make($newPassword);
        $user->save();

        return response()->json(['message' => 'Password Updated!']);
    }
}
