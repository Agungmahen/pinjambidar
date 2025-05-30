<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index(){
        return view ('auth/login');
    }

    public function register(){
        return view ('auth/register');
    }

    public function registerproses(Request $req){
        $req->validate([
            "name" => "required|max:30",
            "password" => "required|confirmed|min:6",
        ]);
        
        $data = new User();
        $data -> name = $req-> name;
        $data -> password = Hash::make($req->password);
        $data -> save();
        session()->flash('pesan','Pendaftaran Berhasil');
        return redirect()->back();
    }


    public function login (){
            return view('auth/login');
        }

    public function login_proses (Request $req){
            $req->validate([
                "name" => "required|min:2|max:50|exists:users",
                "password" => "required|min:2|max:20"
            ]);
    
            $user = User::where('name',$req->name)->first();
    
            if (Hash::check($req->password,$user->password)){
    
                Auth::attempt(['name' => $req->name, 'password' => $req->password]);
                return redirect('/');
                
            } else {
                return redirect()->back()->withErrors(['password'=>'Password Salah']);
            }
    
        }
        
        public function logout(){
            Auth::logout();
            return redirect()->back();
        }
}
