<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('choices', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("question_id")->unsigned(); $table->foreign("question_id")->references("id")->on("questions")->onDelete("cascade");
            $table->bigInteger("group_id")->unsigned()->nullable(); $table->foreign("group_id")->references("id")->on("groups");
            $table->string("name");
            $table->integer("score")->nullable();
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
        Schema::dropIfExists('choices');
    }
}
