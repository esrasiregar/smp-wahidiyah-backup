<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;

class StudentSeeder extends Seeder
{
    public function run(): void
    {
        $students = [
            // Kelas 7
            ['name' => 'Ahmad Jodhy Setiawan', 'class' => '7'],
            ['name' => 'Aldi Athaya Saputra', 'class' => '7'],
            ['name' => 'Ameyliana Zhevara Maesya', 'class' => '7'],
            ['name' => 'Barokah Wahidiyah', 'class' => '7'],
            ['name' => 'Fernida Adelia', 'class' => '7'],
            ['name' => 'Jazilatur Rohmah', 'class' => '7'],
            ['name' => 'Khansa Aqilah Dhia Syarafana', 'class' => '7'],
            ['name' => 'Naena Setiawan', 'class' => '7'],
            ['name' => 'Ria Melati', 'class' => '7'],
            ['name' => 'Titah Latifah Ramadika', 'class' => '7'],
            ['name' => 'Vivian Felicia Rahma', 'class' => '7'],

            // Kelas 8
            ['name' => 'Ahmad Irfan Nawawi', 'class' => '8'],
            ['name' => 'Aida Nuril Izza', 'class' => '8'],
            ['name' => 'Aini Hairunisa', 'class' => '8'],
            ['name' => 'Akifa Askana Saputri', 'class' => '8'],
            ['name' => 'Alifia Mutiara Wahidiyah', 'class' => '8'],
            ['name' => 'Ardika Kamaswari Sahandika', 'class' => '8'],
            ['name' => 'Bagas Triyanto Witjaksono', 'class' => '8'],
            ['name' => 'Fauziah Ikhtisah Aryianti', 'class' => '8'],
            ['name' => 'Galuh Wahyu Pratama', 'class' => '8'],
            ['name' => 'Jaffar Shidiq', 'class' => '8'],
            ['name' => 'Kamila Achmad', 'class' => '8'],
            ['name' => 'Muhammad Alfin Pradita', 'class' => '8'],
            ['name' => 'Muhammad Amiruddin Annaza', 'class' => '8'],
            ['name' => 'Nur Fauziah Az Zahra', 'class' => '8'],
            ['name' => 'Rheysa Dinda Citra Dewi', 'class' => '8'],
            ['name' => 'Tiara Khumaera', 'class' => '8'],
            ['name' => 'Victo Dyandra Widaka', 'class' => '8'],
            ['name' => 'Zahrotul Maulida', 'class' => '8'],

            // Kelas 9
            ['name' => 'Ahmad Arifin', 'class' => '9'],
            ['name' => 'Ainun Barqi\'ah', 'class' => '9'],
            ['name' => 'Ardhiq Wahiduzaman', 'class' => '9'],
            ['name' => 'Chalista Galih Elysia', 'class' => '9'],
            ['name' => 'Galang Rizky Borneo', 'class' => '9'],
            ['name' => 'Hasanuddin Latif', 'class' => '9'],
            ['name' => 'Muhamad Faisal Nur Adafa', 'class' => '9'],
            ['name' => 'Noval Affana Subanri', 'class' => '9'],
            ['name' => 'Nursyaqilah', 'class' => '9'],
            ['name' => 'Reyhan Zikri Radika', 'class' => '9'],
            ['name' => 'Siti Aisyah', 'class' => '9'],
            ['name' => 'Syafira Nur Aliyah', 'class' => '9'],
            ['name' => 'Ziggy Zaumar Saputra', 'class' => '9'],
            ['name' => 'Hafidza Nuzuli Khikmah', 'class' => '9'],
        ];

        foreach ($students as $student) {
            Student::create($student);
        }
    }
}
