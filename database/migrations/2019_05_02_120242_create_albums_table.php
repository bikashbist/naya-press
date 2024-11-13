<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlbumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('albums', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->unsignedInteger('order')->nullable();
            $table->text('cover_image')->nullable();
            $table->boolean('status');
            $table->timestamps();
        });
        Schema::create('albums_name', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('lang_id');
            $table->unsignedInteger('album_id');
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
            $table->foreign('album_id')
                    ->references('id')->on('albums')
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
        Schema::dropIfExists('albums_name');
        Schema::dropIfExists('albums');
    }
}