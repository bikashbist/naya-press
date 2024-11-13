<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScholarshipDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scholarship_data', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fiscal_year')->nullable();
            $table->string('continent')->nullable();
            $table->string('country')->nullable();
            $table->integer('total_student')->nullable();
            $table->integer('girls_no')->nullable();
            $table->integer('boys_no')->nullable();
            $table->boolean('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('scholarship_data');
    }
}
