<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class News extends Model
{
    use HasFactory;

    protected $fillable = ['title','slug','cover_path','content','published_at'];

    protected $casts = [
        'published_at' => 'date',
    ];

    protected static function booted(): void
    {
        static::creating(function (News $n) {
            if (blank($n->slug)) {
                $n->slug = Str::slug(Str::limit($n->title, 60, ''));
            }
        });
    }
}