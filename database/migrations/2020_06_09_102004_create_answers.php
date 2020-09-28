<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnswers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answers', function (Blueprint $table) {
            $table->bigInteger("test_id")->unsigned(); $table->foreign("test_id")->references("id")->on("tests");
            $table->bigInteger("question_id")->unsigned(); $table->foreign("question_id")->references("id")->on("questions");
            $table->bigInteger("choice_id")->unsigned(); $table->foreign("choice_id")->references("id")->on("choices");
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
        Schema::dropIfExists('answers');
    }
}
