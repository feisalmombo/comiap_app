<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use App\Http\Controllers\Helpers\OtherHelpers;
use App\Models\User\RelationModel;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        $faker = factory(User::class)->make();
        return view('guest.register', compact("faker"));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'fullname' => ['required', 'string', 'max:255', "regex:/[a-zA-Z]{3,50}, [a-zA-Z]{3,50} [a-zA-Z]/u"],
            // 'fullname' => ['required',
            'phone' => ['required', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            "building_name" => ['required', "max:25"],
            "building_number" => ['required', "max:10"],
            "street_address" => ['required', "max:25"],
            "zipcode" => ['required'],
            "city" => ['required'],
            "state" => ['required'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return OtherHelpers::register($data);
    }

    public function test_store(Request $request){
        //return $request->all();
        return OtherHelpers::details($request);
    }

    public function test(){
        $relations = RelationModel::get();
        return view('guest.multuser',compact('relations'));
    }
}
