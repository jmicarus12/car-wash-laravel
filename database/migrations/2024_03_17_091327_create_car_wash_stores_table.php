<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarWashStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_wash_stores', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('owner_id');
            $table->double('latitude');
            $table->double('longitude');
            $table->string('store_name');
            $table->string('image')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('car_wash_stores');
    }
}
