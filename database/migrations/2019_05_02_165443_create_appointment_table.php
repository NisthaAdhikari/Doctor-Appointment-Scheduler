<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppointmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointment', function (Blueprint $table) {
            $table->increments('id');
            $table->string('appointmentNo');
            $table->string('patientName');
            $table->string('mobile');
            $table->integer('doctorId')->unsigned();
            $table->foreign('doctorId')->references('id')->on('doctor');
            $table->string('appointmentDate');
            $table->string('appointmentDay');
            $table->string('appointmentTime');
            $table->string('appointmentMade');
            $table->string('code')->nullable();
            $table->string('appointmentStatus')->default('0');
            $table->string('diseaseDescription')->nullable();
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
        Schema::dropIfExists('appointment');
    }
}
