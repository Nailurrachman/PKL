<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GolRu extends Model
{
    use HasFactory;
    protected $table = 'gol_ru';
    protected $fillable = [
        'nama'
    ];
    public function pegawai()
    {
        return $this->hasMany(Pegawai::class, 'id_gol_ru');
    }
}
