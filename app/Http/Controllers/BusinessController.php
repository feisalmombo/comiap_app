<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BusinessController extends Controller
{
    public function index() {
        if (Auth::user()->organizations()->get()->count()) {
            return redirect()->route("business.dashboard");
        } else {
            return redirect()->route("business.config");
        }
    }

    public function dashboard() {
        return view("business.dashboard");
    }

    public function config() {
        return view("business.config");
    }
}
