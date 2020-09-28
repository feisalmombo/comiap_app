<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    protected $fillable = ["name", "contact", "position"];
    
    public function addresses() {
        return $this->morphMany("App\Models\Address", "addresses");
    }
}
