<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\Diklat;
use App\Model\Peserta;
use App\Model\Absensi;

class DiklatController extends Controller
{
    public function index(Request $request) {        
        try{
            $diklat = Diklat::where('status', 1)->first();
        }catch(\Exception $e){
            return response()->json([
                'message' => 'failed',
                'data' => []
            ], 200);
        }

        $diklat->kota = $diklat->kota->nama_kota;
        
        return response()->json([
            'message' => 'success',
            'data' => $diklat
        ], 200);
    }

    public function getMateri(){
        try{
            $diklat = Diklat::where('status', 1)->first();
            $materi = $diklat->materi;
        }catch(\Exception $e){
            return response()->json([
                'message' => 'failed',
                'data' => []
            ], 200);
        }
        
        return response()->json([
            'message' => 'success',
            'data' => $materi
        ], 200);
    }

    public function getPeserta(){
        try{
            $diklat = Diklat::where('status', 1)->first();
            $materi = $diklat->materi;

            $materiIds = [];
            foreach($materi as $m){
                $materiIds[] = $m->id;
            }

            $peserta = Peserta::where('is_verified', 1)
                ->where('id_diklat', $diklat->id)
                ->get();
            

            foreach($peserta as &$p){
                $totalHadir = Absensi::where('id_peserta', $p->id)
                    ->whereIn('id_materi', $materiIds)
                    ->groupBy(['id_materi', 'id_peserta'])
                    ->get();

                $p->total_hadir = count($totalHadir);
                $p->total_materi = count($materi);
            }
        }catch(\Exception $e){
            return response()->json([
                'message' => 'failed',
                'data' => $e
            ], 200);
        }
        
        return response()->json([
            'message' => 'success',
            'data' => $peserta
        ], 200);
    }

}
