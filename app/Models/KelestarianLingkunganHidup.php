<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelestarianLingkunganHidup extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_kelpangan';
    protected $table = 'laporan_kelestarian_lingkungan_hidup';
    protected $guarded = [
        'id_kelpangan'
    ];
}
