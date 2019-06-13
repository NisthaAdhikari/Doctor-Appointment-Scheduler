<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorScheduleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctor_schedule', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('doctorId')->unsigned();
            $table->foreign('doctorId')->references('id')->on('doctor');

            $table->integer('scheduleId')->unsigned();
            $table->foreign('scheduleId')->references('id')->on('schedule');

            $table->boolean('status')->default('0');
            $table->boolean('softDelete')->default('0');

            $table->string('date');
            $table->string('day');
            $table->boolean('isAvailable');
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
        Schema::dropIfExists('doctor_schedule');
    }
}
