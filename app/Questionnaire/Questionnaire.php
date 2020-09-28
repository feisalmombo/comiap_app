<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questionnaire extends Model
{
    protected $fillable = ['name'];

    public function questions() {
        return $this->belongsToMany(Question::class,"questionnaires_has_questions");
    }
}
