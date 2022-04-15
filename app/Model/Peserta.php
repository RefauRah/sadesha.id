<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    protected $table = 'peserta';
    protected $primaryKey = 'id';
    protected $hidden = ['deleted_at', 'created_at'];

    protected $fillable = [
        'id_diklat',
        'id_user',
        'id_kota',
        'no_peserta',
        'nama_peserta',
        'tgl_lahir',
        'jenis_kelamin',
        'status',
        'alamat',
        'tipe_peserta',
        'no_hp',
        'email',
        'is_verified',
        'qr_code',
    ];

    public function diklat()
    {
        return $this->belongsTo('App\Model\Diklat', 'id_diklat');
    }

    public function pendidikan()
    {
        return $this->hasMany('App\Model\RiwayatPendidikan', 'id_peserta');
    }

    public function kerja()
    {
        return $this->hasMany('App\Model\PengalamanKerja', 'id_peserta');
    }

    public function organisasi()
    {
        return $this->hasMany('App\Model\PengalamanOrganisasi', 'id_peserta');
    }

    public function absensi()
    {
        return $this->hasMany('App\Model\Absensi', 'id_peserta');
    }

    public function kota()
    {
        return $this->belongsTo('App\Model\Kota', 'id_kota');
    }
}
