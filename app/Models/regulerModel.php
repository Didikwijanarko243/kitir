<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class regulerModel extends Model
{
    use HasFactory;
    protected $table = 'detail_pinjaman_reguler_tab';
    protected $primaryKey = 'reguler_id';

    protected $fillable = ['pinjaman_id', 'nip_id', 'bulan', 'tahun', 'tanggal', 'jumlah_pinjaman', 'bunga', 'tenor', 'pot_pokok', 'pot_bunga', 'pot_jumlah', 'saldo_pokok', 'saldo_bunga', 'saldo_jumlah', 'pot_ke', 'keterangan'];
}
