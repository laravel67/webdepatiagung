<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mapel extends Model
{
    use HasFactory;
    protected $guarded = [''];

    public function guru()
    {
        return $this->hasMany(Guru::class);
    }
}
