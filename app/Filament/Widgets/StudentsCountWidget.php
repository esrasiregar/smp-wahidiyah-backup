<?php

namespace App\Filament\Widgets;

use App\Models\Student;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class StudentsCountWidget extends BaseWidget
{
    protected static ?int $sort = 1; // urutan di dashboard

    
    protected function getCards(): array
    {
        return [
            Card::make('Kelas 7', Student::where('class', '7')->count())
                ->description('Total siswa kelas 7')
                ->color('success'),

            Card::make('Kelas 8', Student::where('class', '8')->count())
                ->description('Total siswa kelas 8')
                ->color('warning'),

            Card::make('Kelas 9', Student::where('class', '9')->count())
                ->description('Total siswa kelas 9')
                ->color('info'),
        ];
    }
}
