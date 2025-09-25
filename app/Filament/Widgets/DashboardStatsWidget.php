<?php

namespace App\Filament\Widgets;

use App\Models\News;
use App\Models\Activity;
use App\Models\Subject;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class DashboardStatsWidget extends BaseWidget
{
    protected static ?int $sort = 1;

    public static function canView(): bool
    {
        return auth()->check() && auth()->user()->role === 'admin';
    }

    protected function getCards(): array
    {
        return [

            Card::make('Jumlah Mata Pelajaran', Subject::count())
                ->description('Total mata pelajaran')
                ->color('danger'),

            Card::make('Jumlah Berita', News::count())
                ->description('Total berita dibuat')
                ->color('primary'),

            Card::make('Jumlah Kegiatan', Activity::count())
                ->description('Total kegiatan diupload')
                ->color('success'),
        ];
    }

    protected function getColumns(): int
    {
        return 3; // tampil 3 kolom sejajar
    }
}
