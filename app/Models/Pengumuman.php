<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pengumuman extends Model
{
    use HasFactory;
    protected $guarded = [
        'id'
    ];
    protected $dates = [
        'tanggalPengumuman'
    ];

    public function getCreatedAtAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes['tanggalPengumuman'])
        ->translatedFormat('l, d M Y');
    }
}
