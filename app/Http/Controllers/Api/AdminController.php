<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Validator;
use Session;

class AdminController extends Controller
{
    
    public function login(Request $request)
    {            
        if(Auth::attempt(['username' => $request['username'], 'password' => $request['password']])){
            $user = Auth::user();
            
            if($user->is_admin!=1){
                return response()->json([
                    'message' => 'failed',
                    'data' => null
                ], 401);            
            }
            
            $token =  $user->createToken('nApp')->accessToken;
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
