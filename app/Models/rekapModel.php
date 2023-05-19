<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rekapModel extends Model
{
    use HasFactory;
    protected $table = 'rekab_tab';
    protected $primaryKey = 'rekap_id';

    protected $fillable = ['nip_id', 'pot_simpanan_wajib', 'pot_reguler', 'pot_bjs', 'pot_toko', 'pot_khusus', 'pot_pi', 'pot_sosial', 'bulan', 'tahun', 'tanggal', 'uniqkey'];
}
