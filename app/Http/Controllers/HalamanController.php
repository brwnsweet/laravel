<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HalamanController extends Controller
{
    //
    function index(){
        return view("halaman/index");
    }function tentang(){
        return view("halaman/tentang");
    }function kontak(){
        // $judul='ini adalah halaman kontak';
        $data=[
            'judul'=>'ini adalah halaman kontak',
            'kontak'=>[
                'email'=>'rpl@smkn9malang.sch.id',
                'ig'=>'@smknegeri9malang'
            ]
            ];
        //return view("halaman/kontak")->with('halaman_judul',$judul);
        return view("halaman/kontak")->with($data);
    }

}
