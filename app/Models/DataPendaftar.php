<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPendaftar extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'tempat_lahir',
        'tgl_lahir',
        'agama',
        'alamat',
        'jenis_kelamin',
        'no_hp',
        'email',
        'foto',
    ];

    public function dokumen()
    {
        return $this->hasOne(DokumenPendaftar::class, 'id_pendaftar');
    }
    
    public function alternatif()
    {
        return $this->hasOne(Penilaian::class, 'id_pendaftar');
    }
}
