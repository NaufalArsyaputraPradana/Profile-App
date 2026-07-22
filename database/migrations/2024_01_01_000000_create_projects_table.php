<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique()->nullable();
            $table->text('description')->nullable();
            $table->string('image')->nullable(); // legacy field
            $table->string('thumbnail')->nullable();
            $table->json('gallery')->nullable(); // array of image paths
            $table->string('role')->nullable(); // e.g. Full Stack Developer
            $table->string('category')->nullable(); // e.g. Web App, E-Commerce, etc
            $table->json('technologies')->nullable();
            $table->json('features')->nullable(); // key features list
            $table->string('github_url')->nullable();
            $table->string('demo_url')->nullable();
            $table->string('url')->nullable(); // legacy
            $table->enum('status', ['active', 'development', 'archived'])->default('active');
            $table->integer('year')->nullable();
            $table->string('duration')->nullable(); // e.g. "3 months"
            $table->boolean('featured')->default(false);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
