<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tests', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("user_id")->unsigned(); $table->foreign("user_id")->references("id")->on("users");
            $table->bigInteger("questionnaire_id")->unsigned(); $table->foreign("questionnaire_id")->references("id")->on("questionnaires");
            $table->bigInteger("on_behalf_of")->unsigned(); $table->foreign("on_behalf_of")->references("id")->on("users");
            $table->string("who_is")->default("myself");
            $table->string("results")->nullable();
            $table->string("lab_results")->nullable();
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
        Schema::dropIfExists('tests');
    }
}
