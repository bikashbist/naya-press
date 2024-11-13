<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAffiliatedBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('affiliated_banners', function (Blueprint $table) {
            $table->increments('id');
            $table->string('unique_id');
            $table->unsignedInteger('lang_id');
            $table->unsignedInteger('user_id')->nullable();
            $table->string('type')->nullable();
            $table->string('affiliated_id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->text('image');
            $table->timestamps();
            $table->foreign('user_id')
                        ->references('id')->on('users')
                        ->onDelete('cascade');
            $table->foreign('lang_id')
                        ->references('id')->on('languages')
                        ->onDelete('cascade');
            // $table->foreign('affiliated_id')
            //             ->references('unique_id')->on('affiliated_pages')
            //             ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('affiliated_banners');
    }
}
