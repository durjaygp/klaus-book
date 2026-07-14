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
        Schema::table('homepage_settings', function (Blueprint $table) {
            $table->string('website_title')->nullable()->after('id');
            $table->string('favicon')->nullable()->after('website_title');
            $table->string('hero_bg_image')->nullable()->after('favicon');
            $table->string('about_profile_picture')->nullable()->after('hero_bg_image');
            $table->json('menu')->nullable()->after('about_profile_picture');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('homepage_settings', function (Blueprint $table) {
            $table->dropColumn(['website_title', 'favicon', 'hero_bg_image', 'about_profile_picture', 'menu']);
        });
    }
};
