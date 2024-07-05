<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
    use HasFactory;
    protected $table = 'pengumumans';
    
    protected $fillable = [
        'id_pendaftar',
        'deskripsi',
    ];

    public function pendaftar()
    {
        return $this->belongsTo(DataPendaftar::class, 'id_pendaftar');
    }
}
