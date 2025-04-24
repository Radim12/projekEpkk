<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerencanaanSehat extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_p_sehat';
    protected $table = 'laporan_perencanaan_sehat';
    protected $guarded = [
        'id_p_sehat'
    ];
}
