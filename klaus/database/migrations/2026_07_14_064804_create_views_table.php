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
        Schema::create('views', function (Blueprint $table) {
            $table->id();
            $table->ipAddress('ip_address')->nullable();
            $table->text('user_agent')->nullable();
            $table->string('type')->nullable();   // product, blog, service
            $table->unsignedBigInteger('type_id')->nullable();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            
            // Location detection fields
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            
            $table->unsignedInteger('views')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('views');
    }
};
