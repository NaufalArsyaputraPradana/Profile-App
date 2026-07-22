<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('certificates', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nama sertifikat
            $table->enum('category', ['seminar', 'workshop', 'certification', 'training', 'achievement', 'webinar', 'competition'])->default('seminar');
            $table->string('issuer')->nullable(); // Penyelenggara
            $table->date('date')->nullable(); // Tanggal sertifikat
            $table->string('certificate_number')->nullable();
            $table->date('expired_date')->nullable();
            $table->boolean('no_expiry')->default(true);
            $table->text('description')->nullable();
            $table->string('thumbnail')->nullable(); // preview image
            $table->string('file_pdf')->nullable(); // PDF file path
            $table->string('image')->nullable(); // full certificate image
            $table->boolean('featured')->default(false);
            $table->enum('status', ['active', 'expired', 'pending'])->default('active');
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('certificates');
    }
};
