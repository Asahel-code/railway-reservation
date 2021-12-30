<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('ticket_type');
            $table->bigInteger('passengerAge_id')->unsigned()->nullable();
            $table->bigInteger('seat_id')->unsigned()->nullable();
            $table->bigInteger('container_id')->unsigned()->nullable();
            $table->bigInteger('train_id')->unsigned();
            $table->timestamps();
            $table->foreign('passengerAge_id')->references('id')->on('passenger_ages')->onDelete('cascade');
            $table->foreign('seat_id')->references('id')->on('seat_types')->onDelete('cascade');
            $table->foreign('container_id')->references('id')->on('container_sizes')->onDelete('cascade');
            $table->foreign('train_id')->references('id')->on('trains')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
