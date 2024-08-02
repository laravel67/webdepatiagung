<?php

namespace App\Imports;

use Carbon\Carbon;
use App\Models\Achievment;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\RemembersChunkOffset;

class PrestasiImport implements ToCollection, WithHeadingRow, WithChunkReading
{
    use RemembersChunkOffset;
    private $successCount = 0;

    public function collection(Collection $collection)
    {
        foreach ($collection as $row) {
            if (isset($row['nama']) && isset($row['kategori'])) {
                $name = ucwords(strtolower($row['nama']));
                $slug = Str::slug($name);
                $category = strtolower(str_replace(' ', '', $row['kategori']));
                $deskripsi = isset($row['deskripsi']) ? $row['deskripsi'] : '';
                Achievment::firstOrCreate(
                    ['name' => $name],
                    [
                        'slug' => $slug,
                        'category' => $category,
                        'deskripsi' => $deskripsi,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now()
                    ]
                );
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
