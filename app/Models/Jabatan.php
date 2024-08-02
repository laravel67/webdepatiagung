<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    use HasFactory;
    protected $guarded = [''];

    public function guru()
    {
        return $this->hasMany(Guru::class);
    }

    public function strukturs()
    {
        return $this->hasMany(Struktur::class);
    }
}
