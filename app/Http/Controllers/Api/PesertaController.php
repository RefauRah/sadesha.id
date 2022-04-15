<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Model\Peserta;
use Validator;
use Session;

class PesertaController extends Controller
{
    public function index(Request $request)
    {    
        try{
            $peserta = $request->user()->peserta; 
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
    public function getById($id)
    {    
        try{
            $peserta = Peserta::find($id); 
        }catch(\Exception $e){
            return response()->json([
                'message' => 'failed',
                'data' => null
            ], 200);
        }
        
        return response()->json([
            'message' => 'success',
            'data' => $peserta
        ], 200);
    }  


    public function login(Request $request)
    {            
        if(Auth::attempt(['username' => $request['username'], 'password' => $request['password']])){
            $user = Auth::user();
            $token =  $user->createToken('nApp')->accessToken;
            $peserta = $request->user()->peserta;
            return response()->json([
                'message' => 'success',
                'data' => ['token' => $token],                
            ], 200);
        }
        else{
            return response()->json([
                'message' => 'failed',
                'data' => null
            ], 401);            
        }
    }

    public function logout() {
        Session::flush();
        Auth::logout();
        return response()->json(['success' => 'cihuy!!!'], 200);
    }

}
