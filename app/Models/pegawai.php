<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pegawai extends Model
{
    use HasFactory;
    protected $table = 'pegawais';
    protected $fillable = [
        'nama',
        'jenis_kelamin_enum',
        'status_asn',
        'nip_lama',
        'nip_baru',
        'nik',
        'id_tempat_lahir',
        'tanggal_lahir_date',
        'id_gol_ru',
        'tmt_gol_date',
        'jabatan_id',
        'tmt_jabatan_date',
        'tmt_pertama_diangkat_dlm_jabatan_s/f_date',
        'tugas_pokok_wilayah_penugasan_tugas_mapel',
        'tmt_penugasan_date',
        'unit_kerja_id',
        'satker_id',
        'kualifikasi_pendidikan',
        'nama_prodi',
        'tmt_cpns_spm_date',
        'tmt_pns_date',
        'jumlah_istri_suami',
        'jumlah_anak',
        'alamat_rumah',
        'nomor_telp_php',
        'email'
    ];

    public function gol_Ru()
{
    return $this->belongsTo(GolRu::class, 'id_gol_ru', 'id');
}


    public function tempat_lahir()
{
    return $this->belongsTo(TempatLahir::class, 'id_tempat_lahir', 'id');
}


    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class, 'jabatan_id');
    }

    public function unit_kerja()
{
    return $this->belongsTo(UnitKerja::class, 'unit_kerja_id', 'id');
}


    public function satker()
    {
        return $this->belongsTo(Satker::class, 'satker_id');
    }
}
