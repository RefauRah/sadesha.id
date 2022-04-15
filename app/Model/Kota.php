<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class Kota extends Model
{
    protected $table = 'kota';
    protected $primaryKey = 'id';
    protected $hidden = ['deleted_at', 'created_at'];

    protected $fillable = ['nama_kota'];

    public function diklat()
    {
        return $this->hasMany('App\Model\Diklat', 'id_kota');
    }
}
