<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGesturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gestures', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('parameters')->nullable();
            $table->string('action')->nullable();
            $table->unsignedInteger('gesture_type_id');
            $table->foreign('gesture_type_id')->references('id')->on('gesture_types');
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
        Schema::dropIfExists('gestures');
    }
}
