<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->enum("type", ["physical","billing"]);
            $table->bigInteger("addresses_id")->unsigned()->nullable();
            $table->string("addresses_type")->nullable();
            $table->string("building_name", 25)->nullable();
            $table->string("building_number", 10)->nullable();
            $table->string("street_address")->nullable();
            $table->string("second_address")->nullable();
            $table->string("zipcode")->nullable();
            $table->string("city")->nullable();
            $table->string("state")->nullable();
            $table->float("longitude")->nullable();
            $table->float("latitude")->nullable();
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
        Schema::dropIfExists('addresses');
    }
}
