<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->string('number');
            $table->date('day');
            $table->unsignedBigInteger('seat_id');
            $table->unsignedBigInteger('station_from');
            $table->unsignedBigInteger('station_to');
            $table->unsignedBigInteger('userid');
            $table->foreign('seat_id')->references('id')->on('seats');
            $table->foreign('station_from')->references('id')->on('stations');
            $table->foreign('station_to')->references('id')->on('stations');
            $table->foreign('userid')->references('id')->on('users');
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
        Schema::dropIfExists('tickets');
    }
};
