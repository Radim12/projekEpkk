<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengembangan extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_pokja2_bidang2';
    protected $table = 'laporan_pengembangan_kehidupan';
    protected $guarded = [
        'id_pokja2_bidang2'
    ];
}
