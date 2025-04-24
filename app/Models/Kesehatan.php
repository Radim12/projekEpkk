<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kesehatan extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_laporan_sehat';
    protected $table = 'laporan_bidang_kesehatan';
    protected $guarded = [
        'id_laporan_sehat'
    ];
}
