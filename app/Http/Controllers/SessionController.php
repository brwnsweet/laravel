<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Session;

class SessionController extends Controller
{
    //
    function index(){
        return view("sesi/index");
    }
    function login(Request $request){
        Session::flash('email',$request->email);
        $request->validate([
            "email"=> "required",
            "password"=> "required",
        ],[
            "email.required"=> "Email Wajib Diisi !",
            "passowrd.required"=> "Password Wajib Diisi !",
        ]);

        $infologin =[
            "email"=> $request->email,
            "password"=> $request->password,
        ];

        if(Auth::attempt($infologin)){
            //jika otentikasi berhasil
            return redirect('/siswa')->with('success','Berasil login');
    }else{
        //jika gagal
        return redirect('/sesi')->withErrors('Username dan Password salah !');
    }
}
function logout(){
    Auth::logout();
    return redirect('/')->with('success','Berhasil Logout!');
}
function register(){
    return view('sesi/register');
}
function create(Request $request){
    Session::flash('name',$request->name);
    Session::flash('email',$request->email);
    $request->validate([
        'name'=> 'required',
        'email'=> 'required|email|unique:users',
        'password'=> 'required|min:6',
    ],[
        'name.required'=> 'Nama Wajib Diisi',
        'email.required'=> 'Email Wajib Diisi',
        'email.email'=> 'Masukkan Email yang valid',
        'email.unique'=> 'Email sudah terdaftar, Gunakkan email lain !',
        'password.required'=> 'Password Wajib Diisi',
        'password.min'=> 'Password Minimal 6 Karakter',
    ]);
    $data=[
        'name'=> $request->name,
        'email'=> $request->email,
        'password'=>Hash::make($request->password),
    ];
    User::create($data);
    $infologin=[
        'email'=> $request->email,
        'password'=> $request->password,
    ];

    if(Auth::attempt($infologin)){
        return redirect('/siswa')->with('success',auth::user()->name .'Berhasil Login');
}else{
    return redirect('/sesi')->withErrors('username dan Password salah');
}
}
}