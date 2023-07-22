<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ControllerView extends Controller
{
    public function adminLogin()
    {
        return view('index');
    }

    public function register()
    {
        return view('registration');
    }

    public function studentLogin()
    {
        return view('student.login');
    }
}
