<?php

namespace App\Http\Controllers;

use App\Questionnaire;
use Illuminate\Http\Request;

class QuestionnaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questionnaires = Questionnaire::with("questions")->get();
        return response()->json($questionnaires, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.questionnaires.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $questionnaire = Questionnaire::create($request->input());
        $questionnaire["questions"] = [];
        return response()->json($questionnaire, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Questionnaire  $questionnaire
     * @return \Illuminate\Http\Response
     */
    public function show(Questionnaire $questionnaire)
    {
        return response()->json($questionnaire, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Questionnaire  $questionnaire
     * @return \Illuminate\Http\Response
     */
    public function edit(Questionnaire $questionnaire)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Questionnaire  $questionnaire
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Questionnaire $questionnaire)
    {
        $questionnaire->update($request->input());
        $questionnaire->load("questions");
        return response()->json($questionnaire, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Questionnaire  $questionnaire
     * @return \Illuminate\Http\Response
     */
    public function destroy(Questionnaire $questionnaire)
    {
        $questionnaire->questions()->detach();
        $id = $questionnaire->delete();
        return response()->json($id, 200);
    }

    public function attachQuestions(Questionnaire $questionnaire) {
        $questionnaire->questions()->attach(request()->input("id"));
        $questionnaire->load("questions");
        return response()->json($questionnaire, 200);
    }

    public function detachQuestions(Questionnaire $questionnaire) {
        $questionnaire->questions()->detach(request()->input("id"));
        $questionnaire->load("questions");
        return response()->json($questionnaire, 200);
    }
}
