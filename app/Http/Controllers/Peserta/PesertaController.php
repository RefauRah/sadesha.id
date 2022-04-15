<?php

namespace App\Http\Controllers\Peserta;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

use Illuminate\Http\Request;
use App\Model\Peserta;
use App\Model\Diklat;
use App\Model\Kota;
use PDF;
use File;

class PesertaController extends Controller{

    public function profile(){
        $peserta = $this->getMe();
        if($peserta != null && $peserta->id_kota > 0)
            $peserta->nama_kota = $peserta->kota->nama_kota;         
        $riwayat_pendidikan = $peserta != null ? $peserta->pendidikan : null;
        $pengalaman_kerja = $peserta != null ? $peserta->kerja : null;
        $pengalaman_organisasi = $peserta != null ? $peserta->organisasi : null;

        $verified = $peserta == null ? false : $peserta->is_verified == 1 ? true : false;
        $data = [
            'title' => 'Detail Profil ',
            'breadcrumb' => 'Peserta / Profile',
            'peserta' => $peserta,
            'pendidikan' => $riwayat_pendidikan,
            'kerja' => $pengalaman_kerja,
            'organisasi' => $pengalaman_organisasi,
            'verified' => $verified
        ];
        return view('peserta.profile', $data);        
    }

    public function edit(){ 
        $kota = Kota::all(); 
        $data = [
            'title' => 'Edit Profil ',
            'breadcrumb' => 'Peserta / Data Diri',
            'peserta' => $this->getMe(),
            // 'peserta' => $peserta
            'kota' => $kota
        ];      
        return view('peserta.edit',$data);
    }

    public function update(Request $req){
        $req->validate([
            'nama_peserta' => 'required',
            'tgl_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'status' => 'required',
            'alamat' => 'required',
            'tipe_peserta' => 'required',
            'no_hp' => 'required',
            'email' => 'required',
            'is_edit' => 'required'
        ]);
        
        $current = $this->getCurrent();
        try{ 
            $peserta = new Peserta();
            if($req['is_edit'] == '1'){
                $peserta = $this->getMe();
            }
            $peserta->nama_peserta = $req['nama_peserta'];
            $peserta->tgl_lahir = date('Y-m-d', strtotime($req['tgl_lahir']));
            $peserta->jenis_kelamin = $req['jenis_kelamin'];
            $peserta->status = $req['status'];
            $peserta->alamat = $req['alamat'];
            $peserta->tipe_peserta = $req['tipe_peserta'];
            $peserta->no_hp = $req['no_hp'];
            $peserta->email = $req['email'];
            $peserta->id_kota = $req['id_kota'];
            $peserta->qr_code = '0';

            if($req['is_edit'] != '1'){
                $peserta->no_peserta = date('mdH').auth()->user()->id;
                $peserta->id_user = auth()->user()->id;
                $peserta->id_diklat = $current->id;                
                $peserta->is_verified = 0;
            }
            $peserta->save();

            $code = base64_encode($peserta->id);
            QrCode::size(250)
                    ->format('png')
                    ->generate($code, public_path("images/$code"));
                
                    $peserta->update([
                        'qr_code' => $code,                        
                        ]);
        } catch (\Exception $e){
            
        }
        return redirect(route('peserta.dataDiri'))->with('alert-success', 'Data Berhasil Masuk');
    }

    public function addPengalamanKerja(Request $req){
        $validator = Validator::make($request->all(), [
            // riwayat pendidikan
            'id_peserta' => 'required',
            'pengalaman_kerja' => 'required|array',
            'pengalaman_kerja.*.nama_instansi' => 'required',
            'pengalaman_kerja.*.jabatan' => 'required',
            'pengalaman_kerja.*.tgl_mulai' => 'required',
            'pengalaman_kerja.*.tgl_selesai' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect('404');
        }

        try{
            $peserta = Peserta::findOrFail($req['id_peserta']);
            foreach($req['pengalaman_kerja'] as $kerja){
                $peserta->kerja()->create([
                    'nama_instansi' => $kerja['nama_instansi'],
                    'jabatan' => $kerja['jabatan'],
                    'tgl_mulai' => $kerja['tgl_mulai'],
                    'tgl_selesai' => $kerja['tgl_selesai']
                ]);
            }
        }catch(\Exception $e){
            return redirect('/');
        }
    }

    public function addPengalamanOrganisasi(Request $req){
        $validator = Validator::make($request->all(), [
            // riwayat pendidikan
            'id_peserta' => 'required',
            'pengalaman_organisasi' => 'required|array',
            'pengalaman_kerja.*.nama_organisasi' => 'required',
            'pengalaman_kerja.*.jabatan' => 'required',
            'pengalaman_kerja.*.tahun' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect('404');
        }

        try{
            $peserta = Peserta::findOrFail($req['id_peserta']);
            foreach($req['pengalaman_organisasi'] as $organisasi){
                $peserta->kerja()->create([
                    'nama_organisasi' => $organisasi['nama_organisasi'],
                    'jabatan' => $organisasi['jabatan'],
                    'tahun' => $organisasi['tahun']
                ]);
            }
        }catch(\Exception $e){
            return redirect('/');
        }
    }

    public function printBiodata(){
        $peserta = $this->getMe();
        $pendidikan = $peserta->pendidikan;
        $organisasi = $peserta->organisasi;
        $pekerjaan = $peserta->kerja;

        $qrPath = file_get_contents(public_path('images/'.$peserta->qr_code));
        $qrCode = 'data:image/png;base64,'.base64_encode($qrPath);
        $pdf = PDF::loadView('peserta.profile_print', compact(
                'peserta',
                'pendidikan',
                'organisasi',
                'pekerjaan',
                'qrCode'
            ))
            ->setPaper('a4', 'potrait');
        return $pdf->stream();
    }

    private function getCurrent(){
        $currentDiklat = Diklat::where('status','1')->first();
        return $currentDiklat;
    }

    private function getMe(){
        return auth()->user()->peserta;
    }

}
