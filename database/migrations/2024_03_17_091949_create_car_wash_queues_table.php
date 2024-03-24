<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarWashQueuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_service_queues', function (Blueprint $table) {
            $table->id();
            $table->integer('user_car_id')->nullable();
            $table->integer('car_wash_service_id')->nullable();
            $table->enum('status', ['pending', 'approved', 'done', 'declined'])->default('pending');
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
        Schema::dropIfExists('car_service_queues');
    }
}
