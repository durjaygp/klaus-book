<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('homepage_settings', function (Blueprint $table) {
            $table->id();
            $table->string('hero_badge_text')->nullable();
            $table->string('hero_title')->nullable();
            $table->string('hero_highlight')->nullable();
            $table->text('hero_description')->nullable();
            $table->json('hero_bullets')->nullable();
            
            $table->string('video_section_label')->nullable();
            $table->string('video_section_title')->nullable();
            $table->text('video_section_description')->nullable();
            $table->string('video_embed_url')->nullable();
            
            $table->string('social_facebook_url')->nullable();
            $table->string('social_instagram_url')->nullable();
            $table->string('social_twitter_url')->nullable();
            
            $table->string('about_section_label')->nullable();
            $table->string('about_section_title')->nullable();
            $table->text('about_section_description')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('homepage_settings');
    }
};
