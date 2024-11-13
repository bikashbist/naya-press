<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('lang_id');
            $table->string('service_unique_id');
            $table->string('icon')->nullable();
            $table->string('color')->nullable();
            $table->string('title');
            $table->string('description')->nullable();
            $table->string('link')->nullable();
            $table->integer('order')->nullable();
            $table->boolean('status');
            $table->timestamps();
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
        Schema::dropIfExists('services');
    }
}
