<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGateitemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gateitems', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('gid')->unsigned()->nullable();
            $table->foreign('gid')->references('id')->on('gatepasses')->onDelete('cascade');
            $table->string('name')->nullable();
            $table->double('quantity')->nullable();
            $table->boolean('returnable')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('gateitems');
    }
}
