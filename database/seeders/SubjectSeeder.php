<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Subject;

class SubjectSeeder extends Seeder
{
    public function run(): void
    {
        $subjects = [
            ['code' => 'MTK', 'name' => 'Matematika'],
            ['code' => 'IPA', 'name' => 'Ilmu Pengetahuan Alam'],
            ['code' => 'IPS', 'name' => 'Ilmu Pengetahuan Sosial'],
            ['code' => 'BIND', 'name' => 'Bahasa Indonesia'],
            ['code' => 'BING', 'name' => 'Bahasa Inggris'],
            ['code' => 'PPKN', 'name' => 'Pendidikan Pancasila'],
            ['code' => 'PJOK', 'name' => 'Pendidikan Jasmani Olahraga dan Kesehatan'],
            ['code' => 'PAI', 'name' => 'Pendidikan Agama Islam'],
            ['code' => 'INF', 'name' => 'Informatika'],
            ['code' => 'MULOK-WAH', 'name' => 'Mulok Wahidiyah'],
            ['code' => 'SBD', 'name' => 'Seni Budaya'],
        ];

        foreach ($subjects as $subject) {
            Subject::updateOrCreate(
                ['code' => $subject['code']], // kunci unik
                ['name' => $subject['name']]
            );
        }
    }
}
