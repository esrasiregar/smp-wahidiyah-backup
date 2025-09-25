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
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();

            // relasi siswa
            $table->foreignId('student_id')->constrained('students')->onDelete('cascade');

            // relasi mata pelajaran/ekskul
            $table->foreignId('subject_id')->nullable()->constrained('subjects')->onDelete('set null');

            // guru yang mengisi absensi (penanggung jawab)
            $table->foreignId('teacher_id')->constrained('users')->onDelete('cascade');

            // kelas siswa (untuk query cepat, walau sudah ada di students)
            $table->enum('class', ['7', '8', '9']);

            // tanggal absensi
            $table->date('date');

            // status kehadiran
            $table->enum('status', ['hadir', 'izin', 'sakit', 'alpha'])->default('hadir');

            // catatan opsional
            $table->text('note')->nullable();

            $table->timestamps();

            // Unik: 1 siswa hanya boleh punya 1 absensi per mapel per hari
            $table->unique(['student_id', 'subject_id', 'date'], 'unique_student_subject_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendances');
    }
};
