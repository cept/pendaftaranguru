<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alternatif extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'id_pendaftar',
        'pendidikan',
        'ipk',
        'usia',
        'pengalaman_kerja',
        
    ];

    public function pendaftar()
    {
        return $this->belongsTo(DataPendaftar::class, 'id_pendaftar');
    }
}
