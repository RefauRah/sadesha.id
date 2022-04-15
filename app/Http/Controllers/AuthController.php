<?php
 
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Validator,Redirect,Response;
Use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;
 
class AuthController extends Controller
{
    public function index()
    {
        return view('login');
    }  
 
    public function postLogin(Request $request)
    {
        request()->validate([
        'username' => 'required',
        'password' => 'required',
        ]);
 
        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {              
            return redirect()->intended('/kelola');
        }
        return redirect(route('login'));
    }
    
    public function register(){
        return view('peserta.register');
    }

    public function postRegister(Request $req){        
        $req->validate([
            'username' => 'required',
            'password' => 'required|confirmed|min:6',
        ]);
        try{
            $user = new User();
            $user->name = $req['name'];
            $user->username = $req['username'];
            $user->password = Hash::make($req['password']);
            $user->is_verified = 0;
            $user->save();
        }catch(\Exception $e){
            die($e);
            return redirect(route('registerForm'));
        }
        return redirect(route('peserta.login'));
    }

    public function changePasswordForm()
    {
        return view('ganti-password');
    }

    public function changePassword(Request $req)
    {        
        $req->validate([            
            'old_password' => 'required',
            'new_password' => 'required|confirmed|min:6'
        ]);
        try{
            if (!(Hash::check($req['old_password'], Auth::user()->password))) {            
                return redirect()->back();
            }
                
            if(strcmp($req['old_password'], $req['new_password']) == 0){            
                return redirect()->back();
            }            

            $user = Auth::user();            
            $user->password = Hash::make($req['new_password']);
            $user->save();
        }catch(\Exception $e){
            die($e);
        }        

        return redirect('kelola');
    }
     
    public function logout() {
        Session::flush();
        Auth::logout();
        return Redirect('/panitia/login');
    }
}
?>