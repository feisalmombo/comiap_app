<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Organization;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrganizationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required",
            "position" => "required",
        ]);

        try {
            DB::transaction(function () use ($request) {
                
                //Get the User
                $user = null;
                if ($request->contact_person) {
                    $user = Auth::user();
                } else {
                    $request->validate([
                        'fullname' => ['required', 'string', 'max:255', "regex:/[a-zA-Z]{3,50}, [a-zA-Z]{3,50} [a-zA-Z]/u"],
                        "email" => "required|email|unique:users",
                        "phone" => "required|unique:users",
                    ]);

                    preg_match_all("/([a-zA-Z]+), ([a-zA-Z]+) ([a-zA-Z])/", $request->fullname, $names);
                    $request->phone = str_replace("-", "", $request->phone);

                    $user = User::create([
                        'first_name' => $names[2][0],
                        "middle_initial" => $names[3][0],
                        "last_name" => $names[1][0],
                        "phone" => $request->phone,
                        'email' => $request->email,
                    ]);
                }

                //Add the Organization
                $organization = Organization::create([
                    "name" => $request->name,
                    "contact" => $user->id,
                    "position" => $request->position,
                ]);

                //Add Organization Physical and Billing Addreses
                $organization->addresses()->save(new Address([
                    "type" => "physical",
                    "street_address" => $request->physical_address
                ]));

                if ($request->same_as_physical) {
                    $organization->addresses()->save(new Address([
                        "type" => "billing",
                        "street_address" => $request->physical_address
                    ]));
                } else {
                    $request->validate([
                        "billing_address" => "required",
                    ]);

                    $organization->addresses()->save(new Address([
                        "type" => "billing",
                        "street_address" => $request->billing_address
                    ]));

                    //Assign Owner and Manager Roles
                    Auth::user()->attachRole("owner");
                    if ($request->contact_person) {
                        Auth::user()->attachRole("manager");
                    } else {
                        $user->attachRole("business");
                        $user->attachRole("manager");
                    }

                    return redirect(route("business"))->with("status", "Business Registered Successfully");
                }
            }, 1);
        } catch (Exception $e) {
            return $e;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function show(Organization $organization)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function edit(Organization $organization)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Organization $organization)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function destroy(Organization $organization)
    {
        //
    }
}
