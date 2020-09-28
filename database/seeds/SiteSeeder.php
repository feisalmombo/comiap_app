<?php

use App\Models\Address;
use App\Models\Site;
use Illuminate\Database\Seeder;

class SiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Site::class, 200)->create()->each(function ($site) {
            $site->addresses()->save(factory(Address::class)->make());
        });
    }
}
