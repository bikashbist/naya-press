<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('site_name')->nullable();
            $table->string('site_slogan')->nullable();
            $table->string('site_title')->nullable();
            $table->text('site_description')->nullable();
            $table->string('site_url')->nullable();
            $table->text('meta_keyword')->nullable();
            $table->string('logo')->nullable();
            $table->string('language')->default(1);
            $table->boolean('tracker_status')->default(0);
            $table->string('social_profile_fb')->nullable();
            $table->string('social_profile_twitter')->nullable();
            $table->string('social_profile_insta')->nullable();
            $table->string('social_profile_youtube')->nullable();
            $table->string('social_profile_linkedin')->nullable();
            $table->string('contact_title')->nullable();
            $table->string('contact_sub_title')->nullable();
            $table->string('contact_address_1')->nullable();
            $table->string('contact_address_2')->nullable();
            $table->string('contact_phone')->nullable();
            $table->string('contact_fax')->nullable();
            $table->string('contact_mobile')->nullable();
            $table->string('contact_email')->nullable();
            $table->string('contact_url')->nullable();
            $table->text('contact_map')->nullable();
            $table->string('about_title')->nullable();
            $table->string('about_sub_title')->nullable();
            $table->text('about_description')->nullable();
            $table->string('about_image')->nullable();
            $table->string('google_verification')->nullable();
            $table->string('google_tracking')->nullable();
            $table->boolean('maintenance_mode')->nullable();
            $table->string('maintenance_title')->nullable();
            $table->text('maintenance_msg')->nullable();
            $table->boolean('popup_mode')->nullable();
            $table->string('popup_title')->nullable();
            $table->text('popup_msg')->nullable();
            $table->string('popup_url')->nullable();
            $table->integer('no_of_visit')->nullable();
            $table->string('hero_banner')->nullable();
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
        Schema::dropIfExists('settings');
    }
};
