<?php

namespace App\Http\Controllers\Peserta;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Model\RiwayatPendidikan;
use App\Model\TipePendidikan;


class RiwayatPendidikanController extends Controller
{
    public function index()
    {
        $riwayat_pendidikan = auth()->user()->peserta ? auth()->user()->peserta->pendidikan : null;
        $data = [
            'title' => 'Riwayat Pendidikan ',
            'breadcrumb' => 'Peserta / Riwayat Pendidikan',
            'riwayat_pendidikan' => $riwayat_pendidikan,
            'route' => route('peserta.riwayatPendidikan.create')
        ];
        return view('peserta.riwayat_pendidikan.index',$data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Riwayat Pendidikan ',
            'breadcrumb' => 'Peserta / Riwayat Pendidikan / Create',
            'tipe_pendidikan' => TipePendidikan::all()
        ];
        return view('peserta.riwayat_pendidikan.create',$data);
    }

    public function store(Request $req){
        $req->validate([
            'id_tipe_pendidikan' => 'required',
            'nama_instansi' => 'required',
            'tahun_masuk' => 'required|numeric',
            'tahun_lulus' => 'required|numeric',
        ]);
        try{
            $pendidikan = new RiwayatPendidikan();
            $pendidikan->id_peserta = auth()->user()->peserta->id;
            $pendidikan->id_tipe_pendidikan = $req['id_tipe_pendidikan'];
            $pendidikan->nama_instansi = $req['nama_instansi'];
            $pendidikan->tahun_masuk = $req['tahun_masuk'];
            $pendidikan->tahun_lulus = $req['tahun_lulus'];
            $pendidikan->save();
        }catch(\Exception $e){
            //
        }
        return redirect(route('peserta.riwayatPendidikan.create'))->with('alert-success', 'Data Berhasil Masuk');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Riwayat Pendidikan ',
            'breadcrumb' => 'Peserta / Riwayat Pendidikan / Edit',
            'tipe_pendidikan' => TipePendidikan::all(),
            'pendidikan' => RiwayatPendidikan::find($id)
        ];
        return view('peserta.riwayat_pendidikan.edit',$data);
    }

    public function update(Request $req){
        $req->validate([
            'id_tipe_pendidikan' => 'required',
            'nama_instansi' => 'required',
            'tahun_masuk' => 'required|numeric',
            'tahun_lulus' => 'required|numeric',
            'id' => 'required|numeric'
        ]);
        try{
            $pendidikan = RiwayatPendidikan::find($req['id']);
            $pendidikan->id_tipe_pendidikan = $req['id_tipe_pendidikan'];
            $pendidikan->nama_instansi = $req['nama_instansi'];
            $pendidikan->tahun_masuk = $req['tahun_masuk'];
            $pendidikan->tahun_lulus = $req['tahun_lulus'];
            $pendidikan->save();
        }catch(\Exception $e){
            //
        }
        return redirect(route('peserta.riwayatPendidikan.edit',$req['id']))->with('alert-success', 'Data Berhasil Diedit');
    }
}
