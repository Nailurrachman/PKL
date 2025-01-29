<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempatLahir extends Model
{
    use HasFactory;
    protected $table = 'tempat_lahir';
    protected $fillable = [
        'nama_kota'
    ];

    public function pegawai()
    {
        return $this->hasMany(Pegawai::class, 'id_tempat_lahir');
    }
}
