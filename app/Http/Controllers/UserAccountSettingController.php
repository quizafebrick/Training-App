<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserChangePasswordRequests;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\UserVerifyPasswordrequests;

class UserAccountSettingController extends Controller
{
    // * PRIVATE PROPERTY TO HOLD AN INSTANCE OF THE USERACCOUNTMANAGERCONTROLLER CLASS * //
    private $userManager;

    // * CONSTRUCTOR METHOD WITH DEPENDENCY INJECTION * //
    public function __construct(UserAccountSettingManagerController $userManager)
    {
        // * INJECTING THE USERMANAGER INSTANCE INTO THE $USERMANAGER PROPERTY * //
        $this->userManager = $userManager;
    }

    public function edit(User $user, $id)
    {
        $userEmail = ['userEmail' => $user->where('id', session('userEmail'))->first()];
        $userDetails = $user->findOrFail($id);

        return view('user.account-settings', $userEmail, compact('userDetails'));
    }

    public function check(UserVerifyPasswordrequests $request)
    {
        $requests = $request->validated();

        // * CALL THE CHECKUSER METHOD OF THE USERACCOUNTMANAGERCONTROLLER INSTANCE * //
        // * AND PASS THE REQUESTS ARRAY * //
        return $this->userManager->checkUser($requests);
    }

    public function changePassword(UserChangePasswordRequests $request, $id)
    {
        $requests = $request->validated();

        // * CALL THE CHANGEPASSWORDUSER METHOD OF THE USERACCOUNTMANAGERCONTROLLER INSTANCE * //
        // * AND PASS THE REQUESTS ARRAY AND ID AS ARGUMENTS * //
        $response = $this->userManager->changePasswordUser($requests, $id);

        // * IF THERE ARE VALIDATION ERRORS, RETURN THEM AS A JSON RESPONSE * //
        if ($response instanceof \Illuminate\Validation\Validator) {
            return new JsonResponse(['errors' => $response->errors()], 422);
        }

        // * IF EVERYTHING IS SUCCESSFUL, RETURN A SUCCESS RESPONSE * //
        return new JsonResponse(['message' => 'Password changed successfully']);
    }
}
