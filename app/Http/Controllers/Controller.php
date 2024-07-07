<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public function showRegistro()
    {
        return view('register');
    }
    public function showLogin()
    {
        return view('login');
    }
    public function showInfo()
    {
        return view('telepass');
    }
}
