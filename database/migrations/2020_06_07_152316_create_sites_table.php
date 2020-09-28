<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sites', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("organization_id")->unsigned(); $table->foreign("organization_id")->references("id")->on("organizations")->onDelete("cascade");
            $table->string("name");
            $table->boolean("is_testing_site")->default(true);
            $table->string("operation_capacity")->nullable();
            $table->string("days_of_operation")->nullable();
            $table->string("hours_of_operation")->nullable();
            $table->string("shifts_per_day")->nullable();
            $table->string("testing_capacity")->nullable();
            $table->integer("time_spent_per_test")->nullable();
            $table->integer("tests_per_hour")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sites');
    }
}
