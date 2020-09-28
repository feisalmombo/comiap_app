<?php

namespace App\Http\Controllers;

use App\Questionnaire;
use App\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PatientController extends Controller
{
    public function index() {
        $test = Test::where("user_id", Auth::id())->where("on_behalf_of", Auth::id())->count();
        if ($test) {
            return view("patient.landing");
        }
        return redirect("/covidQ");
    }

    public function covidQ() {
        $questionnaire = Questionnaire::with("questions.choices.group")->first();
        return view("patient.covidQ", compact("questionnaire"));
    }
}
