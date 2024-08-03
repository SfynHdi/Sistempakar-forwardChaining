<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gejala extends Model
{
    use HasFactory;

    protected $table = 'gejala';
    protected $primaryKey = 'kode_gejala';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'kode_gejala',
        'nama_gejala'
    ];

    public function diagnosa()
    {
        return $this->hasMany(Diagnosa::class, 'kode_gejala', 'kode_gejala');
    }
}
