<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\RegistrationRequest;
use App\Models\Student;

class UserController extends Controller
{
    public function store(RegistrationRequest $request, User $user)
    {

        $requests = $request->validated();

        $requests['password'] = Hash::make($requests['password']);
        $save = $user->create($requests);

        if (!$save) {
            return redirect()->with("error", "Registration Failed");
        }
        return to_route('login')->with("success", "Registration Successfull");
    }

    public function check(LoginRequest $request, User $user)
    {
        $requests = $request->validated();

        $users = $user->where('email_address', $requests['email_address'])->first();

        if (!$users) return back()->with("error", "The user is not reflected to our database");

        if (!Hash::check($requests['password'], $users->password)) {
            return back()->with("error", "The password does not match");
        }
        $request->session()->put('userEmail', $users->id);

        return to_route('user-index');
    }

    public function index(User $user, Student $student)
    {
        $userEmail = ['userEmail' => $user->where('id', session('userEmail'))->first()];
        $students = $student->orderBy('id', 'ASC')->get();

        return view('user.index', $userEmail, compact('students'));
    }

    public function logout()
    {
        if (session()->has('userEmail')) {
            session()->pull('userEmail');

            return to_route('login');
        }
    }
}
