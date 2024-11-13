<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->text('image');
            $table->timestamps();
        });
        Schema::create('sliders_name', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('slider_id');
            $table->unsignedInteger('lang_id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->timestamps();
            $table->foreign('slider_id')
                    ->references('id')->on('sliders')
                    ->onDelete('cascade');
            $table->foreign('lang_id')
                    ->references('id')->on('languages')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sliders_name');
        Schema::dropIfExists('sliders');
    }
}
