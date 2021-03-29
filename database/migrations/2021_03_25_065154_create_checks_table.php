<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChecksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checks', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('checkintime');
            $table->dateTime('checkouttime');
            $table->integer('staff_id')->unsigned()->nullable();
            $table->foreign('staff_id')->references('id')->on('staffs')->onDelete('restrict');
            $table->integer('visitor_id')->unsigned()->nullable();
            $table->foreign('visitor_id')->references('id')->on('visitors')->onDelete('restrict');
            $table->integer('car_id')->unsigned()->nullable();
            $table->foreign('car_id')->references('id')->on('cars')->onDelete('restrict');
            $table->integer('role_id')->unsigned()->nullable();
            $table->foreign('role_id')->references('id')->on('staffs')->onDelete('restrict');
            $table->string('contact');
            $table->string('status')->default('check-in');
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
        Schema::dropIfExists('checks');
    }
}
