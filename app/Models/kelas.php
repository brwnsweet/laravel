<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class kelas extends Model
{
    //
    protected $table = "kelas";
    protected $fillable = ["nama_kelas","walikelas","jumlah_siswa","foto"];
}
