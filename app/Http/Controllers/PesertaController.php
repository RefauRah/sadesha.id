<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

use Illuminate\Http\Request;
use App\Model\Peserta;
use App\Model\Diklat;

class PesertaController extends Controller
{
    
    public function all(Request $req){
        $diklat = $this->getCurrent();
        $peserta = Peserta::where('id_diklat', $diklat->id)
            ->where('is_verified', '1')
            ->get();

        $data = [
            'title' => 'Data Peserta Terverifikasi',
            'breadcrumb' => 'Diklat / '.$diklat->nama_diklat.' / Peserta',
            'peserta' => $peserta
        ];
        return view('admin.peserta.index', $data);
    }

    public function unverified(Request $req){
        $diklat = $this->getCurrent();
        $peserta = Peserta::where('id_diklat', $diklat->id)
            ->where('is_verified', '!=', '1')
            ->get();
        
        $data = [
            'title' => 'Data Calon Peserta',
            'peserta' => $peserta,
            'breadcrumb' => 'Diklat / '.$diklat->nama_diklat.' / Calon Peserta'
        ];
        return view('admin.peserta.index', $data);
    }

    public function verification($id)
    {
        $peserta = Peserta::findOrFail($id); 
        $code = base64_encode($peserta->id);
        QrCode::size(250)
                ->format('png')
                ->generate($code, public_path("images/$code"));
            
                $peserta->update([
                    'qr_code' => $code,
                    'is_verified' => '1'
                    ]);               

        return redirect('/kelola/peserta/pendaftar');
    }

    public function detail($id){
        $diklat = $this->getCurrent();
        $peserta = Peserta::findOrFail($id);
        $riwayat_pendidikan = $peserta != null ? $peserta->pendidikan : null;
        $pengalaman_kerja = $peserta != null ? $peserta->kerja : null;
        $pengalaman_organisasi = $peserta != null ? $peserta->organisasi : null;

        $data = [
            'title' => 'Detail Peserta',
            'breadcrumb' => 'Diklat / '.$diklat->nama_diklat.' / Peserta / Detail Peserta',
            'peserta' => $peserta,
            'pendidikan' => $riwayat_pendidikan,
            'kerja' => $pengalaman_kerja,
            'organisasi' => $pengalaman_organisasi,
        ];
     
        return view('admin.peserta.detail', $data);
    }

    public function create(){
        $diklat = Diklat::where('status', 'BUKA')->first();
        $data = [
            'title' => 'Create Peserta',            
            'breadcrumb' => 'Diklat / Create Peserta',
            'diklat' => $diklat
        ];
        
        return view('admin.peserta.create', $data);
    }

