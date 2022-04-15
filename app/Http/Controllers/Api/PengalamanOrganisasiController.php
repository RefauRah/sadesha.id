<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\PengalamanOrganisasi;

class PengalamanOrganisasiController extends Controller
{
    public function index()
    {        
        try{
            $pengalaman_organisasi = $request->user()->peserta->pengalaman_organisasi; 
        }catch(\Exception $e){
            return response()->json([
                'message' => 'failed',
                'data' => null
            ], 200);
        }
        
        return response()->json([
            'message' => 'success',
            'data' => $pengalaman_organisasi
        ], 200);
    }
}
