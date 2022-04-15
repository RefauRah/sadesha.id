<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class PengalamanKerja extends Model
{
    protected $table = 'pengalaman_kerja';
    protected $primaryKey = 'id';
    protected $hidden = ['deleted_at', 'created_at'];

    protected $fillable = [
        'id_peserta',
        'nama_instansi',
        'jabatan',
        'tgl_mulai',
        'tgl_selesai',
    ];

    public function peserta()
    {
        return $this->belongsTo('App\Model\Peserta', 'id_peserta');
    }
}
