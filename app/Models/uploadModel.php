<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class uploadModel extends Model
{
    use HasFactory;

    protected $table = 'upload_tab';
    protected $primaryKey = 'id';

    protected $fillable = ['nama_file', 'location', 'status', 'jam', 'tanggal'];
}
