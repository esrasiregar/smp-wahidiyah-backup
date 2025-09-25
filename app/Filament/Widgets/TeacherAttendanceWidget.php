<?php

namespace App\Filament\Widgets;

use App\Models\Attendance;
use Filament\Widgets\TableWidget as BaseWidget;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;

class TeacherAttendanceWidget extends BaseWidget
{
    protected int|string|array $columnSpan = 'full'; // lebar full 1 row

    protected static ?int $sort = 4; // tampil setelah widget lain

    public static function canView(): bool
    {
        return auth()->check() && auth()->user()->role === 'admin';
    }

protected function getTableQuery(): Builder
{
    return Attendance::query()
        ->with(['teacher', 'subject'])
        ->selectRaw('MIN(id) as id, teacher_id, class, subject_id, date')
        ->groupBy('teacher_id', 'class', 'subject_id', 'date')
        ->orderByDesc('date');
}

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('teacher.name')
                ->label('Guru')
                ->sortable()
                ->searchable(),

            Tables\Columns\TextColumn::make('class')
                ->label('Kelas')
                ->sortable(),

            Tables\Columns\TextColumn::make('subject.name')
                ->label('Mata Pelajaran')
                ->sortable(),

            Tables\Columns\TextColumn::make('date')
                ->label('Tanggal')
                ->date('d/m/Y')
                ->sortable(),
        ];
    }

    protected function getTableFilters(): array
    {
        return [
            Tables\Filters\Filter::make('tanggal')
                ->form([
                    \Filament\Forms\Components\DatePicker::make('date')
                        ->label('Pilih Tanggal'),
                ])
                ->query(function (Builder $query, array $data): Builder {
                    return isset($data['date'])
                        ? $query->whereDate('date', $data['date'])
                        : $query;
                }),
        ];
    }
}
