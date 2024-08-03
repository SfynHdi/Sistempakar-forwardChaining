<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyakit extends Model
{
    use HasFactory;

    protected $table = 'penyakit';
    protected $primaryKey = 'kode_penyakit';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'kode_penyakit',
        'nama_penyakit'
    ];

    public function diagnosa()
    {
        return $this->hasMany(Diagnosa::class, 'kode_penyakit', 'kode_penyakit');
    }
}

