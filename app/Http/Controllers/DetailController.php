<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bidangpekerjaan;
use App\Jenispekerjaan;
use App\Profesi;
use App\Pendidikan;
use App\Pertemuan;
use App\Personal;
use App\Provinces;
use App\Kkj;
use App\Keanggotaan;
use App\Diserahkan;
use App\Cabang;
use App\Kegiatan;
use App\Rayon;
use App\Komisi;
use App\Saldo;
use App\Subrayon;
use App\Pelayanan;
use App\Jabatanpelayanan;
use App\Pelayankegiatan;
use App\Dokumen;
use DB;

class DetailController extends Controller
{
    //
    public function detail($idpersonal)
    {
        
        $bp = Bidangpekerjaan::all();
        $jp = Jenispekerjaan::all();
        $prof = Profesi::all();
        $personal = Personal::where('idpersonal',$idpersonal)->first();
        $provinces=Provinces::all();
        $per = Personal::where('nokkj','!=',$personal->nokkj)->orWhereNull('nokkj')->get();
        $kkj = Personal::where('nokkj',$personal->nokkj)->get();
        $pendi = Pendidikan::where('idpersonal',$personal->idpersonal)->get();
        $kea = Keanggotaan::where('idpersonal',$personal->idpersonal)->get();
        $diserahkan = Diserahkan::where('idpersonal',$personal->idpersonal)->get();
        $perso = Personal::all();
        $cabran = Cabang::all();
        $allkkj = Kkj::all();
        $raper= Rayon::all();
        $subray= Subrayon::all();
        $kegiatan= Kegiatan::all();
        $komisi = Komisi::where('idpersonal',$personal->idpersonal)->get();
        $pelayanana = Pelayanan::where('idpersonal',$personal->idpersonal)->get();
        $jabpel = Jabatanpelayanan::where('idpersonal',$personal->idpersonal)->get();
        $pelakeg = Pelayankegiatan::where('idpersonal',$personal->idpersonal)->get();
        $pelakegi = Pelayankegiatan::where('idpersonal','!=',$personal->idpersonal)->get();
        $saldo = Saldo::where('jenis_transaksi','=','Badge Hilang')->where('idpersonal',$idpersonal)->get();
        $pertemuan = Pertemuan::all();
        $dokumen = Dokumen::where('idpersonal', $personal->idpersonal)->first();

     return view('frontend/detail/index',compact('bp','jp','prof','pendidikan','personal','provinces','per','kkj','pendi','kea','diserahkan','perso','cabran','allkkj','raper','komisi','subray','pelayanana','jabpel','kegiatan','pelakeg','pelakegi','saldo','pertemuan','dokumen'));
    }
}
// SELECT id, nama, email FROM pegawai WHERE email = NULL;  
