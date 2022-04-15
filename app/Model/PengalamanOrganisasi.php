<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class PengalamanOrganisasi extends Model
{
    protected $table = 'pengalaman_organisasi';
    protected $primaryKey = 'id';
    protected $hidden = ['deleted_at', 'created_at'];

    protected $fillable = ['id_peserta', 'nama_organisasi', 'jabatan', 'tahun'];

    public function peserta()
    {
        return $this->belongsTo('App\Model\Peserta', 'id_peserta');
    }
}
