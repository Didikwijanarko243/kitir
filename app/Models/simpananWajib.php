<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class simpananWajib extends Model
{
    use HasFactory;
    protected $table = 'detail_simpanan_wajib_tab';
    protected $primaryKey = 'wajib_id';

    protected $fillable = ['nip_id', 'periode_anggota', 'bulan', 'tahun', 'total_simpanan_pokok', 'total_simpanan_wajib', 'total_simpanan_khusus'];
    public function pegawai()
    {
        return $this->hasOne(pegawaiModel::class, 'nip', 'nip_id');
    }
}
