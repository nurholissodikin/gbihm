<?php

namespace App\Http\Controllers;

use App\Jabatanpelayanan;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Saldo;
use App\Personal;
use App\Rayon;
use App\Kkj;
use App\Subrayon;
use App\Cabang;
use Config;
use App\Pendidikan;
use App\Pelayanan;
use Mail;
use Alert;
use Crypt;
use App\Mail\PengerjaEmail;
use App\Provinces;
use Auth;
use Excel;
use App\Imports\PengerjaImport;
use App\Profesi;
use Image;
use File;

class JabatanpelayananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $pt = new Jabatanpelayanan;
        $pt->idpersonal=$request->idpejab;
        $pt->tempat=$request->tempat;
        $pt->sejak=$request->tgl_awal;
        $pt->sampai=$request->tgl_akhir;
        $pt->pengerja=$request->pengerja;
        $pt->noreferensi=$request->noref;
        $pt->nosertifikat=$request->noser;
        $pt->hadirpertemuan=$request->hp;
        $pt->idpelayanan=$request->idpelayanan;
        $pt->tgl=$request->lantik;
        $pt->jabut = $request->jabut;
        $pt->jabatan=$request->jabatan;
        $pt->status=$request->status;
        $pt->idrayon=$request->rayon;
        $pt->idsubrayon=$request->subrayon;
        $pt->idcabangranting=$request->cabang;
        if ($request->hasFile('djp')) {
            $person = $request->file('djp');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/rohani/jabatanpelayanan/dokumen';
                $person->move($destinationPath, $filename);
                $pt->dokumen=$filename;
        }
        $pt->save();
        return $pt;

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Jabatanpelayanan  $jabatanpelayanan
     * @return \Illuminate\Http\Response
     */
    public function show(Jabatanpelayanan $jabatanpelayanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Jabatanpelayanan  $jabatanpelayanan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $jabpel = Jabatanpelayanan::FindOrfail($id);
        return $jabpel;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Jabatanpelayanan  $jabatanpelayanan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $pt = Jabatanpelayanan::FindOrfail($id);
        
        $pt->idpersonal=$request->idpejab;
        $pt->tempat=$request->tempat;
        $pt->sejak=$request->tgl_awal;
        $pt->sampai=$request->tgl_akhir;
        $pt->pengerja=$request->pengerja;
        $pt->noreferensi=$request->noref;
        $pt->nosertifikat=$request->noser;
        $pt->hadirpertemuan=$request->hp;
        $pt->idpelayanan=$request->idpelayanan;
        $pt->tgl=$request->lantik;
        $pt->jabut = $request->jabut;
        $pt->jabatan=$request->jabatan;
        $pt->status=$request->status;
        $pt->idrayon=$request->rayon;
        $pt->idsubrayon=$request->subrayon;
        $pt->idcabangranting=$request->cabang;
        if ($request->hasFile('dok')) {
            $person = $request->file('dok');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/rohani/jabatanpelayanan/dokumen';
                $person->move($destinationPath, $filename);
                $pt->dok=$filename;
        }
        $pt->save();
        return $pt;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Jabatanpelayanan  $jabatanpelayanan
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        //
        $pt = Jabatanpelayanan::FindOrfail($id);
        $pt->delete();
         return $pt;
    }
    public function renew(Request $request){

        $tgl = Carbon::now();
        $pt = new Jabatanpelayanan;
        $pt->idpersonal=$request->idpejab;
        $pt->tempat=$request->tempat;
        $pt->sejak=$request->tgl_awal;
        $pt->sampai=$request->tgl_akhir;
        $pt->pengerja=$request->pengerja;
        $pt->noreferensi=$request->noref;
        $pt->nosertifikat=$request->noser;
        $pt->hadirpertemuan=$request->hp;
        $pt->idpelayanan=$request->idpelayanan;
        $pt->tgl=$request->lantik;
        $pt->jabut = $request->jabut;
        $pt->jabatan=$request->jabatan;
        $pt->status=$request->status;
        $pt->idrayon=$request->rayon;
        $pt->idsubrayon=$request->subrayon;
        $pt->idcabangranting=$request->cabang;
        if ($request->hasFile('djp')) {
            $person = $request->file('djp');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/rohani/jabatanpelayanan/dokumen';
                $person->move($destinationPath, $filename);
                $pt->dokumen=$filename;
        }
        $pt->save();

        $saldo = new Saldo;
        $saldo->tanggal = $tgl;
        $saldo->jumlah = "35000";
        $saldo->jenis_transaksi = "Renew";
        $saldo->idcabangranting = $request->cabang;
        $saldo->idsubrayon = $request->subrayon;
        $saldo->idrayon = $request->rayon;
        $saldo->idpersonal=$request->idpejab;
        $saldo->save();
        $t_saldo=0;
//         $saldoa= Saldo::where('idcabangranting',$request->cabang)->get();
//             foreach ($saldoa as $key => $value) {
//                 if($value->jenis_transaksi == 'Setor'){
//                     $t_saldo = $t_saldo + $value->jumlah;
//                 }else if($value->jenis_transaksi == 'Badge Hilang'){
//                     $t_saldo = $t_saldo - $value->jumlah;
//                 }else if($value->jenis_transaksi == 'Renew'){
//                     $t_saldo = $t_saldo - $saldoa->jumlah;
//                 }
//             }
         
// dd($t_saldo);
        return $pt;
    }
     public function badge(Request $request){

        $tgl = Carbon::now();
        $pt = new Jabatanpelayanan;
        $pt->idpersonal=$request->idpejab;
        $pt->tempat=$request->tempat;
        $pt->sejak=$request->tgl_awal;
        $pt->sampai=$request->tgl_akhir;
        $pt->pengerja=$request->pengerja;
        $pt->noreferensi=$request->noref;
        $pt->nosertifikat=$request->noser;
        $pt->hadirpertemuan=$request->hp;
        $pt->idpelayanan=$request->idpelayanan;
        $pt->tgl=$request->lantik;
        $pt->jabut = $request->jabut;
        $pt->jabatan=$request->jabatan;
        $pt->status=$request->status;
        $pt->idrayon=$request->rayon;
        $pt->idsubrayon=$request->subrayon;
        $pt->idcabangranting=$request->cabang;
        if ($request->hasFile('djp')) {
            $person = $request->file('djp');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/rohani/jabatanpelayanan/dokumen';
                $person->move($destinationPath, $filename);
                $pt->dokumen=$filename;
        }
        $pt->save();

        $saldo = new Saldo;
        $saldo->idpersonal=$request->idpejab;
        $saldo->tanggal = $tgl;
        $saldo->jumlah = "35000";
        $saldo->jenisbadge = $request->jenis;
        $saldo->jenis_transaksi = "Badge Hilang";
        $saldo->idcabangranting = $request->cabang;
        $saldo->idsubrayon = $request->subrayon;
        $saldo->idrayon = $request->rayon;
      
        $saldo->save();
    }

    public function pengerja()
    {
         $jabpel = Jabatanpelayanan::all();
         return view('frontend.modul.pengerja.index', compact('jabpel'));
    }
    public function edit_pengerja($id)
    {

        $jabpel = Jabatanpelayanan::FindOrfail($id);
        $raper = Rayon::all();
        $subray = Subrayon::all();
        $cabran = Cabang::all();
        $perso = Personal::all();
        $post_cats = array();
        return view('frontend.modul.pengerja.edit', compact('jabpel','perso','raper','subray','cabran','post_cats'));
    }

    public function detail_pengerja($id)
    {
        $jabpel = Jabatanpelayanan::FindOrfail($id);
        return view('frontend.modul.pengerja.detail', compact('jabpel'));
    }
     public function update_pengerja(Request $request, $id)
    {
        //
        $pt = Jabatanpelayanan::FindOrfail($id);
        
        $pt->idpersonal=$request->idpersonal;
        $pt->tempat=$request->tempat;
        $pt->sejak=$request->tgl_awal;
        $pt->sampai=$request->tgl_akhir;
        $pt->pengerja=$request->pengerja;
        $pt->noreferensi=$request->noref;
        $pt->nosertifikat=$request->noser;
        $pt->hadirpertemuan=$request->hp;
        $pt->idpelayanan=$request->idpelayanan;
        $pt->tgl=$request->lantik;
        $pt->jabut = $request->jabut;
        $pt->jabatan=$request->jabatan;
        $pt->status=$request->status;
        $pt->idrayon=$request->rayon;
        $pt->idsubrayon=$request->subrayon;
        $pt->idcabangranting=$request->cabang;
        if ($request->hasFile('dok')) {
            $person = $request->file('dok');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/rohani/jabatanpelayanan/dokumen';
                $person->move($destinationPath, $filename);
                $pt->dok=$filename;
        }
        $pt->save();
        return redirect('modul/pengerja');
    }
    // public function total_saldo()
    // {
        
    // }
    public function storedata(Request $request)
    {
        //VALIDASI
        $this->validate($request, [
            'file' => 'required|mimes:xls,xlsx'
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file'); //GET FILE
            Excel::import(new PengerjaImport, $file); //IMPORT FILE 

            return redirect()->back()->with(['success' => 'Upload success']);
        }  
        return redirect()->back()->with(['error' => 'Please choose file before']);
    }


    public function mdpj_pengerja_store(Request $request)
    {
      

         $user = Auth::user();
        if($user->role->name == 'Pelayan'){
            $this->validate($request,[
                'noktp' => 'unique:personal,ktpid,'.$request->noktp.',idpersonal|nullable'
            ]);
            $personal = Personal::find($request->idpersonal);
        }
        else{
            $tahun = $request->input('tala');
            $pisah = explode('-', $tahun);

            $tgl = $pisah[2];
            $bln = $pisah[1];
            $thn = $pisah[0];

            $ayeuna = Carbon::now();
            $x = $ayeuna->format('Y-m-d');
            $pisaha = explode('-', $x);
            $tgla = $pisaha[2];
        // dd($tgla);
            if ($request->jk == 'P') {
                $j = 3;
            }else
            {
                $j = 1;
            }

            $b= Personal::all();
            $count=count($b);
            $idp=$count+1;

            $year = substr( $thn, -2);
        // // dd($year);

            $id = $tgla.$year.$j.$bln.$tgl.$idp;
        // dd($id);
            $this->validate($request,[
                'noktp' => 'unique:personal,ktpid,'.$request->noktp
            ]);

            $personal = new Personal;
            $personal->idpersonal = $id;

        }
       
        if($request->hasFile('urlphoto')){
            $picture = $request->file('urlphoto');
            $filename = "picture_".str_random(6).'.' . $picture->getClientOriginalExtension();
            //thumb
            $thumb=Image::make($picture)->resize(200, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $c_thumb = Image::canvas(150, 150);
            $c_thumb->insert($thumb, 'center');
            $c_thumb->save( public_path('assets/foto/thumb/' . $filename ));
            //cover
            $cover=Image::make($picture)->resize(624, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $cover->save( public_path('assets/foto/' . $filename ));
            $personal->urlphoto = $filename; 
            $personal->save();
        }
        
        if ($request->hasFile('dok_ktp')) {
            $person = $request->file('dok_ktp');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/personal/dokumen_ktp';
                $person->move($destinationPath, $filename);
                $personal->dokumen_ktp=$filename;
        }

        if ($request->hasFile('dok_kkj')) {
            $person = $request->file('dok_kkj');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/personal/dokumen_kkj';
                $person->move($destinationPath, $filename);
                $personal->dok_kkj=$filename;
        }      
         if ($request->hasFile('dok_baptis')) {
            $person = $request->file('dok_baptis');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/personal/dokumen_baptis';
                $person->move($destinationPath, $filename);
                $personal->dok_baptis=$filename;
        }             
       
        $personal->ktpid = $request->noktp;
        $personal->notelp = $request->notelp;
        $personal->nohp = $request->nohp;
        $personal->tempatlahir = $request->tela;
        $personal->tanggallahir = $request->tala;
        $personal->namalengkap = $request->namalengkap;
        $personal->namadepan = $request->namadepan;
        $personal->namatengah = $request->namatengah;
        $personal->namabelakang = $request->namabelakang;
        $personal->namapanggilan = $request->namapanggilan;
        $personal->jeniskelamin = $request->jk;
        $personal->golongandarah = $request->gol;
        $personal->alamattinggal = $request->alamat;
        $personal->rtrw = $request->rtrw;
        $personal->kelurahan = $request->villages;
        $personal->kecamatan = $request->districts;
        $personal->kabkota = $request->regencies;
        $personal->provinsi = $request->provinces;
        $personal->kodepos = $request->kodepos;
        $personal->email = $request->email;
        $personal->agama = $request->agama;
        $personal->statusperkawinan = $request->sk;
        $personal->sejaktanggalstatuskawin = $request->tsk;
        $personal->keanggotaan=$request->inteks;
        $personal->baptisrohkudus=$request->baptisrohkudus;
        $personal->hubkeluarga=$request->keluarga;
        $personal->nolain=$request->nolain;
        $personal->idprofesi=$request->prof;
        $personal->save();

        
        $last_kkj = Kkj::orderBy('id','DESC')->first();
        $idk = ($last_kkj != null) ? $last_kkj->id+1: '1';
        $kkj = new Kkj;
        $kkj->id=$idk;
        $kkj->idpersonal=$personal->idpersonal;
        $kkj->nokkj=$request->nokkj;
        $kkj->save();


        $last_pen = Pendidikan::orderBy('idpendidikan','DESC')->first();
        $id = ($last_pen != null) ? $last_pen->idpendidikan+1: '1';
        $pendidikan = new Pendidikan;
        $pendidikan->idpendidikan=$id;
        $pendidikan->idpersonal=$personal->idpersonal;
        $pendidikan->tingkatpendidikan=$request->pendidikan;
        $pendidikan->save();
        
        $pelayanan = new Pelayanan;
        $pelayanan->jenisbadge=$request->jenis;
        if ($request->hasFile('dok_somkom')) {
            $person = $request->file('dok_somkom');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/rohani/pelayanan/dokumen';
                $person->move($destinationPath, $filename);
                $pelayanan->dokumen=$filename;
        }    
        $pelayanan->nosertifikat=$request->no_somkom;
        $pelayanan->tanggal=$request->tgl_sokom;
        $pelayanan->sejak=$request->sejak_sokom;
        $pelayanan->idpersonal=$personal->idpersonal;

        $pelayanan->save();

        $pt = new Jabatanpelayanan;
        $pt->idpersonal=$personal->idpersonal;
        $pt->tempat=$request->tempat;
        $pt->jabatan=$request->jabatan;
        $pt->status=$request->status;
        $pt->idrayon=$request->rayon;
        $pt->idsubrayon=$request->subrayon;
        $pt->idcabangranting=$request->cabang;
        $pt->idpelayanan=$pelayanan->id;
        $pt->idrayon=$request->idrayon;
        $pt->sejak=$request->tgl_awal;
        $pt->sampai=$request->tgl_akhir;
        // $pt->idsubrayon=$request->idsubrayon;
        // if($user->role->name == 'Pelayan'){
        //     $pt->idcabangranting=$user->cabang_id;
        // }
        // else{
        $pt->idcabangranting=$request->idcabang;
        // }
        $pt->jabatankependetaan=$request->jake;
        $pt->jenis=$request->jenis;
        $pt->approve="0";
        $pt->status_badge="0";
 
        $pt->save();
        
        if (Auth::user()->role->name == 'Pelayan') {
          return redirect('mdpj/cetak_badge');
        }
        else {
          return redirect('mdpj/badge');
        }

    }

     public function mdpj_edit_pengerja($id)
    {

        $jabpel = Jabatanpelayanan::FindOrfail($id);
        $raper = Rayon::all();
        $subray = Subrayon::all();
        $cabran = Cabang::all();
        $perso = Personal::all();
        $post_cats = array();
        return view('frontend.badge.edit.pengerja', compact('jabpel','perso','raper','subray','cabran','post_cats'));
    }

     public function mdpj_update_pengerja(Request $request, $id)
    {
        //
        $pt = Jabatanpelayanan::FindOrfail($id);
        
        $pt->idpersonal=$request->idpersonal;
        $pt->tempat=$request->tempat;
        $pt->sejak=$request->tgl_awal;
        $pt->sampai=$request->tgl_akhir;
        $pt->pengerja=$request->pengerja;
        $pt->noreferensi=$request->noref;
        $pt->nosertifikat=$request->noser;
        $pt->idpelayanan=$request->idpelayanan;
        $pt->tgl=$request->lantik;
        $pt->jabut = $request->jabut;
        $pt->jabatan=$request->jabatan;
        $pt->idrayon=$request->rayon;
        $pt->idsubrayon=$request->subrayon;
        $pt->idcabangranting=$request->cabang;
        if ($request->hasFile('dok')) {
            $person = $request->file('dok');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/rohani/jabatanpelayanan/dokumen';
                $person->move($destinationPath, $filename);
                $pt->dok=$filename;
        }
        $pt->save();
        return redirect('mdpj/badge');
    }


    public function mdpj_cetak_pengerja(Request $request,$id)
    {
        $tgl= Carbon::now();
        $pt = Jabatanpelayanan::FindOrfail($id);

        $saldo = new Saldo;
        $saldo->idpersonal=$pt->idpersonal;
        $saldo->tanggal = $tgl;
        $saldo->jumlah = "35000";
        $saldo->jenisbadge = $request->jenis;
        $saldo->jenis_transaksi = "Renew";
        $saldo->idrayon = $request->rayon;
     
        $saldo->save();
        return redirect('mdpj/badge');
    }

     public function mdpj_detail_pengerja($id)
    {
        $jabpel = Jabatanpelayanan::FindOrfail($id);
        $provinces = Provinces::all();
        $prof = Profesi::all();
        $personal = Personal::all();
        $rayon = Rayon::all();
        $kkj = Kkj::where('idpersonal',$jabpel->idpersonal)->first();
        $pelayanan = Pelayanan::where('idpersonal',$jabpel->idpersonal)->first();
        return view('frontend.badge.detail.pengerja', compact('jabpel','provinces','prof','personal','rayon','kkj','pelayanan'));
    }
     public function mdpj_detail_cool($id)
    {
        $jabpel = Jabatanpelayanan::FindOrfail($id);
        $provinces = Provinces::all();
        $prof = Profesi::all();
        $personal = Personal::all();
        $rayon = Rayon::all();
        $kkj = Kkj::where('idpersonal',$jabpel->idpersonal)->first();
        $pelayanan = Pelayanan::where('idpersonal',$jabpel->idpersonal)->first();
        return view('frontend.badge.detail.cool', compact('jabpel','provinces','prof','personal','rayon','kkj','pelayanan'));
    }
   

    public function mdpj_verif()
    {           

         $decryptedEmail = Crypt::decrypt(request('token'));
        $personal = Personal::where('idpersonal',$decryptedEmail)->first();

        if ($personal->verifikasi == '1') {
            // persona is already active, do something

            return "Email Sudah Terverifikasi";
        
        }
        // otherwise change persona status to "activated"
        // $personal->verifikasi = '1';
        // $personal->save();
       
        return view('mails.demo_plain',compact('personal'));
    }


    public function mdpj_approve($id)
    {           

        $pengerja = Jabatanpelayanan::findOrFail($id);
        $pengerja->approve = '1';
        $pengerja->save();
        
        return redirect()->back();
    }
    public function kirim_mdpj_approve($id)
    {           

        $pengerja = Jabatanpelayanan::findOrFail($id);
        $pengerja->approve_gembala_cabang = '0';
        $pengerja->save();
        return redirect()->back();
    }
    
    public function kirim_ulang_email($id)
    {
        $personal = Personal::findOrFail($id);
         Mail::to($personal->email)->send(new PengerjaEmail($personal));
         $personal->save();
      
         return view('mails.lanjutan',compact('personal'));
    }

    public function person_upd(Request $request, $id){


        $personal = Personal::find($request->idpersonal);
        
        if($request->hasFile('urlphoto')){
            $picture = $request->file('urlphoto');
            $filename = "picture_".str_random(6).'.' . $picture->getClientOriginalExtension();
            //thumb
            $thumb=Image::make($picture)->resize(200, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $c_thumb = Image::canvas(150, 150);
            $c_thumb->insert($thumb, 'center');
            $c_thumb->save( public_path('assets/foto/thumb/' . $filename ));
            //cover
            $cover=Image::make($picture)->resize(624, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $cover->save( public_path('assets/foto/' . $filename ));
            $personal->urlphoto = $filename; 
            $personal->save();
        }
       
        if ($request->hasFile('dok_ktp')) {
            $person = $request->file('dok_ktp');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/personal/dokumen_ktp';
                $person->move($destinationPath, $filename);
                $personal->dokumen_ktp=$filename;
        }

        if ($request->hasFile('dok_kkj')) {
            $person = $request->file('dok_kkj');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/personal/dokumen_kkj';
                $person->move($destinationPath, $filename);
                $personal->dok_kkj=$filename;
        }      
        if ($request->hasFile('dok_baptis')) {
            $person = $request->file('dok_baptis');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/personal/dokumen_baptis';
                $person->move($destinationPath, $filename);
                $personal->dok_baptis=$filename;
        }             
       
        $personal->ktpid = $request->noktp;
        $personal->notelp = $request->notelp;
        $personal->nohp = $request->nohp;
        $personal->tempatlahir = $request->tela;
        $personal->tanggallahir = $request->tala;
        $personal->namalengkap = $request->namalengkap;
        $personal->namadepan = $request->namadepan;
        $personal->namatengah = $request->namatengah;
        $personal->namabelakang = $request->namabelakang;
        $personal->namapanggilan = $request->namapanggilan;
        $personal->jeniskelamin = $request->jk;
        $personal->golongandarah = $request->gol;
        $personal->alamattinggal = $request->alamat;
        $personal->rtrw = $request->rtrw;
        $personal->kelurahan = $request->villages;
        $personal->kecamatan = $request->districts;
        $personal->kabkota = $request->regencies;
        $personal->provinsi = $request->provinces;
        $personal->kodepos = $request->kodepos;
        $personal->email = $request->email;
        $personal->agama = $request->agama;
        $personal->statusperkawinan = $request->sk;
        $personal->sejaktanggalstatuskawin = $request->tsk;
        $personal->keanggotaan=$request->inteks;
        $personal->baptisrohkudus=$request->baptisrohkudus;
        $personal->hubkeluarga=$request->keluarga;
        $personal->nolain=$request->nolain;
        $personal->idprofesi=$request->prof;
       
        $personal->save();
       
        $kkj = Kkj::find($request->id_kkj);
       
        $kkj->idpersonal=$personal->idpersonal;
        $kkj->nokkj=$request->nokkj;
        $kkj->save();


        $pendidikan = Pendidikan::find($request->id_pendidikan);
        // $pendidikan->idpendidikan=$id;
        $pendidikan->idpersonal=$personal->idpersonal;
        $pendidikan->tingkatpendidikan=$request->pendidikan;
        $pendidikan->save();
        
        $pelayanan = Pelayanan::find($request->id_pelayanan);

        $pelayanan->jenisbadge=$request->jenis;
        if ($request->hasFile('dok_somkom')) {
            $person = $request->file('dok_somkom');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/rohani/pelayanan/dokumen';
                $person->move($destinationPath, $filename);
                $pelayanan->dokumen=$filename;
        }    
        $pelayanan->nosertifikat=$request->no_somkom;
        $pelayanan->tanggal=$request->tgl_sokom;
        $pelayanan->sejak=$request->sejak_sokom;
        $pelayanan->idpersonal=$personal->idpersonal;
        $pelayanan->save();

        $pt =  Jabatanpelayanan::findOrfail($id);
        $pt->idpersonal=$personal->idpersonal;
        $pt->tempat=$request->tempat;
        $pt->jabatan=$request->jabatan;
        $pt->status=$request->status;
        $pt->idpelayanan=$pelayanan->id;
        $pt->idrayon=$request->idrayon;
        $pt->sejak=$request->tgl_awal;
        $pt->sampai=$request->tgl_akhir;
        $pt->idsubrayon=$request->idsubrayon;
        
        $pt->idcabangranting=$request->idcabang;
      
        $pelayanan->nosertifikat=$request->nosertifikat;
        $pt->jabatankependetaan=$request->jake;
        $pt->jenis=$request->jenis;
 
        $pt->save();

        return redirect()->back();
    }
}
