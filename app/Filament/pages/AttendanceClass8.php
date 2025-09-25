<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Models\Student;
use App\Models\Attendance;
use App\Models\Subject;
use Illuminate\Database\Eloquent\Builder;
use Filament\Notifications\Notification;
class AttendanceClass8 extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-check';
    protected static ?string $title = 'Absensi Kelas 8';
    protected static string $view = 'filament.pages.attendance-class8';

    protected static ?string $navigationGroup = 'Absensi Siswa';
        public static function canAccess(): bool
    {
        return auth()->check() && auth()->user()->role === 'staff';
    }
    public ?string $subject_id = null;
    public ?string $date = null;
    public array $attendances = [];

    public static function getSlug(): string
    {
        return 'attendance-class8'; // ini slug & route path
    }
    public function mount(): void
    {
        // gunakan nilai dari query string jika ada
        $this->date = request()->query('date', today()->toDateString());
        $this->subject_id = request()->query('subject_id', null);

        // load absensi jika subject & date sudah ada
        if ($this->subject_id && $this->date) {
            $this->loadAttendance();
        } else {
            // default tampilkan semua siswa kelas 8
            $this->attendances = Student::where('class', '8')
                ->orderBy('name')
                ->get()
                ->map(fn ($s) => [
                    'id' => $s->id,
                    'nis' => $s->nis,
                    'name' => $s->name,
                    'status' => 'hadir',
                ])
                ->toArray();
        }
    }

    public function updatedSubjectId($value): void
    {
        $this->loadAttendance();
    }

    public function updatedDate($value): void
    {
        $this->loadAttendance();
    }

    private function loadAttendance(): void
    {
        if (!$this->subject_id || !$this->date) {
            return;
        }

        $existing = Attendance::where('class', '8')
            ->where('subject_id', $this->subject_id)
            ->whereDate('date', $this->date)
            ->get()
            ->keyBy('student_id');

        if ($existing->isNotEmpty()) {
            $this->attendances = Student::where('class', '8')
                ->orderBy('name')
                ->get()
                ->map(fn ($s) => [
                    'id' => $s->id,
                    'nis' => $s->nis,
                    'name' => $s->name,
                    'status' => $existing[$s->id]->status ?? 'hadir',
                ])
                ->toArray();
        }
    }

    public function getAttendanceSummary(): Builder
    {
        return Attendance::query()
            ->selectRaw('teacher_id, class, subject_id, date, MIN(id) as id')
            ->with(['teacher', 'subject']) // relasi guru & mapel
            ->where('class', '8')
            ->groupBy('teacher_id', 'class', 'subject_id', 'date')
            ->orderBy('date', 'desc'); // urut berdasarkan tanggal terbaru
    }
    
    public function save(): void
    {
        if (!$this->subject_id || !$this->date) {
            Notification::make()
                ->title('Pilih mata pelajaran dan tanggal terlebih dahulu.')
                ->danger()
                ->send();
            return;
        }

        foreach ($this->attendances as $item) {
            Attendance::updateOrCreate(
                [
                    'student_id' => $item['id'],
                    'subject_id' => $this->subject_id,
                    'date' => $this->date,
                ],
                [
                    'teacher_id' => auth()->id(),
                    'class' => '8',
                    'status' => $item['status'],
                ]
            );
        }

        Notification::make()
            ->title('Absensi Kelas 8 berhasil disimpan!')
            ->success()
            ->send();
    }
}
