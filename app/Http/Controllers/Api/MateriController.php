<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Model\Diklat;
use App\Model\Materi;
use App\Model\Peserta;
use App\Model\Absensi;

class MateriController extends Controller
{
    public function index(Request $request)
    {        
        try{             
            $peserta = $request->user()->peserta;           
            $materi = $peserta->diklat->materi;
            foreach ($materi as $mat){
                $hadir = Absensi::where('id_peserta', $peserta->id)
                        ->where('id_materi', $mat->id)
                        ->first();
                $mat->waktu_mulai = date('H:i', strtotime($mat->waktu_mulai));
                $mat->waktu_selesai = date('H:i', strtotime($mat->waktu_selesai));
                $mat->hadir = $hadir != null ? true : false;
                unset($mat->qr_code);                
            }            
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

    public function getPeserta($id){        
       try{
            $diklat = Diklat::where('status', 1)->first();
            $peserta = $diklat->peserta;

            foreach($peserta as &$res){
                $res->is_hadir = false;
                $absen = Absensi::where('id_materi', $id)
                    ->where('id_peserta', $res->id)
                    ->count();

                if($absen > 0)
                    $res->is_hadir = true;
            }

        }catch(\Exception $e){
            return response()->json([
                'message' => 'failed',
                'data' => []
            ], 200);
        }
        
        return response()->json([
            'message' => 'success',
            'data' => $peserta
        ], 200);
    }

    public function absen(Request $request) {
        try{ 
            $absen = Absensi::where('id_materi', $request->id_materi)
                ->where('id_peserta', $request->id_peserta)
                ->first();
            
            if($absen==null){
                Absensi::create([
                    'id_peserta' => $request->id_peserta,
                    'id_materi' => $request->id_materi,
                    'hadir' => 1
                ]);
            }

            $peserta = Peserta::find($request->id_peserta);
            $peserta->is_hadir = true;
        }catch(\Exception $e){
            return response()->json([
                'message' => 'failed',
                'data' => null
            ], 400);
        }        
        
        return response()->json([
            'message' => 'success',
            'data' => $peserta
        ], 200);
    }
}
