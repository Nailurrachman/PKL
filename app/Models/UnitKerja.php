<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitKerja extends Model
{
    use HasFactory;
    protected $table = 'unit_kerja';
    protected $fillable = [
        'nip_baru',
        'nama',
        'alamat',
        'email'
    ];

    public function pegawai()
    {
        return $this->hasMany(Pegawai::class, 'unit_kerja_id');
    }
}
