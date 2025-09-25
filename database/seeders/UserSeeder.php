<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            // === ADMIN (1-4) ===
            [
                'name' => 'Muhammad Suyuti, SE',
                'email' => 'muhammad.suyuti@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'admin',
                'position' => 'Kepala Sekolah',
            ],
            [
                'name' => 'Lutfi Ashari S.Pd',
                'email' => 'lutfi.ashari@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'admin',
                'position' => 'Waka Kurikulum',
            ],
            [
                'name' => 'Emi Hayati Lubis, Amd',
                'email' => 'emi.hayati@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'admin',
                'position' => 'Ka. Tata Usaha & Bendahara Sekolah & Guru Informatika',
            ],
            [
                'name' => 'Liamatul Azizah, S.AB',
                'email' => 'liamatul.azizah@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'admin',
                'position' => 'Anggota Tata Usaha & Operator Sekolah',
            ],

            // === STAFF / GURU (5-17) ===
            [
                'name' => 'Desy Novitalinda S.Pd',
                'email' => 'desy.novitalinda@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'staff',
                'position' => 'Guru Matematika',
            ],
            [
                'name' => 'Riana Savitri S.Pd',
                'email' => 'riana.savitri@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'staff',
                'position' => 'Guru Ilmu Pengetahuan Sosial',
            ],
            [
                'name' => 'Nur Aenah S. Pd',
                'email' => 'nur.aenah@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'staff',
                'position' => 'Guru Bahasa Inggris kelas 9 & Ekskul English Club',
            ],
            [
                'name' => 'Miftakhul Jannah S.Pd',
                'email' => 'miftakhul.jannah@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'staff',
                'position' => 'Guru Bahasa Inggris kelas 7 dan 8',
            ],
            [
                'name' => 'Rabiatul Adwiyah M.Pd',
                'email' => 'rabiatul.adwiyah@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'staff',
                'position' => 'Guru Bahasa Indonesia',
            ],
            [
                'name' => 'Ien Nadriyhah S.Pd',
                'email' => 'ien.nadriyhah@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'staff',
                'position' => 'Guru Pendidikan Pancasila',
            ],
            [
                'name' => 'Defry Putra Mandarisman S.Pd',
                'email' => 'defry.putra@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'staff',
                'position' => 'Guru Pendidikan Jasmani Olahraga dan Kesehatan',
            ],
            [
                'name' => 'Dwi Haryono M.H',
                'email' => 'dwi.haryono@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'staff',
                'position' => 'Guru Pendidikan Agama Islam',
            ],
            [
                'name' => 'Ustadz Achmad Chairul Anwar',
                'email' => 'achmad.chairul@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'staff',
                'position' => 'Guru Mulok Kewahdiyahan & Ekskul Arab Club',
            ],
            [
                'name' => 'Wahyu Susmita Rini S.Kom',
                'email' => 'wahyu.susmita@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'staff',
                'position' => 'Guru Ekskul Teknologi Informasi & Komunikasi (Komputer)',
            ],
            [
                'name' => 'Bima Septian S.Pd',
                'email' => 'bima.septian@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'staff',
                'position' => 'Guru Ekskul Pramuka',
            ],
            [
                'name' => 'Julio Ronaldino',
                'email' => 'julio.ronaldino@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'staff',
                'position' => 'Guru Ekskul Habsyi',
            ],
        ];

        foreach ($users as $user) {
            User::updateOrCreate(
                ['email' => $user['email']],
                [
                    'name' => $user['name'],
                    'password' => $user['password'],
                    'role' => $user['role'],
                    'position' => $user['position'],
                    'photo_path' => null,
                    'show_on_website' => true,
                ]
            );
        }
    }
}
