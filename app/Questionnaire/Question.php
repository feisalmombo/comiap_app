<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ["name", "multiple_choices", "multiple_choices_per_group"];

    public function questionnaires() {
        return $this->belongsToMany(Questionnaire::class, "questionnaires_has_questions");
    }

    public function choices() {
        return $this->hasMany(Choice::class);
    }
}