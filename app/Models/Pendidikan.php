<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendidikan extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_pokja2_bidang1';
    protected $table = 'laporan_pendidikan_n_keterampilan';
    protected $guarded = [
        'id_pokja2_bidang1'
    ];
}
