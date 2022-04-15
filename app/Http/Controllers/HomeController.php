<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Model\Diklat;
use App\Model\Materi;
use App\Model\Peserta;
use App\Model\Kota;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
     //   $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $diklat = Diklat::limit(10)->get();
        $data = [
            'diklat' => $diklat,
            'count_diklat' => Diklat::count(),
            'count_materi' => Materi::count(),
            'count_peserta' => Peserta::where('is_verified', 1)->count(),
            'count_pendaftar' => Peserta::count()
        ];
        return view('home', $data);
    }

    public function landingPage(Request $req){
        if(auth()->user() == null){
            return redirect(route('peserta.login'));
        } else {
            if(auth()->user()->is_admin == '1'){
                return redirect(route('home'));
            }else{
                return redirect(route('peserta.profile'));
            }
        }
    }
}
