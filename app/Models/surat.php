<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class surat extends Model
{
    use HasFactory;

    protected $fillable = [
        'pengirim',
        'nomorsurat',
        'jenis',
        'tanggal',
        'nomoragenda',
        'perihal',
        'asal',
        'diteruskan',
        'document',
    ];


}
