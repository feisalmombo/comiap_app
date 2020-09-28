<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sudo = Role::create(["name" => "sudo"]);
        $patient = Role::create(["name" => "patient"]);
        $business = Role::create(['name' => "business"]);

        $mark = factory(User::class)->create([
            "email" => "markmayalla@gmail.com"
        ]);

        $mark->attachRoles([$sudo, $patient, $business]);


    }
}
