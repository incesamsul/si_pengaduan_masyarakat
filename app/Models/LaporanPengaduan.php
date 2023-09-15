<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanPengaduan extends Model
{
    use HasFactory;
    protected $table = 'laporan_pengaduan';
    protected $guarded = [''];
}
