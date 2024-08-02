<?php

namespace App\Exports;

use App\Models\Student;
use App\Models\Taj;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;

class StudentExport implements FromCollection, WithHeadings, WithCustomStartCell, WithEvents
{
    use Exportable;

    protected $ta_id;
    protected $ta;

    public function __construct($ta_id)
    {
        $this->ta_id = $ta_id;
        $this->ta = $ta_id ? Taj::find($ta_id) : null;
    }

    public function collection()
    {
        $query = Student::query();

        if ($this->ta_id) {
            $query->where('ta_id', $this->ta_id);
        }

        $students = $query->with('ta')->get([
            'nik', 'nama', 'umur', 'tempat_lahir', 'tanggal_lahir',
            'jenis_kelamin', 'asal_sekolah', 'npu', 'tahun_lulus',
            'nisn', 'nama_ayah', 'nama_ibu', 'nik_ayah', 'nik_ibu',
            'desa', 'kecamatan', 'kabupaten', 'provinsi', 'status',
            'jenjang', 'kelas', 'kontak', 'email', 'ta_id'
        ]);

        return $students->map(function ($student) {
            if (!$this->ta_id) {
                // Add 'ta_name' to each student record only if no specific 'ta_id' is provided
                $student->ta_name = $student->ta ? $student->ta->name : 'Unknown';
            }
            return $student;
        });
    }

    public function startCell(): string
    {
        return 'A3'; // Set the starting cell for the data
    }

    public function headings(): array
    {
        // If a specific 'ta_id' is selected, exclude 'Tahun Ajaran'
        if ($this->ta_id) {
            return [
                'NIK', 'Nama', 'Umur', 'Tempat Lahir', 'Tanggal Lahir',
                'Jenis Kelamin', 'Asal Sekolah', 'NPU', 'Tahun Lulus',
                'NISN', 'Nama Ayah', 'Nama Ibu', 'NIK Ayah', 'NIK Ibu',
                'Desa', 'Kecamatan', 'Kabupaten', 'Provinsi', 'Status',
                'Jenjang', 'Kelas', 'Kontak', 'Email'
            ];
        } else {
            return [
                'NIK', 'Nama', 'Umur', 'Tempat Lahir', 'Tanggal Lahir',
                'Jenis Kelamin', 'Asal Sekolah', 'NPU', 'Tahun Lulus',
                'NISN', 'Nama Ayah', 'Nama Ibu', 'NIK Ayah', 'NIK Ibu',
                'Desa', 'Kecamatan', 'Kabupaten', 'Provinsi', 'Status',
                'Jenjang', 'Kelas', 'Kontak', 'Email', 'TA ID', 'Tahun Ajaran'
            ];
        }
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $sheet = $event->sheet;
                $sheet->mergeCells('A1:V1');
                $title = $this->ta ? 'PPDB TA ' . $this->ta->name : 'PPDB Semua Data';
                $sheet->setCellValue('A1', $title);
                $sheet->getStyle('A1')->getFont()->setBold(true)->setSize(16);
                $sheet->getStyle('A1')->getAlignment()->setHorizontal('center');
            },
        ];
    }
}
