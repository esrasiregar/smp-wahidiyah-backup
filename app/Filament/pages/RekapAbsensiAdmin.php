<?php

namespace App\Filament\Pages;

use App\Models\Attendance;
use Filament\Pages\Page;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Actions\Action;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AttendanceExport;

class RekapAbsensiAdmin extends Page implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-check';
    protected static ?string $navigationGroup = 'Absensi';
    protected static ?string $title = 'Rekap Absensi Semua';
    protected static string $view = 'filament.pages.rekap-absensi-admin';

    public static function canAccess(): bool
    {
        return auth()->check() && auth()->user()->role === 'admin';
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Attendance::query()
                    ->with(['teacher', 'subject'])
                    ->selectRaw('MIN(id) as id, teacher_id, class, subject_id, date')
                    ->groupBy('teacher_id', 'class', 'subject_id', 'date')
                    ->orderByDesc('date')
            )
            ->columns([
                Tables\Columns\TextColumn::make('teacher.name')->label('Guru'),
                Tables\Columns\TextColumn::make('class')->label('Kelas'),
                Tables\Columns\TextColumn::make('subject.name')->label('Mata Pelajaran'),
                Tables\Columns\TextColumn::make('date')->label('Tanggal')->date('d/m/Y'),
            ])
            ->actions([
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
