<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function dashboard():View
    {
        return view('dashboard');
    }

    public function home():View
    {
        return view('welcome');
    }

}
