<?php
namespace App\Http\Controllers\Helpers;

use App\Mail\RegistrationComfirmationPassword;
use App\Mail\RegistrationComfirmationUsername;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Role;
use App\User;
use App\Models\Address;
use App\Models\User\RelationModel;
use Illuminate\Http\Request;

class OtherHelpers {
    public static function details(Request $request,$arr = ['email','phone','fullname']){
        $form_names = RelationModel::get();
        $details = [];
        foreach($form_names as $form_name){
            $type = $form_name->form_name??"friend";
            $type2 = $form_name->id;
            $details[] = OtherHelpers::subs($request,$arr,$type,$type."email",$type2);
        }
        return $details;
    }


    public static function subs(Request $request,$array = [],$type = "",$carries = "sub_items",$type2){
        $subs = [];
        $i = 0;
        foreach($request->$carries??[] as $sub){
            if($sub != null){
                $temp = [];
                foreach($array as $arr){
                    $arr2 = $type . $arr;
                    if(is_array($request->$arr2)){
                        $temp[$arr] = $request->$arr2[$i];
                    }else{
                        $temp[$arr] = $request->$arr2;
                    }
                }
                $temp['type'] = $type2;
                $subs[] = $temp;
            }
            $i++;
        }
        return $subs; 
    }


    public static function register(array $data,$send_email = true){
        $registrations = function() use($data,$send_email){
            preg_match_all("/([a-zA-Z]+), ([a-zA-Z]+) ([a-zA-Z])/", $data["fullname"], $names);
            $data["phone"] = str_replace("-", "", $data['phone']);
            $user = User::create([
                'suffix' => $data['suffix'],
                'first_name' => $names[2][0],
                "middle_initial" => $names[3][0],
                "last_name" => $names[1][0],
                "phone" => $data["phone"],
                'email' => $data['email'],
                "gender" => $data["gender"],
                "ethnicity" => $data["ethnicity"],
            ]);

            $address = new Address([
                "building_name" => $data["building_name"],
                "building_number" => $data["building_number"],
                "street_address" => $data["street_address"],
                "second_address" => $data["second_address"],
                "zipcode" => $data["zipcode"],
                "city" => $data["city"],
                "state" => $data["state"],
            ]);
            $user->addresses()->save($address);

            $patient = Role::where("name","patient")->first();
            $business = Role::where("name","business")->first();

            if ($data["account_type"] == "patient") {
                if ($patient) {
                    $user->attachRole($patient);
                } else {
                    $patient = Role::create([
                        'name' => "patient",
                        "display_name" => "Patient"
                    ]);
                    $user->attachRole($patient);
                }
            }

            if ($data["account_type"] == "business") {
                if ($business) {
                    $user->attachRole($business);
                } else {
                    $business = Role::create([
                        'name' => "business",
                        "display_name" => "Business"
                    ]);
                    $user->attachRole($business);
                }
            }

            //Generate Password
            $password = rand(10000000,99999999);
            
            $user->password = Hash::make($password);
            $user->save();
            if($send_email){
                Mail::to($user->email)->send(new RegistrationComfirmationUsername($user));
                Mail::to($user->email)->send(new RegistrationComfirmationPassword($user, $password));
            }
            
            request()->session()->flash("password", $password);
            
            return $user;
        };
        return DB::transaction($registrations,2);
    }
}