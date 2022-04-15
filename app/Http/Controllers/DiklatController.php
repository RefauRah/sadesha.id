<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Model\Diklat;
use App\Model\Kota;

class DiklatController extends Controller
{
    
    public function all(Request $req){
        $diklat = Diklat::all();            
        $data = [
            'title' => 'Diklat ',
            'route' => route('diklat.create'),
            'diklat' => $diklat,
            'breadcrumb' => 'Home / Diklat'
        ];        
        return view('admin.diklat.index', $data);        
    }

    public function create(){
        $kota = Kota::all();
        $data = [
            'title' => 'Tambah Diklat ',            
            'kota' => $kota,
            'breadcrumb' => 'Home / Diklat/ Tambah Diklat'
        ]; 
        return view('admin.diklat.create', $data);
    }

    public function store(Request $req){
        try{
            $diklat = new Diklat();
            $diklat->id_kota = $req['id_kota'];
            $diklat->nama_diklat = $req['nama_diklat'];
            $diklat->tgl_mulai = date('Y-m-d', strtotime($req['tgl_mulai']));
            $diklat->tgl_selesai = date('Y-m-d', strtotime($req['tgl_selesai']));
            $diklat->status = '2';
            $diklat->save();
            
        }catch(\Exception $e){
            return redirect('/kelola/diklat');
        }
        return redirect(route('diklat.all'));
    }

    public function edit($id){
        $kota = Kota::all();
        $diklat = Diklat::findOrFail($id);
        $data = [
            'title' => 'Edit Diklat ',            
            'kota' => $kota,
            'diklat' => $diklat,
            'breadcrumb' => 'Home / Diklat/ Edit Diklat'
        ]; 
        return view('admin.diklat.edit', $data);
    }

    public function update(Request $req){
        $req->validate([
            'id' => 'required',
            'id_kota' => 'required',
            'nama_diklat' => 'required',
            'tgl_mulai' => 'required',
            'tgl_selesai' => 'required',
            'status' => 'required'
        ]);
        try{
            $diklat = Diklat::findOrFail($req['id']);
            $diklat->id_kota = $req['id_kota'];
            $diklat->nama_diklat = $req['nama_diklat'];
            $diklat->tgl_mulai = date('Y-m-d', strtotime($req['tgl_mulai']));
            $diklat->tgl_selesai = date('Y-m-d', strtotime($req['tgl_selesai']));
            $diklat->status = $req['status'];
            $diklat->save();

            if($req['status'] == '1')
                $this->setActive($req['id']);

        }catch(\Exception $e){
            //
        }
        return redirect(route('diklat.all'));
    }

    public function delete(Request $req){
        try{
            $id = $req['id'];
            $diklat = Diklat::findOrFail($id);
            $diklat->delete();
        }catch(\Exception $e){
            //
        }
        return redirect(route('diklat.all'));
    }

    private function setActive($id){
        try{
            Diklat::where('status', '!=', '3')->update(
                ['status' => '2']
            );

            $diklat = Diklat::find($id);
            $diklat->status = '1';
            $diklat->save();
        }catch(\Exception $e){
            //
        }
        return redirect(route('diklat.all'));
    }
    
}
