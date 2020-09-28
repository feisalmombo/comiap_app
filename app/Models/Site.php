<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    protected $fillable = ["orgainization_id", "name", "is_testing_site", "operation_capacity", "days_of_operation", "hours_of_operation", "shifts_per_day", "testing_capacity", "time_spent_per_test", "tests_per_hour"];

    public function addresses() {
        return $this->morphMany("App\Models\Address", "addresses");
    }

}
