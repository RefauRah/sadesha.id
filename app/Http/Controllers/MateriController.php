<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Model\Materi;
use App\Model\Diklat;
use App\Model\Peserta;
use App\Model\Absensi;

class MateriController extends Controller
{
    
    public function all(Request $req){
        $idDiklat = isset($req->id_diklat) && $req->id_diklat > 0 ? $req->id_diklat : 0;
        $current = $this->getCurrent();
        
        if($idDiklat > 0)
            $current = Diklat::find($idDiklat);            
        
        $materi = Materi::where('id_diklat', $current->id)
            ->get();

        $data = [
            'title' => 'Materi '.$current->nama_diklat,
            'route' => route('materi.create')."?id_diklat=$idDiklat",
            'materi' => $materi,
            'breadcrumb' => 'Diklat / '.$current->nama_diklat.' / Materi'
        ];
        return view('admin.materi.index', $data);
    }

    public function detail($id){
        $materi = Materi::findOrFail($id);
        $current = $this->getCurrent();
        $absensi = Peserta::where('id_diklat', $current->id)
            ->where('is_verified', 1)
            ->get();
        foreach($absensi as &$abs){
            $abs->hadir = false;
            if(Absensi::find($abs->id) != null)
                $abs->hadir = true;
        }
        $data = [
            'title' => 'Detail Materi '.$current->nama_diklat,            
            'materi' => $materi,
            'breadcrumb' => 'Diklat / '.$current->nama_diklat.' / Materi / Detail Materi',
            'absensi' => $absensi
        ];
        return view('admin.materi.detail', $data);
    }

    public function create(Request $req){
        $idDiklat = isset($req['id_diklat']) && $req['id_diklat'] > 0 ? $req['id_diklat'] : 0;
        $current = $this->getCurrent();
        
        if($idDiklat > 0)
            $current = Diklat::find($idDiklat);
        $data = [
            'title' => 'Tambah Materi',
            'diklat' => $current,
            'breadcrumb' => 'Diklat / '.$current->nama_diklat.' / Materi / Tambah Materi'
        ];
        return view('admin.materi.create', $data);
    }

    public function store(Request $req){
        $req->validate([
            'tema_materi' => 'required',
            'nama_pemateri' => 'required',
            'tanggal' => 'required',
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'required',
        ]);        
        $current = $this->getCurrent();
        $idDiklat = isset($req['id']) ? $req['id'] : $current->id;
        try{                           
            $materi = new Materi();            
            $materi->id_diklat = $idDiklat;
            $materi->tema_materi = $req['tema_materi'];
            $materi->nama_pemateri = $req['nama_pemateri'];
            $materi->tanggal = date('Y-m-d',strtotime($req['tanggal']));
            $materi->waktu_mulai = date('H:i:s',strtotime($req['waktu_mulai']));
            $materi->waktu_selesai = date('H:i:s',strtotime($req['waktu_selesai']));
            $materi->status = 0;            
            $materi->save();            
                    
        }catch(\Exception $e){
            die($e);
        }
        if(isset($req['id']))
            return redirect('/kelola/materi?id_diklat='.$req['id']);
        else
            return redirect('/kelola/materi');
    }

    public function edit($id){
        $materi = Materi::findOrFail($id);
        $data = [
            'title' => 'Edit Materi',
            'materi' => $materi,
            'breadcrumb' => 'Diklat / '.$materi->diklat->nama_diklat.' / Materi / Edit Materi'
        ];
        return view('admin.materi.edit', $data);
    }

    public function update(Request $req){
        $req->validate([
            'id' => 'required',
            'tema_materi' => 'required',
            'nama_pemateri' => 'required',
            'tanggal' => 'required',
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'required',
            'status' => 'required'
        ]);
        try{
            $materi = Materi::findOrFail($req['id']);
            $materi->tema_materi = $req['tema_materi'];
            $materi->nama_pemateri = $req['nama_pemateri'];
            $materi->tanggal = date('Y-m-d',strtotime($req['tanggal']));
            $materi->waktu_mulai = date('H:i:s',strtotime($req['waktu_mulai']));
            $materi->waktu_selesai = date('H:i:s',strtotime($req['waktu_selesai']));;
            $materi->status = $req['status'];
            $materi->save();
        }catch(\Exception $e){
            //
        }
        return redirect(route('materi.all'));
    }

    public function delete(Request $req){
        try{
            $id = $req['id'];
            $materi = Materi::findOrFail($id);
            $materi->delete();
        }catch(\Exception $e){
            //
        }
        if(isset($req['id_diklat']))
            return redirect(route('materi.all').'?id_diklat='.$req['id_diklat']);
        else 
            return redirect(route('materi.all'));
    }

    private function getCurrent(){
        $currentDiklat = Diklat::where('status','1')->first();
        return $currentDiklat;
    }
 
}
