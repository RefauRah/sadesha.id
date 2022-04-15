<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    protected $table = 'absensi';
    protected $primaryKey = 'id';
    protected $hidden = ['deleted_at', 'created_at'];

    protected $fillable = ['id_peserta', 'id_materi', 'hadir'];

    public function peserta()
    {
        return $this->belongsTo('App\Model\Peserta', 'id_peserta');
    }

    public function materi()
    {
        return $this->belongsTo('App\Model\Materi', 'id_materi');
    }
}
