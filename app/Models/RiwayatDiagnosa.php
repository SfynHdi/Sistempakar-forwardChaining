<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatDiagnosa extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'riwayat_diagnosa';

    protected $fillable = [
        'id_user',
        'waktu',
        'gejala_dipilih',
        'hasil_diagnosa',
    ];
}
