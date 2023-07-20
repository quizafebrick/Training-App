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

        $countMale = $student->where('gender', 'Male')->count();
        $countFemale = $student->where('gender', 'Female')->count();

        $studentsData = $student->selectRaw('DATE_FORMAT(created_at, "%b-%Y") as month, COUNT(*) as count')
            ->groupBy('month')
            ->orderBy('created_at')
            ->get();

        $months = $studentsData->pluck('month')->toArray();
        $counts = $studentsData->pluck('count')->toArray();

        return view('user.index', $userEmail, compact('countMale', 'countFemale', 'months', 'counts'));
    }

    public function logout()
    {
        if (session()->has('userEmail')) {
            session()->pull('userEmail');

            return to_route('login');
        }
    }
}
