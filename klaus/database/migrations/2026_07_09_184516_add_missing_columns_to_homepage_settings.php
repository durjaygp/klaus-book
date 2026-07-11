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
            $table->string('hero_button_text')->nullable();
            $table->string('hero_coffee_url')->nullable();
            $table->string('social_linkedin_url')->nullable();
            $table->json('about_points')->nullable();
            $table->string('author_section_label')->nullable();
            $table->string('author_section_title')->nullable();
            $table->text('author_section_desc_1')->nullable();
            $table->text('author_section_desc_2')->nullable();
            $table->text('author_section_desc_3')->nullable();
            $table->text('author_quote')->nullable();
            $table->string('footer_copyright_text')->nullable();
            $table->text('footer_description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('homepage_settings', function (Blueprint $table) {
            $table->dropColumn([
                'hero_button_text',
                'hero_coffee_url',
                'social_linkedin_url',
                'about_points',
                'author_section_label',
                'author_section_title',
                'author_section_desc_1',
                'author_section_desc_2',
                'author_section_desc_3',
                'author_quote',
                'footer_copyright_text',
                'footer_description',
            ]);
        });
    }
};
