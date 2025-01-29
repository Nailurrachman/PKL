<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class satker extends Model
{
    use HasFactory;
    protected $table = 'satker';
    protected $fillable = [
        'nama',
        'alamat',
        'email'
    ];

    public function pegawai()
    {
        return $this->hasMany(Pegawai::class, 'satker_id');
    }
}
