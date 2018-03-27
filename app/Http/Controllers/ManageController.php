<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class ManageController extends Controller
{

    public function index()
    {
        if(Auth::guest()) return redirect()->route('login');

        return redirect()->route('manage.dashboard');
    }

    public function dashboard()
    {
        return view('_manage.dashboard');
    }
}
