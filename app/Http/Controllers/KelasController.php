<?php

namespace App\Http\Controllers;

use App\Models\kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Session;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data=kelas::orderBy('id','desc')->paginate(3);
        return view('kelas/index')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('kelas/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        Session::flash('nama_kelas',$request->nama_kelas);
        Session::flash('walikelas',$request->walikelas); 
        Session::flash('jumlah_siswa',$request->jumlah_siswa);

        $request->validate([
            'nama_kelas'=>'required',
            'walikelas'=>'required',
            'jumlah_siswa'=>'required|numeric',
            'foto'=>'required|mimes:jpg,jpeg,png,gif',

        ],[
            'nama_kelas.required'=> 'Kolom NAMA KELAS wajib diisi',
            'walikelas.required'=> 'Kolom WALI KELAS wajib diisi',
            'jumlah_siswa.numeric'=> 'Kolom JUMLAH SISWA wajib diisi dengan ANGKA',
            'foto.required'=> 'Kolom FOTO wajib diisi',
            'foto.mimes'=> 'FOTO yang diperbolehkan hanya JPG, JPEG, PNG, atau GIF',
        ]);

        $foto_file=$request->file('foto');
        $foto_ekstensi=$foto_file->extension();
        $foto_nama=date('ymdhis') . "." .$foto_ekstensi;
        $foto_file->move(public_path('foto'),$foto_nama);

        $data=[
            'nama_kelas'=>$request->input('nama_kelas'),
            'walikelas'=>$request->input('walikelas'),
            'jumlah_siswa'=>$request->input('jumlah_siswa'),
            'foto'=>$foto_nama
        ];
        kelas::create($data);
        return redirect('kelas')->with('success','Data Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $data=kelas::where('id',$id)->first();
        return view('kelas/detail')->with('data',$data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $data=kelas::where('id',$id)->first();
        return view('/kelas/edit')->with('data',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'nama_kelas'=>'required',
            'walikelas'=>'required',
            'jumlah_siswa'=>'required|numeric',

        ],[
            'nama_kelas.required'=> 'Kolom NAMA KELAS wajib diisi',
            'walikelas.required'=> 'Kolom WALI KELAS wajib diisi',
            'jumlah_siswa.numeric'=> 'Kolom JUMLAH SISWA wajib diisi dengan ANGKA',
        ]);
        $data=[
            'nama_kelas'=>$request->input('nama_kelas'),
            'walikelas'=>$request->input('walikelas'),
            'jumlah_siswa'=>$request->input('jumlah_siswa'),
        ];
        
        if($request->hasFile('foto')){
            $request->validate([
            'foto'=>'required|mimes:jpeg,jpg,png,gif'
        ],[
            'foto.mimes'=>'Foto yang diperbolehkan hanya JPG, JPEG, PNG, atau GIF!'
        ]);
        $foto_file=$request->file('foto');
        $foto_ekstensi=$foto_file->extension();
        $foto_nama=date('ymdhis') . "." .$foto_ekstensi;
        $foto_file->move(public_path('foto'),$foto_nama);

        //jika fto sdh ada maka akan dihapus dan diganti dengan yang baru
        $data_foto=kelas::where('id',$id)->first();
        File::delete(public_path('foto'). '/' . $data_foto->foto);

        $data['foto']= $foto_nama;
    }
        kelas::where('id',$id)->update($data);
        return redirect('/kelas')->with('success','Data Berhasil DiUpdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $data=kelas::where('id',$id)->first();
        File::delete(public_path('foto').'/'.$data->foto);
        kelas::where('id',$id)->delete();
        return redirect('/kelas')->with('success','Data Berhasil DiHapus');
    }
}
