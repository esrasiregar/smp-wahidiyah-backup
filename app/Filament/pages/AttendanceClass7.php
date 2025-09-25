<?php

namespace App\Filament\Pages;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use App\Models\Student;
use App\Models\Attendance;
use App\Models\Subject;
use Illuminate\Database\Eloquent\Builder;
class AttendanceClass7 extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-check';
    protected static ?string $title = 'Absensi Kelas 7';
    protected static string $view = 'filament.pages.attendance-class7';

    protected static ?string $navigationGroup = 'Absensi Siswa';
        public static function canAccess(): bool
    {
        return auth()->check() && auth()->user()->role === 'staff';
    }
    public ?string $subject_id = null;
    public ?string $date = null;
    public array $attendances = [];
    // tambahkan ini
public static function getSlug(): string
    {
        return 'attendance-class7'; // ini slug & route path
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
            // default tampilkan semua siswa kelas 7
            $this->attendances = Student::where('class', '7')
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
        
        // cek absensi yang sudah ada
        $existing = Attendance::where('class', '7')
            ->where('subject_id', $this->subject_id)
            ->whereDate('date', $this->date)
            ->get()
            ->keyBy('student_id');

        if ($existing->isNotEmpty()) {
            $this->attendances = Student::where('class', '7')
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
            ->where('class', '7')
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
                    'class' => '7',
                    'status' => $item['status'],
                ]
            );
        }

        Notification::make()
            ->title('Absensi Kelas 7 berhasil disimpan!')
            ->success()
            ->send();
    }
}
