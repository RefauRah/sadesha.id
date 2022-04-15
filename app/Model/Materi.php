<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    protected $table = 'materi';
    protected $primaryKey = 'id';
    protected $hidden = ['deleted_at', 'created_at','id_diklat','updated_at','status'];

    protected $fillable = [
        'id_diklat',
        'tema_materi',
        'nama_pemateri',
        'tanggal',
        'waktu_mulai',
        'waktu_selesai',
        'status',        
    ];

    public function diklat()
    {
        return $this->belongsTo('App\Model\Diklat', 'id_diklat');
    }
}
