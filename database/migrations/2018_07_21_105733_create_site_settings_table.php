<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSiteSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('keywords');
            $table->string('author');
            $table->longText('description');
            $table->string('site_name');
            $table->string('logo');
            $table->string('favicon');
            $table->string('video_link');
            $table->longText('about_company');
            $table->longText('about_company_ar');
            $table->string('fb_link');
            $table->string('twitter_link');
            $table->string('google_plus');
            $table->string('youtube_link');
            $table->string('linkedin_link');
            $table->string('instagram_link');
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
        Schema::dropIfExists('site_settings');
    }
}
