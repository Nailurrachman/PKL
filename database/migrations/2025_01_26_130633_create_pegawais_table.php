<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawais', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 100);
            $table->enum('jenis_kelamin_enum', ['Laki-laki', 'Perempuan']);
            $table->string('status_asn', 50);
            $table->string('nip_lama', 18)->nullable();
            $table->string('nip_baru', 18)->unique();
            $table->string('nik', 16)->unique();
            $table->unsignedBigInteger('id_tempat_lahir');
            $table->date('tanggal_lahir_date');
            $table->unsignedBigInteger('id_gol_ru');
            $table->date('tmt_gol_date');
            $table->unsignedBigInteger('jabatan_id');
            $table->date('tmt_jabatan_date');
            $table->date('tmt_pertama_diangkat_dlm_jabatan_s/f_date');
            $table->string('tugas_pokok_wilayah_penugasan_tugas_mapel', 255);
            $table->date('tmt_penugasan_date');
            $table->unsignedBigInteger('unit_kerja_id');
            $table->unsignedBigInteger('satker_id');
            $table->string('kualifikasi_pendidikan', 10);
            $table->string('nama_prodi', 100);
            $table->date('tmt_cpns_spm_date');
            $table->date('tmt_pns_date');
            $table->integer('jumlah_istri_suami')->default(0);
            $table->integer('jumlah_anak')->default(0);
            $table->string('alamat_rumah', 255);
            $table->string('nomor_telp_php', 15)->nullable();
            $table->string('email', 100)->unique();
            $table->timestamps();

            // Define foreign key relationships
            $table->foreign('id_tempat_lahir')->references('id')->on('tempat_lahir')->cascadeOnDelete();
            $table->foreign('id_gol_ru')->references('id')->on('gol_ru')->cascadeOnDelete();
            $table->foreign('jabatan_id')->references('id')->on('jabatan')->cascadeOnDelete();
            $table->foreign('unit_kerja_id')->references('id')->on('unit_kerja')->cascadeOnDelete();
            $table->foreign('satker_id')->references('id')->on('satker')->cascadeOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pegawais');
    }
};
