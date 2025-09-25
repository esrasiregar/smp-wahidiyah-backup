<?php

namespace App\Filament\Pages;

use App\Models\Attendance;
use Filament\Pages\Page;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Actions\Action;
use App\Filament\Pages\AttendanceClass7;
use App\Filament\Pages\AttendanceClass8;
use App\Filament\Pages\AttendanceClass9;
use App\Exports\AttendanceExport;
use Maatwebsite\Excel\Facades\Excel;

class RekapAbsensiGuru extends Page implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $title = 'Rekap Absensi';
    protected static string $view = 'filament.pages.rekap-absensi-guru';

    // hanya role staff yg boleh akses
    public static function canAccess(): bool
    {
        return auth()->check() && auth()->user()->role === 'staff';
    }

public function table(Table $table): Table
{
    return $table
        ->query(
            Attendance::query()
                ->with(['teacher', 'subject'])
                ->where('teacher_id', auth()->id())
                ->selectRaw('MIN(id) as id, teacher_id, class, subject_id, date')
                ->groupBy('teacher_id', 'class', 'subject_id', 'date')
                ->orderByDesc('date')
        )
        ->columns([
            Tables\Columns\TextColumn::make('teacher.name')
                ->label('Guru'),

            Tables\Columns\TextColumn::make('class')
                ->label('Kelas'),

            Tables\Columns\TextColumn::make('subject.name')
                ->label('Mata Pelajaran'),

            Tables\Columns\TextColumn::make('date')
                ->label('Tanggal')
                ->date('d/m/Y'),
        ])

        ->actions([
            Action::make('edit')
                ->label('Edit')
                ->url(fn ($record) => match ($record->class) {
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
                })
                ->color('warning'),

            Action::make('download')
                ->label('Download Rekap')
                ->icon('heroicon-o-arrow-down-tray')
                ->action(function ($record) {
                    $fileName = "rekap_absensi_kelas{$record->class}_mapel{$record->subject_id}_{$record->date}.xlsx";

                    return Excel::download(
                        new AttendanceExport($record->class, $record->subject_id, $record->date),
                        $fileName
                    );
                })
                ->color('success'),
        ])
           
            ->actionsColumnLabel('Aksi')
            ->emptyStateHeading('Belum ada rekap absensi');
}
}
