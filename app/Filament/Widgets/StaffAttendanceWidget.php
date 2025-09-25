<?php

namespace App\Filament\Widgets;

use App\Models\Attendance;
use App\Filament\Pages\AttendanceClass7;
use App\Filament\Pages\AttendanceClass8;
use App\Filament\Pages\AttendanceClass9;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Filament\Tables\Actions\Action;

class StaffAttendanceWidget extends BaseWidget
{
    protected int|string|array $columnSpan = 'full';
    protected static ?int $sort = 4;

public static function canView(): bool
    {
        return auth()->check() && auth()->user()->role === 'staff';
    }
    public function table(Table $table): Table
    {
        return $table
            ->query(
                Attendance::query()
                    ->selectRaw('MIN(id) as id, teacher_id, class, subject_id, date')
                    ->where('teacher_id', auth()->id())
                    ->groupBy('teacher_id', 'class', 'subject_id', 'date')
                    ->orderBy('date', 'desc')
                    ->whereDate('date', today())
            )
            ->columns([
                Tables\Columns\TextColumn::make('teacher.name')
                    ->label('Guru')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('class')
                    ->label('Kelas')
                    ->sortable(),

                Tables\Columns\TextColumn::make('subject.name')
                    ->label('Mata Pelajaran')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('date')
                    ->label('Tanggal')
                    ->date('d/m/Y')
                    ->sortable(),
            ])
            ->actions([
                Action::make('edit')
                    ->label('Edit')
                    ->url(function ($record) {
                        // pilih page sesuai kelas
                        return match ($record->class) {
                            '7' => AttendanceClass7::getUrl([
                                'subject_id' => $record->subject_id,
                                'date' => $record->date,
                            ]),
                            '8' => AttendanceClass8::getUrl([
                                'subject_id' => $record->subject_id,
                                'date' => $record->date,
                            ]),
                            '9' => AttendanceClass9::getUrl([
                                'subject_id' => $record->subject_id,
                                'date' => $record->date,
                            ]),
                            default => null,
                        };
                    })
                    ->button()
                    ->color('primary'),
            ]);
    }
}
