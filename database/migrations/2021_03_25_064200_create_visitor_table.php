<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visitors', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('staff_id')->unsigned()->nullable();
                $table->foreign('staff_id')->references('id')->on('staff')->onDelete('restrict');
                $table->string('name');
                $table->string('agency');
                $table->string('cid');
                $table->string('address');
                $table->string('contact');
                $table->string('status')->default('check-in');
                $table->dateTime('arrivaltime');
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
        Schema::dropIfExists('visitors');
    }
}
