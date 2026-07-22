<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('educations', function (Blueprint $table) {
            $table->id();
            $table->string('institution_name');
            $table->string('institution_logo')->nullable();
            $table->string('degree')->nullable(); // S1, SMA, SMK, etc
            $table->string('field_of_study')->nullable(); // Teknik Informatika, Multimedia
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->boolean('is_current')->default(false);
            $table->decimal('gpa', 3, 2)->nullable();
            $table->string('gpa_scale', 10)->nullable()->default('4.00');
            $table->string('location')->nullable();
            $table->text('description')->nullable();
            $table->json('achievements')->nullable();
            $table->json('activities')->nullable();
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('educations');
    }
};
