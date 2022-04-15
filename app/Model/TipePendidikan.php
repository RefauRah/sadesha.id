<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class TipePendidikan extends Model
{
    protected $table = 'tipe_pendidikan';
    protected $primaryKey = 'id';
    protected $hidden = ['deleted_at', 'created_at'];

    protected $fillable = ['nama_tipe'];

    public function diklat()
    {
        return $this->hasMany('App\Model\Diklat', 'id_kota');
    }
}
