<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::apiResources([
    "questionnaires" => "QuestionnaireController",
    "questions" => "QuestionController",
    "choices" => "ChoiceController",
    "groups" => "GroupController"
]);
Route::post("/search/testing-sites", "GuestController@searchSite");
Route::get("/sites", "SiteController@index");
Route::post("/questionnaires/{questionnaire}/questions", "QuestionnaireController@attachQuestions");
Route::delete("/questionnaires/{questionnaire}/questions", "QuestionnaireController@detachQuestions");

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
