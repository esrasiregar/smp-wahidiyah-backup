<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'nis',
        'name',
        'gender',
        'class',
    ];

    /* 🔹 Relasi ke absensi */
    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }

    /* 🔹 Relasi ke ekstrakurikuler */
    public function extracurricularMemberships()
    {
        return $this->hasMany(ExtracurricularMember::class);
    }
}
