<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAffiliatedProgramesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('affiliated_programs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('unique_id');
            $table->unsignedInteger('lang_id');
            $table->unsignedInteger('category_id');
            $table->string('affiliated_id');
            $table->string('type')->nullable();
            $table->string('title');
            $table->text('description');
            $table->text('file')->nullable();
            $table->boolean('status');
            $table->timestamps();
            $table->foreign('category_id')
                    ->references('id')->on('affiliated_program_categories')
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
        Schema::dropIfExists('affiliated_programes');
    }
}
