<?php

namespace App\Http\Controllers\Peserta;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Model\PengalamanKerja;

class PengalamanKerjaController extends Controller
{
    public function index()
    {
        $pengalaman_kerja = auth()->user()->peserta ? auth()->user()->peserta->kerja : null;
        $data = [
            'title' => 'Pengalaman Kerja ',
            'breadcrumb' => 'Peserta / Pegalaman Kerja',
            'pengalaman_kerja' => $pengalaman_kerja,
            'route' => route('peserta.pengalamanKerja.create')
        ];
        return view('peserta.pengalaman_kerja.index',$data);
    }

    public function create()
    {        
        $data = [
            'title' => 'Tambah Pengalaman Kerja ',
            'breadcrumb' => 'Peserta / Pegalaman Kerja / Create',
        ];
        return view('peserta.pengalaman_kerja.create',$data);
    }

    public function store(Request $req){
        $req->validate([
            'nama_instansi' => 'required',
            'jabatan' => 'required',
            'tgl_mulai' => 'required',
            'tgl_selesai' => 'required',
        ]);
        try{
            $kerja = new PengalamanKerja();
            $kerja->id_peserta = auth()->user()->peserta->id;
            $kerja->nama_instansi = $req['nama_instansi'];
            $kerja->jabatan = $req['jabatan'];
            $kerja->tgl_mulai = date('Y-m-d', strtotime($req['tgl_mulai']));
            $kerja->tgl_selesai = date('Y-m-d', strtotime($req['tgl_selesai']));
            $kerja->save();
        }catch(\Exception $e){
            //
        }
        return redirect(route('peserta.pengalamanKerja.create'))->with('alert-success', 'Data Berhasil Masuk');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Pengalaman Kerja ',
            'breadcrumb' => 'Peserta / Pegalaman Kerja / Edit',
            'kerja' => PengalamanKerja::find($id)
        ];
        return view('peserta.pengalaman_kerja.edit',$data);
    }

    public function update(Request $req){
        $req->validate([
            'nama_instansi' => 'required',
            'jabatan' => 'required',
            'tgl_mulai' => 'required',
            'tgl_selesai' => 'required',
            'id' => 'required|numeric'
        ]);
        try{
            $kerja = PengalamanKerja::find($req['id']);
            $kerja->nama_instansi = $req['nama_instansi'];
            $kerja->jabatan = $req['jabatan'];
            $kerja->tgl_mulai = date('Y-m-d', strtotime($req['tgl_mulai']));
            $kerja->tgl_selesai = date('Y-m-d', strtotime($req['tgl_selesai']));
            $kerja->save();
        }catch(\Exception $e){
            //
        }
        return redirect(route('peserta.pengalamanKerja.edit',$req['id']))->with('alert-success', 'Data Berhasil Diedit');
    }
}
