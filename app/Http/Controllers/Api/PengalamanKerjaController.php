<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\PengalamanKerja;

class PengalamanKerjaController extends Controller
{
    public function index()
    {
        try{
            $pengalaman_kerja = $request->user()->peserta->pengalaman_kerja; 
        }catch(\Exception $e){
            return response()->json([
                'message' => 'failed',
                'data' => null
            ], 200);
        }
        
        return response()->json([
            'message' => 'success',
            'data' => $pengalaman_kerja
        ], 200);
    }
}
