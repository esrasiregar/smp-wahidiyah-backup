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
        Schema::create('extracurricular_members', function (Blueprint $table) {
            $table->id();

            // Relasi siswa
            $table->foreignId('student_id')->constrained('students')->onDelete('cascade');

            // Relasi ke subject (yang berupa ekskul)
            $table->foreignId('subject_id')->constrained('subjects')->onDelete('cascade');

            $table->timestamps();

            // Unik: 1 siswa hanya bisa terdaftar sekali di ekskul yang sama
            $table->unique(['student_id', 'subject_id'], 'unique_extracurricular_member');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('extracurricular_members');
    }
};
