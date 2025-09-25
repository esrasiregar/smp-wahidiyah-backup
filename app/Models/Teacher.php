<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = ['name', 'position', 'photo_path'];

    public function getPhotoUrlAttribute(): string
    {
        return $this->photo_path
            ? asset('storage/' . $this->photo_path)
            : asset('images/default-user.jpg');
    }
}
