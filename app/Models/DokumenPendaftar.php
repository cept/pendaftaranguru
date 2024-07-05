<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DokumenPendaftar extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_pendaftar',
        'ijazah',
        'cv',
    ];

    public function pendaftar()
    {
        return $this->belongsTo(DataPendaftar::class, 'id_pendaftar');
    }
}
