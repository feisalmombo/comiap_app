<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Site;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index() {
        return view("guest.landing");
    }

    public function sitelocator() {
        return view("guest.sitelocator");
    }

    public function register() {
        return view("guest.register");
    }

    public function login() {
        return view("guest.login");
    }

    public function searchSite(Request $request) {
        $request->validate([
            "zipcode" =>  ["required"]
        ]);
        
        $addresses = Address::whereHasMorph(
            "addresses",
            ["App\Models\Site"],
            function (Builder $query) use ($request) {
                $query->where("zipcode", $request->zipcode);
            }
        )->get();


        if ($addresses->count()) {
            $address = $addresses[0];
            $radius = 0.05;
            $sites = Site::whereHas("addresses", function (Builder $query) use ($address, $radius) {
                $query
                    ->where("latitude", ">", $address->latitude - $radius)
                    ->where("latitude", "<", $address->latitude + $radius)
                    ->where("longitude", ">", $address->longitude - $radius)
                    ->where("longitude", "<", $address->longitude + $radius);
            })->with("addresses")->get();

            if ($sites->count()) {
                return response()->json(["data" => $sites, "ref" => ["lat" => $address->latitude, "lng" => $address->longitude]]);
            } else {
                return response()->json(["data" => []]);
            }
        } else {
            return response()->json(["data" => []]);
        }
    }
}
