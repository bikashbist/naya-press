<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAffiliatedCollagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('affiliated_collages', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('lang_id');
            $table->string('affiliated_id');
            $table->string('unique_id');
            $table->string('type')->nullable();
            $table->string('campus_type');
            $table->string('title');
            $table->text('description');
            $table->string('level')->nullable();
            $table->text('file')->nullable();
            $table->text('url')->nullable();
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
        Schema::dropIfExists('affiliated_collages');
    }
}
