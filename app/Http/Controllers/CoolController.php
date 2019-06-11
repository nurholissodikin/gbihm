<?php

namespace App\Http\Controllers;

use App\Cool;
use App\Personal;   
use App\Tipecool;
use App\Provinces;
use App\Anggotacool;
use App\Absensicool;
use Carbon\Carbon;
use App\Pelayanan;
use App\Jabatanpelayanan;
use App\Coolpengerja;
use App\Pendidikan;
use Config;
use Excel;
use App\Mail\CoolEmail;
use Mail;
use Alert;
use Auth;
use Crypt;
use App\Imports\CoolImport;
use Illuminate\Http\Request;

class CoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cool = Cool::all();
        return view('frontend.modul.cool.index',compact('cool','aa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $tipecool= Tipecool::all();
        $provinsi= Provinces::all();
        $personal= Personal::all();
        return view('frontend.modul.cool.create',compact('tipecool','personal','provinsi'));
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
        $cool = new Cool;
        $cool->idtipecool=$request->tipecool;
        $cool->gembala=$request->gembala;
        $cool->pengerja=$request->pengerja;
        $cool->lokasi=$request->lokasi;
        $cool->jabatan=$request->jabatan;
        $cool->kabkota=$request->kabkota;
        $cool->provinsi=$request->provinsi;
        $cool->kodepos=$request->kodepos;
        $cool->usercreated=$request->created;
        $cool->save();
        return redirect()->route('cool.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cool  $cool
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $cool= Cool::findOrFail($id);
        $anggota= Anggotacool::where('idcool',$id)->get();
        $provinsi= Provinces::all();
        $tipecool= Tipecool::all();
        $personal= Personal::all();
        return view('frontend.modul.cool.detail',compact('tipecool','personal','cool','provinsi','anggota'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cool  $cool
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $cool= Cool::findOrFail($id);
        $provinsi= Provinces::all();
        $tipecool= Tipecool::all();
        $personal= Personal::all();
        return view('frontend.modul.cool.edit',compact('tipecool','personal','cool','provinsi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cool  $cool
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $cool= Cool::findOrFail($id);
        $cool->idtipecool=$request->tipecool;
        $cool->gembala=$request->gembala;
        $cool->pengerja=$request->pengerja;
        $cool->jabatan=$request->jabatan;
        $cool->lokasi=$request->lokasi;
        $cool->kabkota=$request->kabkota;
        $cool->provinsi=$request->provinsi;
        $cool->kodepos=$request->kodepos;
        $cool->userupdated=$request->updated;
        $cool->save();
        return redirect()->route('cool.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cool  $cool
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $cool= Cool::findOrFail($id);
        $cool->delete();
        return $cool;
    }
    public function anggota($id){
        $cool= Cool::findOrFail($id);
        $personal= Personal::all();
        $anggota= Anggotacool::where('idcool',$id)->get();
        return view('frontend.modul.cool.anggota.index',compact('anggota','cool','personal'));
    }

    public function anggota_post(Request $request)
    {
        //
        $anggota = new Anggotacool;
        $anggota->idpersonal=$request->personal;
        $anggota->jabatan_anggota=$request->jabatan;
        $anggota->kategori=$request->kategori;
        $anggota->idcool=$request->idcool;
        $anggota->usercreated=$request->created;
        $anggota->save();
        return redirect('cool/anggota/'.$request->idcool);
    }
    public function anggota_edit($id){
        $personal= Personal::all();
        $anggota= Anggotacool::findOrFail($id);
        return view('frontend.modul.cool.anggota.edit',compact('anggota','personal'));
    }
    public function anggota_detail($id){
        $anggota= Anggotacool::findOrFail($id);
        return view('frontend.modul.cool.anggota.detail',compact('anggota'));
    }
    public function anggota_update(Request $request,$id)
    {
        //
        $anggota = Anggotacool::findOrFail($id);
        $anggota->idpersonal=$request->personal;
        $anggota->jabatan_anggota=$request->jabatan;
        $anggota->kategori=$request->kategori;
        $anggota->idcool=$request->idcool;
        $anggota->userupdated=$request->updated;
        $anggota->save();
        return redirect('cool/anggota/'.$request->idcool);
    }
    public function anggota_delete($id)
    {
        //
        $anggota= Anggotacool::findOrFail($id);
        $anggota->delete();
        return $anggota;
    }

    public function absensi($id){
        $cool= Cool::findOrFail($id);
        $absensi= Absensicool::where('idcool',$id)->get();
        return view('frontend.modul.cool.absensi.indexa',compact('absensi','cool'));
    }
    public function absensi_post(Request $request)
    {
        $anggota = new Absensicool;
        $anggota->tanggal=$request->tanggal;
        $anggota->kubu_doa=$request->kubu_doa;
        $anggota->jemaat=$request->jemaat;
        $anggota->idcool=$request->idcool;
        $anggota->non_jemaat=$request->non_jemaat;
        $anggota->persembahan=$request->persembahan;
        $anggota->gembala=$request->gembala;
        $anggota->lokasi=$request->lokasi;
        $anggota->jeniscool=$request->jeniscool;
        $anggota->save();
       return redirect()->back();
    }
    public function absensi_edit($id){
        $absensi= Absensicool::findOrFail($id);
        return view('frontend.modul.cool.absensi.edita',compact('absensi'));
    }
    public function absensi_detail($id){
        $absensi= Absensicool::findOrFail($id);
        return view('frontend.modul.cool.absensi.detaila',compact('absensi'));
    }
    public function absensi_update(Request $request,$id)
    {
        $anggota = Absensicool::findOrFail($id);
        $anggota->tanggal=$request->tanggal;
        $anggota->kubu_doa=$request->kubu_doa;
        $anggota->jemaat=$request->jemaat;
        $anggota->idcool=$request->idcool;
        $anggota->non_jemaat=$request->non_jemaat;
        $anggota->persembahan=$request->persembahan;
        $anggota->gembala=$request->gembala;
        $anggota->lokasi=$request->lokasi;
        $anggota->jeniscool=$request->jeniscool;
        $anggota->save();
       return redirect('cool/absensi/'.$request->idcool);
    }
    public function absensi_delete($id){
        $absensi= Absensicool::findOrFail($id);
        $absensi->delete();
        return $absensi;
    }
    public function histori($id){
        $cool= Cool::findOrFail($id);
        $anggota= Anggotacool::where('idcool',$id)->get();
        return view('frontend.modul.cool.histori.index',compact('anggota','cool'));
    }
    public function data_history(){
        $cool= Cool::all();
        return view('frontend.modul.cool.histori.cool',compact('cool'));
    }
    public function data_absensi(){
        $cool= Cool::all();
        $absensi= Absensicool::all();
        return view('frontend.modul.cool.absensi.absensi',compact('absensi','cool'));
    }
    public function get_cool($id){
        $cool = Cool::where('id',$id)->first();

        $auto = [];
        $auto['lokasi'] = $cool->lokasi;
        $auto['tipecool'] = $cool->tipecool->tipecool;
        return $auto;
    }
    public function data_absensi_edit($id){
        $absensi= Absensicool::findOrFail($id);
        $cool = Cool::all();
        return view('frontend.modul.cool.absensi.edit',compact('absensi','cool'));
    }
    public function data_absensi_update(Request $request,$id)
    {
        $anggota = Absensicool::findOrFail($id);
        $anggota->tanggal=$request->tanggal;
        $anggota->kubu_doa=$request->kubu_doa;
        $anggota->jemaat=$request->jemaat;
        $anggota->idcool=$request->idcool;
        $anggota->non_jemaat=$request->non_jemaat;
        $anggota->persembahan=$request->persembahan;
        $anggota->gembala=$request->gembala;
        $anggota->lokasi=$request->lokasi;
        $anggota->jeniscool=$request->jeniscool;
        $anggota->save();
       return redirect('cool/data/absensi/');
    }
    public function cool_pengerja_store(Request $request)
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

        if ($request->hasFile('urlphoto')) {
            $person = $request->file('urlphoto');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/foto';
                $person->move($destinationPath, $filename);
                $personal->urlphoto=$filename;
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
       
        $personal->tanggallahir = $request->tanggallahir;
        $personal->kabkota=$request->kota;
        $personal->kodepos=$request->kodepos;
        $personal->email=$request->email;
        $personal->nohp=$request->nohp;
        $personal->baptisrohkudus=$request->baptisrohkudus;
        $personal->statusperkawinan=$request->statuspernikahan;
        $personal->kom=$request->kom;
        $personal->save();

        // Mail::to($personal->email)->send(new CoolEmail($personal));

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
        $pelayanan->idpersonal=$personal->idpersonal;

        $pelayanan->save();

        $pt = new Jabatanpelayanan;
        $pt->idpersonal=$personal->idpersonal;
        $pt->tempat=$request->tempat;
        $pt->jabatan=$request->jabatan;
        $pt->status=$request->status;
        $pt->idrayon=$request->idrayon;
        $pt->idsubrayon=$request->idsubrayon;
        if($user->role->name == 'Pelayan'){
            $pt->idcabangranting=$user->cabang_id;
        }
        else{
        $pt->idcabangranting=$request->idcabang;
        }
        $pt->idpelayanan=$pelayanan->id;
        $pt->jeniscool=$request->jeniscool;
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
    public function storedata(Request $request)
    {
        //VALIDASI
        $this->validate($request, [
            'file' => 'required|mimes:xls,xlsx'
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file'); //GET FILE

            Excel::import(new CoolImport, $file); //IMPORT FILE 
            return redirect()->back()->with(['success' => 'Upload success']);
        }  
        return redirect()->back()->with(['error' => 'Please choose file before']);
    }
    public function mdpj_verif()
    {           

        $decryptedEmail = Crypt::decrypt(request('token'));
        $personal = Personal::whereEmail($decryptedEmail)->first();
        if ($personal->verifikasi == '1') {
            // personal is already active, do something
        }
        // otherwise change personal status to "activated"
        $personal->verifikasi = '1';
        $personal->save();
        // autologin
        
        return redirect('/login');
    }


    public function mdpj_approve($id)
    {           

        $tamu = Jabatanpelayanan::findOrFail($id);
        $tamu->approve = '1';
        $tamu->save();
        // autologin
        
        return redirect()->back();
    }

   

    public function cool_pengerja_upd(Request $request,$id)
    {

         $user = Auth::user();

            $this->validate($request,[
                'noktp' => 'unique:personal,ktpid,'.$request->noktp.',idpersonal|nullable'
            ]);
            $personal = Personal::find($request->idpersonal);
        

        

        if ($request->hasFile('urlphoto')) {
            $person = $request->file('urlphoto');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/foto';
                $person->move($destinationPath, $filename);
                $personal->urlphoto=$filename;
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
       
        $personal->tanggallahir = $request->tanggallahir;
        $personal->kabkota=$request->kota;
        $personal->kodepos=$request->kodepos;
        $personal->email=$request->email;
        $personal->nohp=$request->nohp;
        $personal->baptisrohkudus=$request->baptisrohkudus;
        $personal->statusperkawinan=$request->statuspernikahan;
        $personal->kom=$request->kom;
        $personal->save();

        // Mail::to($personal->email)->send(new CoolEmail($personal));

    
        $pendidikan = Pendidikan::where('idpersonal',$personal->idpersonal)->first();
    
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
        $pelayanan->idpersonal=$personal->idpersonal;

        $pelayanan->save();

        $pt =  Jabatanpelayanan::findOrfail($id);
        $pt->idpersonal=$personal->idpersonal;
        $pt->tempat=$request->tempat;
        $pt->jabatan=$request->jabatan;
        $pt->status=$request->status;
        $pt->idrayon=$request->idrayon;
        $pt->idsubrayon=$request->idsubrayon;
        // if($user->role->name == 'Pelayan'){
        //     $pt->idcabangranting=$user->cabang_id;
        // }
        // else{
        $pt->idcabangranting=$request->idcabang;
        // }
        $pt->idpelayanan=$pelayanan->id;
        $pt->jeniscool=$request->jeniscool;
        $pt->jabatankependetaan=$request->jake;
        $pt->jenis=$request->jenis;
    
        $pt->status_badge="0";
        $pt->save();

       return redirect()->back();
    }
}
