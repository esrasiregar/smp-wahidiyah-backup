<?php
namespace App\Http\Controllers;

use App\Models\User;

class ProfilController extends Controller
{
    public function index()
    {
        // ambil hanya guru/staff yang ditampilkan di website
        $teachers = User::whereIn('role', ['admin', 'staff'])
                        ->where('show_on_website', true)
                        ->get();

        return view('pages.profil', compact('teachers'));
    }
}
