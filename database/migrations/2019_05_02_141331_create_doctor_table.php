<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctor', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('clinic')->nullable();
            $table->string('clinicAddress')->nullable();

            $table->string('email');
            $table->string('mobile');
            $table->string('doctorPassword');
            $table->string('image')->nullable();
            $table->string('specialization')->nullable();
            $table->string('experience')->nullable();

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
        Schema::dropIfExists('doctor');
    }
}
