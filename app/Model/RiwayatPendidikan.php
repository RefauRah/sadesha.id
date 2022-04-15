<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class RiwayatPendidikan extends Model
{
    protected $table = 'riwayat_pendidikan';
    protected $primaryKey = 'id';
    protected $hidden = ['deleted_at', 'created_at'];

    protected $fillable = [
        'id_peserta',
        'id_tipe_pendidikan',
        'nama_instansi',
        'tahun_masuk',
        'tahun_lulus',
    ];

    public function peserta()
    {
        return $this->belongsTo('App\Model\Peserta', 'id_peserta');
    }

    public function tipe()
    {
        return $this->belongsTo(
            'App\Model\TipePendidikan',
            'id_tipe_pendidikan'
        );
    }
}
