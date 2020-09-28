<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionnairesHasQuestions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questionnaires_has_questions', function (Blueprint $table) {
            $table->bigInteger("questionnaire_id")->unsigned(); $table->foreign("questionnaire_id")->references("id")->on("questionnaires");
            $table->bigInteger("question_id")->unsigned(); $table->foreign("question_id")->references("id")->on("questions");
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
        Schema::dropIfExists('questionnaires_has_questions');
    }
}
