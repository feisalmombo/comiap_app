<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->isA("sudo")) {
            return view('home');
        }
        
        if (Auth::user()->isA("patient")) {
            return redirect("/patient");
        }

        if (Auth::user()->isA("business"))  {
            return redirect("/business");
        }
        
    }
}
