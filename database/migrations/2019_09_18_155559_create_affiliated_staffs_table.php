<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAffiliatedStaffsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('affiliated_staffs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('unique_id');
            $table->unsignedInteger('lang_id');
            $table->string('affiliated_id');
            $table->string('type')->nullable();
            $table->string('name');
            $table->string('designation')->nullable();
            $table->text('description')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->text('image')->nullable();
            $table->integer('level')->nullable();
            $table->integer('order')->nullable();
            $table->text('file')->nullable();
            $table->boolean('status');
            $table->boolean('featured')->nullable();
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
        Schema::dropIfExists('affiliated_staffs');
    }
}
