<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
class Managercontroller extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isadmin');
    }
    public function dashboard()
    {
        return view('manager.dashboard');
    }
}
