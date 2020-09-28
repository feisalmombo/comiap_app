<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserHasRelations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_has_relations', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('relation_id'); $table->foreign('relation_id')->references('id')->on('relations');
            $table->bigInteger('user_id',false,true); $table->foreign('user_id')->references('id')->on('users');
            $table->bigInteger('member_id',false,true); $table->foreign('member_id')->references('id')->on('users');
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
        Schema::dropIfExists('user_has_relations');
    }
}
