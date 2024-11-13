<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBranchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branches', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->unsignedInteger('parent_id')->nullable();
            $table->integer('order')->nullable();
            $table->boolean('status');
            $table->timestamps();
            $table->foreign('parent_id')
                    ->references('id')->on('branches')
                    ->onDelete('cascade');
        });

        Schema::create('branches_name', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('lang_id');
            $table->unsignedInteger('branch_id');
            $table->string('name');
            $table->timestamps();
            $table->foreign('lang_id')
                    ->references('id')->on('languages')
                    ->onDelete('cascade');
            $table->foreign('branch_id')
                    ->references('id')->on('branches')
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
        Schema::dropIfExists('branches');
    }
}
