<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvincePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('province_posts', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->unsignedBigInteger('user_id');  // Change to unsignedBigInteger
            $table->unsignedBigInteger('province_id')->nullable(); 
            $table->unsignedBigInteger('district_id')->nullable();
            $table->unsignedBigInteger('lang_id');  // Change to unsignedBigInteger
            $table->string('post_unique_id');
            $table->string('title');
            $table->string('slug');
            $table->text('thumbnail')->nullable();
            $table->text('content');
            $table->boolean('status');
            $table->unsignedInteger('visit_no')->default(0);
            $table->timestamps();
            $table->softDeletes();
            // Foreign key constraints
            $table->foreign('province_id')
                  ->references('id')->on('provinces')
                  ->onDelete('cascade');
            $table->foreign('district_id')
                  ->references('id')->on('districts')
                  ->onDelete('cascade');
            $table->foreign('user_id')
                  ->references('id')->on('users')
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
        Schema::dropIfExists('province_posts');
    }
}
