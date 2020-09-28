<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = ["name"];
    
    public function choices() {
        return $this->hasMany(Choice::class);
    }
}
