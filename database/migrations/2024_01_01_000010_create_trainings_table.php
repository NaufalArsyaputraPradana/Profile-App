<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('trainings', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nama pelatihan
            $table->string('organizer'); // Penyelenggara
            $table->string('category')->nullable(); // workshop, bootcamp, online-course, webinar
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('duration')->nullable(); // e.g. "3 bulan", "2 hari"
            $table->string('location')->nullable(); // Online / Offline / Kota
            $table->text('description')->nullable();
            $table->json('topics')->nullable(); // list of topics covered
            $table->string('certificate_image')->nullable();
            $table->string('badge_image')->nullable();
            $table->string('cover_image')->nullable();
            $table->string('credential_url')->nullable();
            $table->boolean('featured')->default(false);
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('trainings');
    }
};
