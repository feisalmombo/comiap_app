<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Choice extends Model
{
    protected $fillable = ["question_id", "group_id", "name", "score"];

    public function group() {
        return $this->belongsTo(Group::class);
    }
}
