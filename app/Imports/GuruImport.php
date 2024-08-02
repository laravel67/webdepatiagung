<?php

namespace App\Imports;

use Carbon\Carbon;
use App\Models\Guru;
use App\Models\Jabatan;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\RemembersChunkOffset;

class GuruImport implements ToCollection, WithHeadingRow, WithChunkReading
{
    use RemembersChunkOffset;
    private $successCount = 0;

    public function collection(Collection $collection)
    {
        foreach ($collection as $row) {
            if (isset($row['nama']) && isset($row['jabatan']) && isset($row['pendidikan']) && isset($row['mulai mengajar']) && isset($row['biografi'])) {
                $name = ucwords(strtolower($row['nama']));
                $slug = Str::slug($name);
                $pendidikan = $row['pendidikan'];
                $deskripsi = isset($row['biografi']) ? $row['biografi'] : '';
                $mulaiMengajar = Carbon::parse($row['mulai mengajar'])->toDateString();

                // Buat atau temukan entri guru
                $guru = Guru::firstOrCreate(
                    ['name' => $name],
                    [
                        'slug' => $slug,
                        'pendidikan' => $pendidikan,
                        'mulai_mengajar' => $mulaiMengajar,
                        'deskripsi' => $deskripsi,
                        'image' => null,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now()
                    ]
                );
                $jabatanName = strtoupper($row['jabatan']);
                $jabatan = Jabatan::where('name', $jabatanName)->first();
                if ($jabatan) {
                    $guru->jabatans()->syncWithoutDetaching($jabatan->id);
                }
                $this->successCount++;
            }
        }

    }

    public function chunkSize(): int
    {
        return 1000;
    }

    public function getSuccessCount(): int
    {
        return $this->successCount;
    }
}
