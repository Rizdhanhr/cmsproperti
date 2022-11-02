<?php

namespace App\Http\Controllers;

use Alert;
use Auth;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class LoginController extends Controller
{
    public function login(){
        return view('login');
    }

    public function postLogin(Request $request){

        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5|max:12'
        ]);

            $user = DB::table('users')->where('email','=', $request->email)->first();
            if($user){
                if(Hash::check($request->password,$user->password)){

                    $request->session()->put('LoggedUser',$user->email);
                    Alert::success('Sukses', 'Login Berhasil');
                    return redirect('admin-dashboard');
                   
                }else{
                    return back()->with('fail','Password Salah');
                }

            }else{
                return back()->with('fail','Akun tidak ditemukan');
            }
      
    }

    public function logout(){
        if(session()->has('LoggedUser')){
            session()->pull('LoggedUser');
            return redirect('login');
        }
    }


}
