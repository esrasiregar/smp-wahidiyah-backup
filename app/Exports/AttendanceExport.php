<?php

namespace App\Exports;

use App\Models\Attendance;
use App\Models\Subject;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithMapping;

class AttendanceExport implements FromCollection, WithHeadings, WithStyles, WithMapping
{
    protected $class;
    protected $subjectId;
    protected $date;
    protected $summary;
    protected $teacher;
    protected $subject;

    public function __construct($class, $subjectId, $date)
    {
        $this->class = $class;
        $this->subjectId = $subjectId;
        $this->date = $date;
    }

    public function collection()
    {
        $data = Attendance::where('class', $this->class)
            ->where('subject_id', $this->subjectId)
            ->whereDate('date', $this->date)
            ->with(['student', 'teacher'])
            ->get();

        // ambil guru & mapel
        $this->teacher = optional($data->first())->teacher;
        $this->subject = Subject::find($this->subjectId);

        // hitung rekap
        $this->summary = [
            'Hadir' => $data->where('status', 'hadir')->count(),
            'Izin'  => $data->where('status', 'izin')->count(),
            'Sakit' => $data->where('status', 'sakit')->count(),
            'Alpha' => $data->where('status', 'alpha')->count(),
        ];

        return $data;
    }

    public function map($attendance): array
    {
        return [
            $attendance->student->name ?? '-',
            $attendance->student->nis ?? '-',
            ucfirst($attendance->status),
        ];
    }

    public function headings(): array
    {
        return ['Nama Siswa', 'NIS', 'Status'];
    }

    public function styles(Worksheet $sheet)
    {
        // Bold header tabel
        $sheet->getStyle('A1:C1')->getFont()->setBold(true);

        // Tambahkan header laporan
        $sheet->insertNewRowBefore(1, 6);

        $sheet->setCellValue('A1', 'LAPORAN ABSENSI SISWA');
        $sheet->mergeCells('A1:C1');
        $sheet->getStyle('A1')->getFont()->setBold(true)->setSize(14);

        $sheet->setCellValue('A3', 'Guru');
        $sheet->setCellValue('B3', $this->teacher?->name ?? '-');

        $sheet->setCellValue('A4', 'Mata Pelajaran');
        $sheet->setCellValue('B4', $this->subject?->name ?? '-');

        $sheet->setCellValue('A5', 'Kelas');
        $sheet->setCellValue('B5', $this->class);

        $sheet->setCellValue('A6', 'Tanggal');
        $sheet->setCellValue('B6', $this->date);

        // Ringkasan di bawah tabel
        $lastRow = $sheet->getHighestRow() + 2;

        $sheet->setCellValue("A{$lastRow}", 'Ringkasan Kehadiran:');
        $sheet->setCellValue("A" . ($lastRow + 1), 'Hadir');
        $sheet->setCellValue("B" . ($lastRow + 1), $this->summary['Hadir']);
        $sheet->setCellValue("A" . ($lastRow + 2), 'Izin');
        $sheet->setCellValue("B" . ($lastRow + 2), $this->summary['Izin']);
        $sheet->setCellValue("A" . ($lastRow + 3), 'Sakit');
        $sheet->setCellValue("B" . ($lastRow + 3), $this->summary['Sakit']);
        $sheet->setCellValue("A" . ($lastRow + 4), 'Alpha');
        $sheet->setCellValue("B" . ($lastRow + 4), $this->summary['Alpha']);

        $sheet->getStyle("A{$lastRow}:B" . ($lastRow + 4))->getFont()->setBold(true);

        return [];
    }
}
