<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Faq;

class FaqController extends Controller
{
    public function index(){
        try{
            $faq = Faq::all();            
        }catch(\Exception $e){
            return response()->json([
                'message' => 'failed',
                'data' => null
            ]);
        }
        return response()->json([
            'messagge' => 'success',
            'data' => $faq
        ]);
    }
}
