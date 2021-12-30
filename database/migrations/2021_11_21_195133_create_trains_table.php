<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trains', function (Blueprint $table) {
            $table->id();
            $table->string('number');
            $table->string('name');
            $table->integer('first_class_seats');
            $table->integer('economy_seats');
            $table->time('departure');
            $table->time('arrival');
            $table->date('date');
            $table->bigInteger('source_id')->unsigned();
            $table->bigInteger('destination_id')->unsigned();
            $table->timestamps();
            $table->foreign('source_id')->references('id')->on('destinations')->onDelete('cascade');
            $table->foreign('destination_id')->references('id')->on('destinations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trains');
    }
}
