<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;
    protected $guarded = [''];
    protected $with = ['mapels', 'jabatans'];



    public function mapels()
    {
        return $this->belongsToMany(Mapel::class);
    }


    public function jabatans()
    {
        return $this->belongsToMany(Jabatan::class);
    }


    public function struktur()
    {
        $this->belongsTo(Struktur::class);
    }
    
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
