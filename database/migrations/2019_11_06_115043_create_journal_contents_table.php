<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJournalContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('journal_contents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('lang_id');
            $table->string('unique_id');
            $table->string('title');
            $table->string('slug');
            $table->text('thumbnail')->nullable();
            $table->text('content');
            $table->text('excerpt')->nullable();
            $table->string('published')->nullable();
            $table->string('current_issue')->nullable();
            $table->integer('no_of_pages')->nullable();
            $table->boolean('status');
            $table->boolean('featured')->nullable();
            $table->string('tag')->nullable();
            $table->string('author')->nullable();
            $table->string('url')->nullable();
            $table->string('order')->nullable();
            $table->unsignedInteger('visit_no')->default(0);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('category_id')
                    ->references('id')->on('journal_categories')
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
        Schema::dropIfExists('journal_contents');
    }
}
