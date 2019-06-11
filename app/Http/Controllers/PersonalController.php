<?php

namespace App\Http\Controllers;

use App\Personal;
use Illuminate\Http\Request;

use Carbon\Carbon;
use App\Kkj;
use App\Dokumen;
use App\Baptisanair;
use App\Nikah;
use App\Anak;
use App\Pelayan;
use App\Bidangpekerjaan;

use App\Jenispekerjaan;
use App\Profesi;
use App\Pendidikan;
use App\Provinces;
use App\Keanggotaan;
use App\Diserahkan;
use App\Cabang;
use App\Kegiatan;
use App\Rayon;
use App\Komisi;
use App\Subrayon;
use App\Pelayanan;
use App\Jabatanpelayanan;
use App\Pelayankegiatan;
use App\Saldo;
use App\Pertemuan;
use DB;

class PersonalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $personal= Personal::all();
        return view('frontend.personal.index',compact('personal'));
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
       
        $prof=Profesi::all();
        $biper=Bidangpekerjaan::all();
        $jeper=Jenispekerjaan::all();
        $provinces = Provinces::all();
        $a = $request->all();

        $tahun = $request->input('tala');
        $pisah = explode('-', $tahun);
        $tgl = $pisah[0];
        $bln = $pisah[1];
        $thn = $pisah[2];

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
            'noktp' => 'unique:personal,ktpid,'.$request->noktp.',idpersonal|nullable'
        ]);

        $personal = new Personal;
        $personal->idpersonal = $id;

        if ($request->hasFile('urlphoto')) {
            $person = $request->file('urlphoto');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/foto';
                $person->move($destinationPath, $filename);
                $personal->urlphoto=$filename;
        }
        if ($request->hasFile('dokumen_ktp')) {
            $person = $request->file('dokumen_ktp');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/personal/dokumen_ktp';
                $person->move($destinationPath, $filename);
                $personal->dokumen_ktp=$filename;
        }
        $personal->ktpid = $request->noktp;

        $personal->ktpberlakusd = $request->berlaku;
        
        $personal->nokkj = $request->nokkj;
        $personal->simid = $request->nosim;
        $personal->simberlakusd = $request->berlakusim;
        $personal->passportid = $request->nopas;
        $personal->passportberlakusd = $request->berlakupass;
        $personal->aktalahirid = $request->noakta;
        $personal->namadepan = $request->namadep;
        $personal->namatengah = $request->namateng;
        $personal->namabelakang = $request->namabel;
        $personal->namapanggilan = $request->namapang;
        $personal->gelarawal = $request->geawal;
        $personal->gelartengah = $request->geteng;
        $personal->gelarakhir = $request->geakhir;
        $personal->tempatlahir = $request->tela;
        $personal->tanggallahir = $request->tala;
        $personal->catatanpersonal = $request->caper;
        $personal->namalengkap = $request->nama;
        $personal->jeniskelamin = $request->jk;
        $personal->golongandarah = $request->gol;
        $personal->alamattinggal = $request->alamat;
        $personal->rtrw = $request->rtrw;
        $personal->kelurahan = $request->villages;
        $personal->kecamatan = $request->districts;
        $personal->kabkota = $request->regencies;
        $personal->provinsi = $request->provinces;
        $personal->kodepos = $request->kodepos;
        $personal->googlemapadd = $request->google;
        $personal->latitude = $request->latitude;
        $personal->longitude = $request->longitude;
        $personal->notelp = $request->notelp;
        $personal->nohp = $request->nohp;
        $personal->whatsapp = $request->wa;
        $personal->email = $request->email;
        $personal->facebook = $request->fb;
        $personal->twitter = $request->twit;
        $personal->agama = $request->agama;
        $personal->statusperkawinan = $request->sk;
        $personal->sejaktanggalstatuskawin = $request->tsk;
        $personal->kewarganegaraan = $request->kewarganegaraan;
        $personal->statuspersonal = $request->sp;
        $personal->sejaktanggalstatuspersonal = $request->stp;

        $personal->save();    

       
        return $personal; 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $personal = Personal::findOrFail($id);
        $provinces = Provinces::all();
        $bp = Bidangpekerjaan::all();
        $jp = Jenispekerjaan::all();
        $prof = Profesi::all();
        $pendi = Pendidikan::where('idpersonal',$personal->idpersonal)->get();
        return view('frontend.personal.detail',compact('personal','bp','jp','prof','pendi','provinces'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function edit($idpersonal)
    {
        //
        $bp = Bidangpekerjaan::all();
        $jp = Jenispekerjaan::all();
        $prof = Profesi::all();
        $personal = Personal::where('idpersonal',$idpersonal)->first();
        $provinces=Provinces::all();
        $per = Personal::where('nokkj','!=',$personal->nokkj)->get();
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
        $saldo = Saldo::where('jenis_transaksi','=','Badge Hilang')->orWhere('idpersonal',$idpersonal)->get();
         $pertemuan = Pertemuan::all();
           $dokumen = Dokumen::where('idpersonal', $personal->idpersonal)->first();

     return view('frontend.personal.edit',compact('bp','jp','prof','pendidikan','personal','provinces','per','kkj','pendi','kea','diserahkan','perso','cabran','allkkj','raper','komisi','subray','pelayanana','jabpel','kegiatan','pelakeg','pelakegi','saldo','pertemuan','dokumen'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$idpersonal)
    {
        //
        $personal= Personal::findOrFail($idpersonal);
        $personal->alamattinggal = $request->alamat;
        $personal->rtrw = $request->rtrw;
        $personal->kelurahan = $request->villages;
        $personal->kecamatan = $request->districts;
        $personal->kabkota = $request->regencies;
        $personal->provinsi = $request->provinces;
        $personal->kodepos = $request->kodepos;
        $personal->googlemapadd = $request->google;
        $personal->latitude = $request->latitude;
        $personal->longitude = $request->longitude;
        $personal->notelp = $request->notelp;
        $personal->nohp = $request->nohp;
        $personal->whatsapp = $request->wa;
        $personal->email = $request->email;
        $personal->facebook = $request->fb;
        $personal->twitter = $request->twit;
        $personal->save();

        
        return $personal; 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {       
        $personal = Personal::findOrFail($id);
        $personal->delete();
        return redirect()->route('personal.index');
    }

    public function action(Request $request){

            $this->validate($request,[
                'nokkj' => 'unique:kkj,nokkj,'.$request->nokkj.',nokkj|nullable',
                'noktp' => 'unique:personal,ktpid,'.$request->idpersonal.',idpersonal|nullable'
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
        if ($request->hasFile('dokumen_ktp')) {
            $person = $request->file('dokumen_ktp');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/personal/dokumen_ktp';
                $person->move($destinationPath, $filename);
                $personal->dokumen_ktp=$filename;
        }

        $personal->ktpid = $request->noktp;
        $personal->ktpberlakusd = $request->berlaku;
        $personal->simid = $request->nosim;
        $personal->simberlakusd = $request->berlakusim;
        $personal->passportid = $request->nopass;
        $personal->passportberlakusd = $request->berlakupass;
        $personal->aktalahirid = $request->noakta;
        $personal->namadepan = $request->namadep;
        $personal->namatengah = $request->namateng;
        $personal->namabelakang = $request->namabel;
        $personal->namapanggilan = $request->namapang;
        $personal->gelarawal = $request->geawal;
        $personal->gelartengah = $request->geteng;
        $personal->gelarakhir = $request->geakhir;
        $personal->tempatlahir = $request->tela;
        $personal->tanggallahir = $request->tala;
        $personal->catatanpersonal = $request->caper;
        $personal->namalengkap = $request->nama;
        $personal->jeniskelamin = $request->jk;
        $personal->golongandarah = $request->gol;
        $personal->agama = $request->agama;
        $personal->statusperkawinan = $request->sk;
        $personal->sejaktanggalstatuskawin = $request->tsk;
        $personal->kewarganegaraan = $request->kewarganegaraan;
        $personal->statuspersonal = $request->sp;
        $personal->sejaktanggalstatuspersonal = $request->stp;
        
        $personal->save();
        
         $last_dok = Dokumen::orderBy('iddokumen','DESC')->first();
        $iddok = ($last_dok != null) ? $last_dok->iddokumen+1: '1';
        $dokumen = new Dokumen;
        $dokumen->iddokumen = $iddok;
        $dokumen->idpersonal = $personal->idpersonal;
        if ($request->hasFile('upload')) {
            $dok = $request->file('upload');
            $extension = $dok->getClientOriginalExtension();
            $filenamea = str_random('6'). '.' .$extension;
            $destinationPath = public_path().DIRECTORY_SEPARATOR.'assets/personal/dokumen';
            $dok->move($destinationPath, $filenamea);
            $dokumen->urldokumen = $filenamea;
        }
        $dokumen->save();

        $exist = Kkj::where('nokkj',$request->nokkj)->first();
        if($exist == null && $request->nokkj){
            $last_kkj = Kkj::orderBy('id','DESC')->first();
            $id = ($last_kkj != null) ? $last_kkj->id+1: '1';
            $delete_k = Kkj::where('nokkj',$personal->nokkj)->delete();

            $k = new Kkj;
            $k->id = $id;
            $k->idpersonal = $personal->idpersonal;
            $k->nokkj = $request->nokkj;
            $k->save();

            $personal_by_kkj = Personal::where('nokkj',$personal->nokkj)->get();

            if($personal_by_kkj){
                foreach ($personal_by_kkj as $key => $value) {
                    $p = Personal::find($value->idpersonal);
                    $p->nokkj = $k->nokkj;
                    $p->save();
                }
            }
        }
        else if($exist && $request->nokkj){
            $p = Personal::find($personal->idpersonal);
            $p->nokkj = $request->nokkj;
            $p->save();
        }

        return $personal;
            
    }
    public function add_kkj(Request $request){
        $tanggal_lahir = Carbon::parse($request->tala);
        $tgl = $tanggal_lahir->format('d');
        $bln = $tanggal_lahir->format('m');
        $thn = $tanggal_lahir->format('y');

        $ayeuna = Carbon::now();
        $x = $ayeuna->format('Y-m-d');
        $pisaha = explode('-', $x);
        $tgla = $pisaha[2];
        // dd($tgla);
        if ($request->jk == 'P') {
            $j = 3;
        }else{
            $j = 1;
        }

        $b= Personal::all();
        $count=count($b);
        $idp=$count+1;
       
        $year =$thn;

        // // dd($year);

        $id = $tgla.$year.$j.$bln.$tgl.$idp;

        if(!$request->idpersonal){
            $personal = new Personal;
            $personal->idpersonal = $id;
        }else{
            $personal = Personal::find($request->idpersonal);
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
        $personal->ktpid = $request->noktp;
        $personal->tanggallahir = $request->tala;
        $personal->namalengkap = $request->nama;
        $personal->jeniskelamin = $request->jk;
        $personal->nokkj = $request->nokkj;
        $personal->keanggotaan = $request->inek;
        $personal->hubkeluarga = $request->hub;
        $personal->save();

        return $personal;
            
    }
    public function edit_personal_kkj(Request $request,$idpersonal){
        $personal = Personal::findOrFail($idpersonal);
        $personal->ktpid = $request->ktp_per;
        $personal->tanggallahir = $request->tl_per;
        $personal->namalengkap = $request->na_per;
        $personal->jeniskelamin = $request->jk_per;
        $personal->hubkeluarga = $request->hub_per;
        $personal->keanggotaan = $request->kea_per;
        $personal->save();
    }
    public function delete_personal_kkj(Request $request,$idpersonal){
        $personal = Personal::findOrFail($idpersonal);
        $personal->nokkj = $request->ktp_per;
        $personal->save();
    }
    public function get_list_by_kkj($no_kkj){
        $personal = Personal::where('nokkj',$no_kkj)->get();
        return $personal;
    }

    public function get_all_personal($no_kkj){
        $personal = Personal::where('nokkj','!=',$no_kkj)->get();
    }
    public function get_list_by_pendidikan($id_pen){
        $pendi = Pendidikan::where('idpersonal',$id_pen)->get();
        return $pendi;
    }
      public function get_list_by_diserahkan($idpen){
        $all = [];
        $baptisan = Baptisanair::where('idpersonal',$idpen)->with('personal')->get();
        $pernikahan = Nikah::where('idpersonal',$idpen)->with('personal')->get();
        $penyerahan = Anak::where('idpersonal',$idpen)->with('personal')->get();
        $diserahkan = Diserahkan::where('idpersonal',$idpen)->with('personal')->get();

        $all['diserahkan'] = $diserahkan;
        $all['baptisan'] = $baptisan;
        $all['penyerahan'] = $penyerahan;
        $all['pernikahan'] = $pernikahan; 

        return $all;
    }
    public function add_pendidikan(Request $request){
        $personal = Personal::find($request->idper);
        $personal->statuspekerjaan = $request->spek;
        $personal->idprofesi = $request->prof;
        $personal->idjenispekerjaan = $request->jp;
        $personal->idbidangpekerjaan = $request->bp;
        $personal->hobi = $request->hobi;
        $personal->save();

        $last_pen = Pendidikan::orderBy('idpendidikan','DESC')->first();
        $id = ($last_pen != null) ? $last_pen->idpendidikan+1: '1';
        $pendidikan = new Pendidikan;
        $pendidikan->idpendidikan=$id;
        $pendidikan->idpersonal=$request->idper;
        $pendidikan->tingkatpendidikan=$request->tp;
        $pendidikan->institusi=$request->sekolah;
        $pendidikan->lokasi=$request->lokasi;
        $pendidikan->jurusan=$request->jurusan;
        $pendidikan->cpguru=$request->cp;
        $pendidikan->tahun=$request->tahun;
        $pendidikan->save();
        return $pendidikan;
    }
    public function edit_pendidikan(Request $request,$idpendidikan){
        $pendidikan = Pendidikan::findOrFail($idpendidikan);
        $pendidikan->tingkatpendidikan=$request->tp;
        $pendidikan->institusi=$request->sekolah;
        $pendidikan->lokasi=$request->lokasi;
        $pendidikan->jurusan=$request->jurusan;
        $pendidikan->cpguru=$request->cp;
        $pendidikan->tahun=$request->tahun;
        $pendidikan->save();
        return $pendidikan;
    }

     public function delete_pen($idpendidikan)
    {
        $pendidikan = Pendidikan::findOrFail($idpendidikan);
        $pendidikan->delete();
        return $pendidikan;
    }
    public function delete_per($idpersonal)
    {
        $personal = Personal::findOrFail($idpersonal);
        $personal->delete();
        return $personal;
    }

     public function get_all_personal_batpisan($id){
        $personal = Personal::where('idpersonal','!=',$id)->get();
    }
     public function get_list_by_komisi($id){
        $kom = Komisi::where('idpersonal',$id)->with('rayon','subrayon','cabang','personal')->get();
        return $kom;
    }
    public function get_list_by_jabpel($id){
        $jabpel = Jabatanpelayanan::where('idpersonal',$id)->with('pelayan','pengerjaa')->get();
        return $jabpel;
    }
    public function add_brk(Request $request,$idpersonal){
        $personal = Personal::findOrFail($idpersonal);
        $personal->baptisrohkudus = $request->brk;
        $personal->save();
        return redirect()->back();
    }
}