    public function store(Request $req){
        $validator = Validator::make($request->all(), [
            'id_diklat' => 'required',
            'no_peserta' => 'required',
            'nama_peserta' => 'required',
            'tgl_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'status' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'email' => 'required',
            // riwayat pendidikan
            'riwayat_pendidikan' => 'required|array',
            'riwayat_pendidikan.*.id_tipe_pendidikan' => 'required',
            'riwayat_pendidikan.*.nama_instansi' => 'required',
            'riwayat_pendidikan.*.tahun_masuk' => 'required',
            'riwayat_pendidikan.*.tahun_lulus' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect('404');
        }

        $peserta = new Peserta();
        $peserta->id_diklat = $req['id_diklat'];
        $peserta->no_peserta = $req['no_peserta'];
        $peserta->nama_peserta = $req['nama_peserta'];
        $peserta->tgl_lahir = $req['tgl_lahir'];
        $peserta->jenis_kelamin = $req['jenis_kelamin'];
        $peserta->status = $req['status'];
        $peserta->alamat = $req['alamat'];
        $peserta->no_hp = $req['no_hp'];
        $peserta->email = $req['email'];
        $peserta->qr_code = '0';        

        DB::beginTransaction();
        try{
            $peserta->save();
            foreach($req['riwayat_pendidikan'] as $riwayat){
                $peserta->pendidikan()->create([
                    'id_tipe_pendidikan' => $riwayat['id_tipe_pendidikan'],
                    'nama_instansi' => $riwayat['nama_instansi'],
                    'tahun_masuk' => $riwayat['tahun_masuk'],
                    'tahun_lulus' => $riwayat['tahun_lulus']
                ]);
            }
            if($req['has_pengalaman_kerja'] == 1){
                foreach($req['pengalaman_kerja'] as $kerja){
                    $peserta->kerja()->create([
                        'nama_instansi' => $kerja['nama_instansi'],
                        'jabatan' => $kerja['jabatan'],
                        'tgl_mulai' => $kerja['tgl_mulai'],
                        'tgl_selesai' => $kerja['tgl_selesai']
                    ]);
                }
            }
            if($req['has_pengalaman_organisasi'] == 1){
                foreach($req['pengalaman_organisasi'] as $organisasi){
                    $peserta->kerja()->create([
                        'nama_organisasi' => $organisasi['nama_organisasi'],
                        'jabatan' => $organisasi['jabatan'],
                        'tahun' => $organisasi['tahun']
                    ]);
                }
            }
        }catch(\Exception $e){
            DB::rollBack();
            return redirect('/kelola/peserta/create');
        }
        DB::commit();
        return redirect('/');
    }

    public function edit($id){
        $peserta = Peserta::where('id',$id)
            ->with('pendidikan')
            ->with('kerja')
            ->with('organisasi')
            ->first();
        return view('admin.peserta.edit', compact('peserta'));
    }

    public function update(Request $req, $id){
        $validator = Validator::make($request->all(), [
            'id_diklat' => 'required',
            'no_peserta' => 'required',
            'nama_peserta' => 'required',
            'tgl_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'status' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'email' => 'required',
            // riwayat pendidikan
            'riwayat_pendidikan' => 'required|array',
            'riwayat_pendidikan.*.id_tipe_pendidikan' => 'required',
            'riwayat_pendidikan.*.nama_instansi' => 'required',
            'riwayat_pendidikan.*.tahun_masuk' => 'required',
            'riwayat_pendidikan.*.tahun_lulus' => 'required',
            'has_pengalaman_kerja' => 'required|numeric',
            'has_pengalaman_organisasi' => 'required|numeric',
        ]);
        if ($validator->fails()) {
            return redirect('404');
        }

        $peserta = Peserta::findOrFail($id);
        $peserta->id_diklat = $req['id_diklat'];
        $peserta->no_peserta = $req['no_peserta'];
        $peserta->nama_peserta = $req['nama_peserta'];
        $peserta->tgl_lahir = $req['tgl_lahir'];
        $peserta->jenis_kelamin = $req['jenis_kelamin'];
        $peserta->status = $req['status'];
        $peserta->alamat = $req['alamat'];
        $peserta->no_hp = $req['no_hp'];
        $peserta->email = $req['email'];

        DB::beginTransaction();
        try{
            $peserta->save();
            foreach($req['riwayat_pendidikan'] as $riwayat){
                $peserta->pendidikan()->create([
                    'id_tipe_pendidikan' => $riwayat['id_tipe_pendidikan'],
                    'nama_instansi' => $riwayat['nama_instansi'],
                    'tahun_masuk' => $riwayat['tahun_masuk'],
                    'tahun_lulus' => $riwayat['tahun_lulus']
                ]);
            }
        }catch(\Exception $e){
            DB::rollBack();
            return redirect('/');
        }
        DB::commit();
        return redirect('/');
    }

    public function delete($id){
        try{
            $peserta = Peserta::findOrFail($id);
            $peserta->delete();
        }catch(\Exception $e){
            return redirect('/kelola/peserta');
        }
        
        return redirect()->back();
    }

    private function getCurrent(){
        $currentDiklat = Diklat::where('status','1')->first();
        return $currentDiklat;
    }    

}
