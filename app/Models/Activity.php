<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'cover_path',
        'content',
        'event_date',
    ];

    protected $casts = [
        'event_date' => 'date',
    ];

    // Auto-generate slug jika kosong saat membuat record
    protected static function booted(): void
    {
        static::creating(function (Activity $activity) {
            if (empty($activity->slug)) {
                $activity->slug = Str::slug(Str::limit($activity->title, 60, ''));
            }
        });

        // (Opsional) update slug saat title berubah di update
        static::updating(function (Activity $activity) {
            if (empty($activity->slug)) {
                $activity->slug = Str::slug(Str::limit($activity->title, 60, ''));
            }
        });
    }

    // Helper: Dapatkan URL detail kegiatan (untuk di Blade, dsb)
    public function getUrlAttribute(): string
    {
        return route('activities.show', $this->slug);
    }
}
