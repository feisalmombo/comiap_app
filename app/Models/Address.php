<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    //
    protected $fillable = ["type", "addressable_id", "addressable_type", "building_name", "building_number", "street_address", "second_address", "zipcode", "city", "state"];

    public function addresses() {
        return $this->morphTo();
    }
}
