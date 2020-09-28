<?php

use App\Http\Controllers\OrganizationController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', "GuestController@index")->name("g_home");
Route::get('/sitelocator', "GuestController@sitelocator")->name("sitelocator");
Route::get('/multiuser', "Auth\RegisterController@test")->name('multiuser');
Route::post('/multiuser_post', "Auth\RegisterController@test_store")->name('multiuser_post');

Route::middleware("auth")->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource("questionnaires", 'QuestionnaireController');

    //Patient Routes
    Route::get('/patient', "PatientController@index")->name("patient");
    Route::get('/covidQ', "PatientController@covidQ")->name("covidQ");

    //Business Routes
    Route::get('/business', "BusinessController@index")->name("business");
    Route::get("/business/dashboard", "BusinessController@dashboard")->name("business.dashboard");
    Route::get("/business/config", "BusinessController@config")->name("business.config");
    Route::post("/business/organization", "OrganizationController@store")->name("organizations.store");
});