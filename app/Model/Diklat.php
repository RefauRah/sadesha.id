<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class Diklat extends Model
{
    protected $table = 'diklat';
    protected $primaryKey = 'id';
    protected $hidden = ['deleted_at', 'created_at'];

    protected $fillable = [
        'id_kota',
        'nama_diklat',
        'tgl_mulai',
        'tgl_selesai',
        'status',
    ];

    public function kota()
    {
        return $this->belongsTo('App\Model\Kota', 'id_kota');
    }

    public function materi()
    {
        return $this->hasMany('App\Model\Materi', 'id_diklat');
    }

    public function peserta()
    {
        return $this->hasMany('App\Model\Peserta', 'id_diklat');
    }
}
