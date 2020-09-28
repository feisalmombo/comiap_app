<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OrganizationController extends TestCase
{
    use RefreshDatabase;
    
    /** @test */
    public function organization_store_works()
    {   
        $formData = [
            "name" => "Massana Hospital",
            "physical_address" => "Mbezi Beach",
            "contact_person" => 1,
            "position" => "owner",
            "same_as_physical" => 1,
        ];

        $response = $this->withoutMiddleware()->post(route("organizations.store", $formData));
        $response->dumpSession();
        $response->assertStatus(200);
    }
}
