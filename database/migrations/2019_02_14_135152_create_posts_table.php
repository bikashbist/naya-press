<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('category_id')->nullable();
            $table->unsignedInteger('lang_id');
            $table->string('post_unique_id');
            $table->string('title');
            $table->string('slug');
            $table->text('thumbnail')->nullable();
            $table->text('content');
            $table->text('excerpt')->nullable();
            $table->boolean('status');
            $table->boolean('featured')->nullable();
            $table->string('tag')->nullable();
            $table->string('author')->nullable();
            $table->string('url')->nullable();
            $table->string('order')->nullable();
            $table->unsignedInteger('visit_no')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('posts', function($table){
            $table->foreign('category_id')
                    ->references('id')->on('categories')
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
        Schema::dropIfExists('posts');
    }
}
