<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('streetAddress')->nullable();
            $table->string('city')->nullable();
            $table->string('dob')->nullable();
            $table->string('area')->nullable();
            $table->string('email');
            $table->string('mobile');
            $table->string('landLine')->nullable();
            $table->string('gender')->nullable();
            $table->string('patientPassword');
            $table->string('image')->nullable();
            $table->boolean('status')->default('0');
            $table->boolean('softDelete')->default('0');
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
        Schema::dropIfExists('patient');
    }
}
