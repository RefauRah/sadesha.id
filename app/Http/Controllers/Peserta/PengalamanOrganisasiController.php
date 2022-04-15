<?php

namespace App\Http\Controllers\Peserta;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Model\PengalamanOrganisasi;

class PengalamanOrganisasiController extends Controller
{
    public function index()
    {
        $pengalaman_organisasi = auth()->user()->peserta ? auth()->user()->peserta->organisasi : null;
        $data = [
            'title' => 'Pengalaman Organisasi ',
            'breadcrumb' => 'Peserta / Pengalaman Organisasi',
            'pengalaman_organisasi' => $pengalaman_organisasi,
            'route' => route('peserta.pengalamanOrganisasi.create')
        ];
        return view('peserta.pengalaman_organisasi.index',$data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Pengalaman Organisasi ',
            'breadcrumb' => 'Peserta / Pengalaman Organisasi / Create',
        ];   
        return view('peserta.pengalaman_organisasi.create',$data);
    }

    public function store(Request $req){
        $req->validate([
            'nama_organisasi' => 'required',
            'jabatan' => 'required',
            'tahun' => 'required|numeric',
        ]);
        try{
            $organisasi = new PengalamanOrganisasi();
            $organisasi->id_peserta = auth()->user()->peserta->id;
            $organisasi->nama_organisasi = $req['nama_organisasi'];
            $organisasi->jabatan = $req['jabatan'];
            $organisasi->tahun = $req['tahun'];
            $organisasi->save();
        }catch(\Exception $e){
            //
        }
        return redirect(route('peserta.pengalamanOrganisasi.create'))->with('alert-success', 'Data Berhasil Masuk');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Pengalaman Organisasi ',
            'breadcrumb' => 'Peserta / Pengalaman Organisasi / Edit',
            'organisasi' => PengalamanOrganisasi::find($id)
        ];
        return view('peserta.pengalaman_organisasi.edit',$data);
    }

    public function update(Request $req){
        $req->validate([
            'nama_organisasi' => 'required',
            'jabatan' => 'required',
            'tahun' => 'required|numeric',
            'id' => 'required|numeric'
        ]);
        try{
            $organisasi = PengalamanOrganisasi::find($req['id']);
            $organisasi->nama_organisasi = $req['nama_organisasi'];
            $organisasi->jabatan = $req['jabatan'];
            $organisasi->tahun = $req['tahun'];
            $organisasi->save();
        }catch(\Exception $e){
            //
        }
        return redirect(route('peserta.pengalamanOrganisasi.edit',$req['id']))->with('alert-success', 'Data Berhasil Diedit');
    }
}
