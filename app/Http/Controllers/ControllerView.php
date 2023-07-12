<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ControllerView extends Controller
{
    public function login() : View {
        return view('index');
    }

    public function register() : View {
        return view('registration');
    }
}
