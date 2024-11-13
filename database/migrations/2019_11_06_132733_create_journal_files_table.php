<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJournalFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('journal_files', function (Blueprint $table) {
            $table->increments('id');
            $table->string('unique_id');
            $table->string('title');
            $table->text('file');
            $table->string('type')->nullable();
            $table->string('size')->nullable();
            $table->unsignedInteger('order')->nullable();
            $table->integer('download_count')->default(0);
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
        Schema::dropIfExists('journal_files');
    }
}
