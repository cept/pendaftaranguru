<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    use HasFactory;

    protected $fillable = [
        'pendidikan',
        'ipk',
        'pengalaman_kerja',
        'usia',
        
    ];

    protected $attributes = [
        'pendidikan' => 30,
        'ipk' => 25,
        'pengalaman_kerja' => 30,
        'usia' => 15,
    ];

}
