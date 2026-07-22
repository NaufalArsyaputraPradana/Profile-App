<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('organizations', function (Blueprint $table) {
            $table->id();
            $table->string('organization_name');
            $table->string('organization_logo')->nullable();
            $table->string('division')->nullable(); // e.g. Kementerian Riset dan Teknologi
            $table->string('role'); // position/role in the org
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->boolean('is_current')->default(false);
            $table->string('institution')->nullable(); // e.g. BEM KM UDINUS, OSIS SMK N 3 Jepara
            $table->text('description')->nullable();
            $table->json('achievements')->nullable();
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('organizations');
    }
};
