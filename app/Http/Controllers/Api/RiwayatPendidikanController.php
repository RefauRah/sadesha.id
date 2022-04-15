<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\RiwayatPendidikan;

class RiwayatPendidikanController extends Controller
{
    public function index(Request $request)
    {                
        try{
            $riwayat_pendidikan = $request->user()->peserta->riwayat_pendidikan; 
        }catch(\Exception $e){
            return response()->json([
                'message' => 'failed',
                'data' => null
            ], 200);
        }
        
        return response()->json([
            'message' => 'success',
            'data' => $riwayat_pendidikan
        ], 200);
    }
}
