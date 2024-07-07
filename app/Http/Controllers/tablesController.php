<?php

namespace App\Http\Controllers;

use App\Models\Ant;


class tablesController extends Controller
{
    
    public function Ant()
    {
        $ant = Ant::all();
        return view('tableant', compact('ant'));
    }

    public function Login()
    {
        return view('login');
    }
    public function Home()
    {
        return view('home');
    }
    public function Account()
    {
        return view('account');
    }
    public function Telepass()
    {
        return view('telepass');
    }
    public function Register()
    {
        return view('register');
    }
    public function Service()
    {
        return view('service');
    }
    public function Menu()
    {
        return view('menu');
    }
}
