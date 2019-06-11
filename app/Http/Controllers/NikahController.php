<?php

namespace App\Http\Controllers;

use App\Nikah;
use App\Personal;
use App\Ayahibu;
use App\Vnikah;
use App\Provinces;
use Carbon\Carbon;
use App\Cabang;
use Illuminate\Http\Request;

class NikahController extends Controller
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
        
        $personal = Personal::find($request->idpas);
        $personal->nokkj=$request->nokkj;
        $personal->namadepan=$request->namapas_depan;
        $personal->namatengah=$request->namapas_tengah;
        $personal->namabelakang=$request->namapas_belakang;
        $personal->tempatlahir=$request->tempatpas_lahir;
        $personal->tanggallahir=$request->tanggalpas_lahir;
        $personal->save();

        $ai = Ayahibu::orderBy('id','DESC')->first();
        $ida = ($ai != null) ? $ai->id+1: '1';
        $ayahibu = new Ayahibu;
        $ayahibu->id=$ida;
        $ayahibu->idpersonal=$request->idpas;
        $ayahibu->idayahper=$request->idayahpas;
        $ayahibu->namadepan=$request->namaayahpas_depan;
        $ayahibu->namatengah=$request->namaayahpas_tengah;
        $ayahibu->namabelakang=$request->namaayahpas_belakang;
        $ayahibu->idibuper=$request->idibupas;
        $ayahibu->namadepanibu=$request->namaibupas_depan;
        $ayahibu->namatengahibu=$request->namaibupas_tengah;
        $ayahibu->namabelakangibu=$request->namaibupas_belakang;
        $ayahibu->save();

        $nik = Nikah::orderBy('idpernikahan','DESC')->first();
        $id = ($nik != null) ? $nik->idpernikahan+1: '1';
        $nikah = new Nikah;
        $nikah->idpernikahan=$id;
        $nikah->noakta=$request->noakta;
        $nikah->idpersonal=$request->idper;
        $nikah->idpasangan=$request->idpas;
        $nikah->idpelayan=$request->idpelayan;
        $nikah->idayahibupas=$ayahibu->id;
        // $nikah->idibu=$ibu->id;
        $nikah->tempatpernikahan=$request->tempat;
        $nikah->tanggal=$request->tanggal;
        if ($request->hasFile('d_nikah')) {
            $person = $request->file('d_nikah');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/nikah/d_nikah';
                $person->move($destinationPath, $filename);
                $nikah->dokumen=$filename;
        }
        $nikah->save();
        return $nikah;
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Nikah  $nikah
     * @return \Illuminate\Http\Response
     */
    public function show(Nikah $nikah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Nikah  $nikah
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $nikah = Vnikah::FindOrfail($id);
        return $nikah;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Nikah  $nikah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
        $personal = Personal::find($request->idpas);
        $personal->nokkj=$request->nokkj;
        $personal->namadepan=$request->namapas_depan;
        $personal->namatengah=$request->namapas_tengah;
        $personal->namabelakang=$request->namapas_belakang;
        $personal->tempatlahir=$request->tempatpas_lahir;
        $personal->tanggallahir=$request->tanggalpas_lahir;
        $personal->save();

        $ayahibu = Ayahibu::find($request->idayahibupas);
        $ayahibu->idpersonal=$request->idpas;
        $ayahibu->idayahper=$request->idayahpas;
        $ayahibu->namadepan=$request->namaayahpas_depan;
        $ayahibu->namatengah=$request->namaayahpas_tengah;
        $ayahibu->namabelakang=$request->namaayahpas_belakang;
        $ayahibu->idibuper=$request->idibupas;
        $ayahibu->namadepanibu=$request->namaibupas_depan;
        $ayahibu->namatengahibu=$request->namaibupas_tengah;
        $ayahibu->namabelakangibu=$request->namaibupas_belakang;
        $ayahibu->save();

        $nikah = Nikah::FindOrfail($id);
        $nikah->noakta=$request->noakta;
        $nikah->idpersonal=$request->idper;
        $nikah->idpasangan=$request->idpas;
        $nikah->idpelayan=$request->idpelayan;
        $nikah->idayahibupas=$request->idayahibupas;
        // $nikah->idibu=$ibu->id;
        $nikah->tempatpernikahan=$request->tempat;
        $nikah->tanggal=$request->tanggal;
        if ($request->hasFile('d_nikah')) {
            $person = $request->file('d_nikah');
            $extension = $person->getClientOriginalExtension();
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/nikah/d_nikah';
                $person->move($destinationPath, $extension);
                $nikah->dokumen=$extension;
        }
        $nikah->save();
        return $nikah;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Nikah  $nikah
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
         $nikah = Nikah::findOrFail($id);
        $nikah->delete();
        return $nikah;
    }

    public function pernikahan(){
        $pernikahan = Vnikah::where('status','Menerima Akta Pernikahan')->get();
        return view('frontend.modul.jemaat.pernikahan.index',compact('pernikahan'));
    }
    public function pernikahan_caper(){
        $pernikahan = Vnikah::where('status','!=','Menerima Akta Pernikahan')->get();
        $personal = Personal::all();
        return view('frontend.modul.jemaat.pernikahan.caper.index',compact('pernikahan','personal'));
    }
    public function pernikahan_pendaftaran(){
        $personal = Personal::all();
        $cabang = Cabang::all();
        $provinces = Provinces::all();
        return view('frontend.modul.jemaat.pernikahan.pendaftaran.index',compact('personal','cabang','provinces'));
    }
    public function pernikahan_pendaftaran_edit($id){
        $pernikahan = Vnikah::findOrFail($id);
        $personal = Personal::all();
        $cabang = Cabang::all();
        $provinces = Provinces::all();
        return view('frontend.modul.jemaat.pernikahan.caper.edit',compact('personal','cabang','provinces','pernikahan'));
    }
    public function akta_edit($id){
        $pernikahan = Vnikah::findOrFail($id);
        $personal = Personal::all();
        $cabang = Cabang::all();
        $provinces = Provinces::all();
        return view('frontend.modul.jemaat.pernikahan.tambah.edit',compact('personal','cabang','provinces','pernikahan'));
    }
    public function pernikahan_pendaftaran_detail($id){
        $pernikahan = Vnikah::findOrFail($id);
        $personal = Personal::all();
        $cabang = Cabang::all();
        $provinces = Provinces::all();
        return view('frontend.modul.jemaat.pernikahan.detail.detail_waiting',compact('pernikahan','personal','cabang','provinces'));
    }
    public function akta_detail($id){
        $pernikahan = Vnikah::findOrFail($id);
        $personal = Personal::all();
        $cabang = Cabang::all();
        $provinces = Provinces::all();
        return view('frontend.modul.jemaat.pernikahan.tambah.detail',compact('pernikahan','personal','cabang','provinces'));
    }
    public function pernikahan_akta(){
        $personal = Personal::all();
        $cabang = Cabang::all();
        $provinces = Provinces::all();
        return view('frontend.modul.jemaat.pernikahan.tambah.index',compact('personal','cabang','provinces'));
    }
    public function caper_store(Request $request)
    {
        //

        
      if(!$request->caper1){
        $tahun = $request->input('tala');
        $pisah = explode('/', $tahun);
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
        $personal->ktpid = $request->noktp;
        $personal->ktpberlakusd = $request->berlaku;
        $personal->nokkj = $request->nokkj;
        $personal->tempatlahir = $request->tela;
        $personal->tanggallahir = $request->tala;
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
        $personal->agama = $request->agama;
        $personal->statusperkawinan = $request->sk;
        $personal->sejaktanggalstatuskawin = $request->tsk;
        $personal->kewarganegaraan = $request->kewarganegaraan;
        $personal->statuspersonal = $request->sp;
        $personal->sejaktanggalstatuspersonal = $request->stp;

        $personal->save();

        }else{
            
            $personal = Personal::find($request->caper1);
            $personal->save();
            
        }


        

        if(!$request->caper2){

        $tahuna = $request->input('tala_p');
        $pisahaa = explode('/', $tahuna);
        $tgla = $pisahaa[0];
        $blna = $pisahaa[1];
        $thna = $pisahaa[2];

        $ayeunaa = Carbon::now();
        $xa = $ayeunaa->format('Y-m-d');
        $pisahaa = explode('-', $xa);
        $tglaa = $pisahaa[2];
        // dd($tgla);
        if ($request->jk_p == 'P') {
            $ja = 3;
        }else
        {
            $ja = 1;
        }

        $ba= Personal::all();
        $counta=count($ba);
        $idpa=$counta+1;
       
        $yeara = substr( $thna, -2);

        // // dd($year);

        $ida = $tglaa.$yeara.$ja.$blna.$tgla.$idpa;

        $pasangan = new Personal;
        $pasangan->idpersonal = $ida;
        if ($request->hasFile('urlphoto_p')) {
            $person = $request->file('urlphoto_p');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/foto';
                $person->move($destinationPath, $filename);
                $pasangan->urlphoto=$filename;
        }
        $pasangan->ktpid = $request->noktp_p;
        $pasangan->ktpberlakusd = $request->berlaku_p;
        $pasangan->nokkj = $request->nokkj_p;
        $pasangan->tempatlahir = $request->tela_p;
        $pasangan->tanggallahir = $request->tala_p;
        $pasangan->namalengkap = $request->nama_p;
        $pasangan->jeniskelamin = $request->jk_p;
        $pasangan->golongandarah = $request->gol_p;
        $pasangan->alamattinggal = $request->alamat_p;
        $pasangan->rtrw = $request->rtrw_p;
        $pasangan->kelurahan = $request->villages_p;
        $pasangan->kecamatan = $request->districts_p;
        $pasangan->kabkota = $request->regencies_p;
        $pasangan->provinsi = $request->provinces_p;
        $pasangan->kodepos = $request->kodepos_p;
        $pasangan->agama = $request->agama_p;
        $pasangan->statusperkawinan = $request->sk_p;
        $pasangan->sejaktanggalstatuskawin = $request->tsk_p;
        $pasangan->kewarganegaraan = $request->kewarganegaraan_p;
        $pasangan->statuspersonal = $request->sp_p;
        $pasangan->sejaktanggalstatuspersonal = $request->stp_p;

        $pasangan->save();

        }else{
            
            $pasangan = Personal::find($request->caper2);
            $pasangan->save();
        }
        

        $ai = Ayahibu::orderBy('id','DESC')->first();
        $ida = ($ai != null) ? $ai->id+1: '1';
        $ayahibu = new Ayahibu;
        $ayahibu->id=$ida;
        $ayahibu->idpersonal=$request->personal;
        $ayahibu->idayahper=$request->idayahper;
        $ayahibu->namadepan=$request->namaayah_depan;
        $ayahibu->namatengah=$request->namaayah_tengah;
        $ayahibu->namabelakang=$request->namaayah_belakang;
        $ayahibu->idibuper=$request->idibuper;
        $ayahibu->namadepanibu=$request->namaibu_depan;
        $ayahibu->namatengahibu=$request->namaibu_tengah;
        $ayahibu->namabelakangibu=$request->namaibu_belakang;
        $ayahibu->save();


        $nik = Nikah::orderBy('idpernikahan','DESC')->first();
        $idnik = ($nik != null) ? $nik->idpernikahan+1: '1';
        $pernikahan = new Nikah;
        $pernikahan->idpernikahan=$idnik;
        $pernikahan->idpasangan=$pasangan->idpersonal;
        $pernikahan->idpersonal=$personal->idpersonal;
        $pernikahan->idcabangranting=$request->idcabangranting;
        $pernikahan->idayahibupas=$ayahibu->id;
        $pernikahan->idpelayan=$request->idpelayan;
        $pernikahan->petugas=$request->petugas;
        $pernikahan->menyatakan=$request->menyatakan;
        $pernikahan->penerima=$request->penerima;
        $pernikahan->verifikasi=$request->verifikasi;
        $pernikahan->validasi=$request->validasi;
        $pernikahan->noakta=$request->noakta;
        $pernikahan->tanggal=$request->tanggal;
        $pernikahan->tempatpernikahan=$request->tempat;
        $pernikahan->keterangan=$request->keterangan;
        $pernikahan->status=$request->status;

        if ($request->hasFile('d_akta')) {
            $person = $request->file('d_akta');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/pernikahan/d_aktakelahiran';
                $person->move($destinationPath, $filename);
                $pernikahan->d_aktakelahiran=$filename;
        }
        if ($request->hasFile('dokumen')) {
            $person = $request->file('dokumen');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/pernikahan/dokumen';
                $person->move($destinationPath, $filename);
                $pernikahan->dokumen=$filename;
        }
        if ($request->hasFile('d_ktp')) {
            $person = $request->file('d_ktp');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/pernikahan/d_ktp';
                $person->move($destinationPath, $filename);
                $pernikahan->d_ktp=$filename;
        }
        if ($request->hasFile('d_sk_nikah')) {
            $person = $request->file('d_sk_nikah');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/pernikahan/d_sk_nikah';
                $person->move($destinationPath, $filename);
                $pernikahan->d_sk_nikah=$filename;
        }
        if ($request->hasFile('d_sk_asal')) {
            $person = $request->file('d_sk_asal');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/pernikahan/d_sk_asal';
                $person->move($destinationPath, $filename);
                $pernikahan->d_sk_asal=$filename;
        }
        if ($request->hasFile('d_sk_ortu')) {
            $person = $request->file('d_sk_ortu');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/pernikahan/d_sk_ortu';
                $person->move($destinationPath, $filename);
                $pernikahan->d_sk_ortu=$filename;
        }
        if ($request->hasFile('d_sp_belummenikah')) {
            $person = $request->file('d_sp_belummenikah');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/pernikahan/d_sp_belummenikah';
                $person->move($destinationPath, $filename);
                $pernikahan->d_sp_belummenikah=$filename;
        }
        if ($request->hasFile('d_kk')) {
            $person = $request->file('d_kk');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/pernikahan/d_kk';
                $person->move($destinationPath, $filename);
                $pernikahan->d_kk=$filename;
        }
        if ($request->hasFile('d_ktp_ayah')) {
            $person = $request->file('d_ktp_ayah');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/pernikahan/d_ktp_ayah';
                $person->move($destinationPath, $filename);
                $pernikahan->d_ktp_ayah=$filename;
        }
        if ($request->hasFile('d_ktp_ibu')) {
            $person = $request->file('d_ktp_ibu');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/pernikahan/d_ktp_ibu';
                $person->move($destinationPath, $filename);
                $pernikahan->d_ktp_ibu=$filename;
        }
        if ($request->hasFile('d_sp_ortu')) {
            $person = $request->file('d_sp_ortu');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/pernikahan/d_sp_ortu';
                $person->move($destinationPath, $filename);
                $pernikahan->d_sp_ortu=$filename;
        }
        if ($request->hasFile('d_perceraian_ortu')) {
            $person = $request->file('d_perceraian_ortu');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/pernikahan/d_perceraian_ortu';
                $person->move($destinationPath, $filename);
                $pernikahan->d_perceraian_ortu=$filename;
        }
        if ($request->hasFile('d_baptisan')) {
            $person = $request->file('d_baptisan');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/pernikahan/d_baptisan';
                $person->move($destinationPath, $filename);
                $pernikahan->d_baptisan=$filename;
        }
        if ($request->hasFile('d_kkj')) {
            $person = $request->file('d_kkj');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/pernikahan/d_kkj';
                $person->move($destinationPath, $filename);
                $pernikahan->d_kkj=$filename;
        }
        if ($request->hasFile('d_sertifikat_kom')) {
            $person = $request->file('d_sertifikat_kom');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/pernikahan/d_sertifikat_kom';
                $person->move($destinationPath, $filename);
                $pernikahan->d_sertifikat_kom=$filename;
        }
        if ($request->hasFile('d_sertifikat_bpn')) {
            $person = $request->file('d_sertifikat_bpn');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/pernikahan/d_sertifikat_bpn';
                $person->move($destinationPath, $filename);
                $pernikahan->d_sertifikat_bpn=$filename;
        }
        if ($request->hasFile('d_foto1')) {
            $person = $request->file('d_foto1');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/pernikahan/d_foto1';
                $person->move($destinationPath, $filename);
                $pernikahan->d_foto1=$filename;
        }if ($request->hasFile('d_foto2')) {
            $person = $request->file('d_foto2');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/pernikahan/d_foto2';
                $person->move($destinationPath, $filename);
                $pernikahan->d_foto2=$filename;
        }if ($request->hasFile('d_foto3')) {
            $person = $request->file('d_foto3');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/pernikahan/d_foto3';
                $person->move($destinationPath, $filename);
                $pernikahan->d_foto3=$filename;
        }
        if ($request->hasFile('d_saksi1')) {
            $person = $request->file('d_saksi1');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/pernikahan/d_saksi1';
                $person->move($destinationPath, $filename);
                $pernikahan->d_saksi1=$filename;
        }
        if ($request->hasFile('d_saksi2')) {
            $person = $request->file('d_saksi2');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/pernikahan/d_saksi2';
                $person->move($destinationPath, $filename);
                $pernikahan->d_saksi2=$filename;
        }
        if ($request->hasFile('d_pasangan_dulu')) {
            $person = $request->file('d_pasangan_dulu');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/pernikahan/d_pasangan_dulu';
                $person->move($destinationPath, $filename);
                $pernikahan->d_pasangan_dulu=$filename;
        }
        if ($request->hasFile('d_konseling')) {
            $person = $request->file('d_konseling');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/pernikahan/d_konseling';
                $person->move($destinationPath, $filename);
                $pernikahan->d_konseling=$filename;
        }
        if ($request->hasFile('d_sp_kelurahan')) {
            $person = $request->file('d_sp_kelurahan');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/pernikahan/d_sp_kelurahan';
                $person->move($destinationPath, $filename);
                $pernikahan->d_sp_kelurahan=$filename;
        }
        if ($request->hasFile('d_berita')) {
            $person = $request->file('d_berita');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/pernikahan/d_berita';
                $person->move($destinationPath, $filename);
                $pernikahan->d_berita=$filename;
        }
        if ($request->hasFile('d_lain')) {
            $person = $request->file('d_lain');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/pernikahan/d_lain';
                $person->move($destinationPath, $filename);
                $pernikahan->d_lain=$filename;
        }
        
        $pernikahan->save();


        return redirect('modul/pelayanjemaat/pernikahan/caper');
    }
    public function caper_update(Request $request,$id)
    {
        //
       //  $personal = Personal::find($request->caper1);
       //  if ($request->hasFile('urlphoto')) {
       //      $person = $request->file('urlphoto');
       //      $extension = $person->getClientOriginalExtension();
       //      $filename = str_random('6'). '.' .$extension;
       //      $destinationPath = public_path() . 
       //          DIRECTORY_SEPARATOR . 'assets/foto';
       //          $person->move($destinationPath, $filename);
       //          $personal->urlphoto=$filename;
       //  }
       //  $personal->ktpid = $request->noktp;
       //  $personal->ktpberlakusd = $request->berlaku;
       //  $personal->nokkj = $request->nokkj;
       //  $personal->tempatlahir = $request->tela;
       //  $personal->tanggallahir = $request->tala;
       //  $personal->namalengkap = $request->nama;
       //  $personal->jeniskelamin = $request->jk;
       //  $personal->golongandarah = $request->gol;
       //  $personal->alamattinggal = $request->alamat;
       //  $personal->rtrw = $request->rtrw;
       //  $personal->kelurahan = $request->villages;
       //  $personal->kecamatan = $request->districts;
       //  $personal->kabkota = $request->regencies;
       //  $personal->provinsi = $request->provinces;
       //  $personal->kodepos = $request->kodepos;
       //  $personal->agama = $request->agama;
       //  $personal->statusperkawinan = $request->sk;
       //  $personal->sejaktanggalstatuskawin = $request->tsk;
       //  $personal->kewarganegaraan = $request->kewarganegaraan;
       //  $personal->statuspersonal = $request->sp;
       //  $personal->sejaktanggalstatuspersonal = $request->stp;

       //  $personal->save();
        

        

       // $pasangan = Personal::find($request->caper2);
       //  $pasangan->idpersonal = $ida;
       //  if ($request->hasFile('urlphoto_p')) {
       //      $person = $request->file('urlphoto_p');
       //      $extension = $person->getClientOriginalExtension();
       //      $filename = str_random('6'). '.' .$extension;
       //      $destinationPath = public_path() . 
       //          DIRECTORY_SEPARATOR . 'assets/foto';
       //          $person->move($destinationPath, $filename);
       //          $pasangan->urlphoto=$filename;
       //  }
       //  $pasangan->ktpid = $request->noktp_p;
       //  $pasangan->ktpberlakusd = $request->berlaku_p;
       //  $pasangan->nokkj = $request->nokkj_p;
       //  $pasangan->tempatlahir = $request->tela_p;
       //  $pasangan->tanggallahir = $request->tala_p;
       //  $pasangan->namalengkap = $request->nama_p;
       //  $pasangan->jeniskelamin = $request->jk_p;
       //  $pasangan->golongandarah = $request->gol_p;
       //  $pasangan->alamattinggal = $request->alamat_p;
       //  $pasangan->rtrw = $request->rtrw_p;
       //  $pasangan->kelurahan = $request->villages_p;
       //  $pasangan->kecamatan = $request->districts_p;
       //  $pasangan->kabkota = $request->regencies_p;
       //  $pasangan->provinsi = $request->provinces_p;
       //  $pasangan->kodepos = $request->kodepos_p;
       //  $pasangan->agama = $request->agama_p;
       //  $pasangan->statusperkawinan = $request->sk_p;
       //  $pasangan->sejaktanggalstatuskawin = $request->tsk_p;
       //  $pasangan->kewarganegaraan = $request->kewarganegaraan_p;
       //  $pasangan->statuspersonal = $request->sp_p;
       //  $pasangan->sejaktanggalstatuspersonal = $request->stp_p;
       //  $pasangan->save();
        
        // $ayahibu = Ayahibu::find($id);
        // $ayahibu->idpersonal=$request->personal;
        // $ayahibu->idayahper=$request->idayahper;
        // $ayahibu->namadepan=$request->namaayah_depan;
        // $ayahibu->namatengah=$request->namaayah_tengah;
        // $ayahibu->namabelakang=$request->namaayah_belakang;
        // $ayahibu->idibuper=$request->idibuper;
        // $ayahibu->namadepanibu=$request->namaibu_depan;
        // $ayahibu->namatengahibu=$request->namaibu_tengah;
        // $ayahibu->namabelakangibu=$request->namaibu_belakang;
        // $ayahibu->save();

        $pernikahan = Nikah::findOrFail($id);
        $pernikahan->idpasangan=$request->caper1;
        $pernikahan->idpersonal=$request->caper2;
        $pernikahan->idcabangranting=$request->idcabangranting;
        $pernikahan->idayahibupas=$request->idayahibupas;
        $pernikahan->idpelayan=$request->idpelayan;
        $pernikahan->petugas=$request->petugas;
        $pernikahan->menyatakan=$request->menyatakan;
        $pernikahan->penerima=$request->penerima;
        $pernikahan->verifikasi=$request->verifikasi;
        $pernikahan->validasi=$request->validasi;
        $pernikahan->noakta=$request->noakta;
        $pernikahan->tanggal=$request->tanggal;
        $pernikahan->tempatpernikahan=$request->tempat;
        $pernikahan->keterangan=$request->keterangan;
        $pernikahan->status=$request->status;

        if ($request->hasFile('d_akta')) {
            $person = $request->file('d_akta');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/pernikahan/d_aktakelahiran';
                $person->move($destinationPath, $filename);
                $pernikahan->d_aktakelahiran=$filename;
        }
        if ($request->hasFile('dokumen')) {
            $person = $request->file('dokumen');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/pernikahan/dokumen';
                $person->move($destinationPath, $filename);
                $pernikahan->dokumen=$filename;
        }
        if ($request->hasFile('d_ktp')) {
            $person = $request->file('d_ktp');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/pernikahan/d_ktp';
                $person->move($destinationPath, $filename);
                $pernikahan->d_ktp=$filename;
        }
        if ($request->hasFile('d_sk_nikah')) {
            $person = $request->file('d_sk_nikah');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/pernikahan/d_sk_nikah';
                $person->move($destinationPath, $filename);
                $pernikahan->d_sk_nikah=$filename;
        }
        if ($request->hasFile('d_sk_asal')) {
            $person = $request->file('d_sk_asal');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/pernikahan/d_sk_asal';
                $person->move($destinationPath, $filename);
                $pernikahan->d_sk_asal=$filename;
        }
        if ($request->hasFile('d_sk_ortu')) {
            $person = $request->file('d_sk_ortu');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/pernikahan/d_sk_ortu';
                $person->move($destinationPath, $filename);
                $pernikahan->d_sk_ortu=$filename;
        }
        if ($request->hasFile('d_sp_belummenikah')) {
            $person = $request->file('d_sp_belummenikah');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/pernikahan/d_sp_belummenikah';
                $person->move($destinationPath, $filename);
                $pernikahan->d_sp_belummenikah=$filename;
        }
        if ($request->hasFile('d_kk')) {
            $person = $request->file('d_kk');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/pernikahan/d_kk';
                $person->move($destinationPath, $filename);
                $pernikahan->d_kk=$filename;
        }
        if ($request->hasFile('d_ktp_ayah')) {
            $person = $request->file('d_ktp_ayah');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/pernikahan/d_ktp_ayah';
                $person->move($destinationPath, $filename);
                $pernikahan->d_ktp_ayah=$filename;
        }
        if ($request->hasFile('d_ktp_ibu')) {
            $person = $request->file('d_ktp_ibu');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/pernikahan/d_ktp_ibu';
                $person->move($destinationPath, $filename);
                $pernikahan->d_ktp_ibu=$filename;
        }
        if ($request->hasFile('d_sp_ortu')) {
            $person = $request->file('d_sp_ortu');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/pernikahan/d_sp_ortu';
                $person->move($destinationPath, $filename);
                $pernikahan->d_sp_ortu=$filename;
        }
        if ($request->hasFile('d_perceraian_ortu')) {
            $person = $request->file('d_perceraian_ortu');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/pernikahan/d_perceraian_ortu';
                $person->move($destinationPath, $filename);
                $pernikahan->d_perceraian_ortu=$filename;
        }
        if ($request->hasFile('d_baptisan')) {
            $person = $request->file('d_baptisan');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/pernikahan/d_baptisan';
                $person->move($destinationPath, $filename);
                $pernikahan->d_baptisan=$filename;
        }
        if ($request->hasFile('d_kkj')) {
            $person = $request->file('d_kkj');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/pernikahan/d_kkj';
                $person->move($destinationPath, $filename);
                $pernikahan->d_kkj=$filename;
        }
        if ($request->hasFile('d_sertifikat_kom')) {
            $person = $request->file('d_sertifikat_kom');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/pernikahan/d_sertifikat_kom';
                $person->move($destinationPath, $filename);
                $pernikahan->d_sertifikat_kom=$filename;
        }
        if ($request->hasFile('d_sertifikat_bpn')) {
            $person = $request->file('d_sertifikat_bpn');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/pernikahan/d_sertifikat_bpn';
                $person->move($destinationPath, $filename);
                $pernikahan->d_sertifikat_bpn=$filename;
        }
        if ($request->hasFile('d_foto1')) {
            $person = $request->file('d_foto1');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/pernikahan/d_foto1';
                $person->move($destinationPath, $filename);
                $pernikahan->d_foto1=$filename;
        }if ($request->hasFile('d_foto2')) {
            $person = $request->file('d_foto2');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/pernikahan/d_foto2';
                $person->move($destinationPath, $filename);
                $pernikahan->d_foto2=$filename;
        }if ($request->hasFile('d_foto3')) {
            $person = $request->file('d_foto3');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/pernikahan/d_foto3';
                $person->move($destinationPath, $filename);
                $pernikahan->d_foto3=$filename;
        }
        if ($request->hasFile('d_saksi1')) {
            $person = $request->file('d_saksi1');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/pernikahan/d_saksi1';
                $person->move($destinationPath, $filename);
                $pernikahan->d_saksi1=$filename;
        }
        if ($request->hasFile('d_saksi2')) {
            $person = $request->file('d_saksi2');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/pernikahan/d_saksi2';
                $person->move($destinationPath, $filename);
                $pernikahan->d_saksi2=$filename;
        }
        if ($request->hasFile('d_pasangan_dulu')) {
            $person = $request->file('d_pasangan_dulu');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/pernikahan/d_pasangan_dulu';
                $person->move($destinationPath, $filename);
                $pernikahan->d_pasangan_dulu=$filename;
        }
        if ($request->hasFile('d_konseling')) {
            $person = $request->file('d_konseling');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/pernikahan/d_konseling';
                $person->move($destinationPath, $filename);
                $pernikahan->d_konseling=$filename;
        }
        if ($request->hasFile('d_sp_kelurahan')) {
            $person = $request->file('d_sp_kelurahan');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/pernikahan/d_sp_kelurahan';
                $person->move($destinationPath, $filename);
                $pernikahan->d_sp_kelurahan=$filename;
        }
        if ($request->hasFile('d_berita')) {
            $person = $request->file('d_berita');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/pernikahan/d_berita';
                $person->move($destinationPath, $filename);
                $pernikahan->d_berita=$filename;
        }
        if ($request->hasFile('d_lain')) {
            $person = $request->file('d_lain');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/pernikahan/d_lain';
                $person->move($destinationPath, $filename);
                $pernikahan->d_lain=$filename;
        }
        
        $pernikahan->save();


        return redirect('modul/pelayanjemaat/pernikahan/caper');
    }
    public function akta_store(Request $request)
    {
        //

        
      if(!$request->caper1){
        $tahun = $request->input('tala');
        $pisah = explode('/', $tahun);
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
        $personal->ktpid = $request->noktp;
        $personal->ktpberlakusd = $request->berlaku;
        $personal->nokkj = $request->nokkj;
        $personal->tempatlahir = $request->tela;
        $personal->tanggallahir = $request->tala;
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
        $personal->agama = $request->agama;
        $personal->statusperkawinan = $request->sk;
        $personal->sejaktanggalstatuskawin = $request->tsk;
        $personal->kewarganegaraan = $request->kewarganegaraan;
        $personal->statuspersonal = $request->sp;
        $personal->sejaktanggalstatuspersonal = $request->stp;

        $personal->save();

        }else{
            
            $personal = Personal::find($request->caper1);
            $personal->save();
            
        }


        

        if(!$request->caper2){

        $tahuna = $request->input('tala_p');
        $pisahaa = explode('/', $tahuna);
        $tgla = $pisahaa[0];
        $blna = $pisahaa[1];
        $thna = $pisahaa[2];

        $ayeunaa = Carbon::now();
        $xa = $ayeunaa->format('Y-m-d');
        $pisahaa = explode('-', $xa);
        $tglaa = $pisahaa[2];
        // dd($tgla);
        if ($request->jk_p == 'P') {
            $ja = 3;
        }else
        {
            $ja = 1;
        }

        $ba= Personal::all();
        $counta=count($ba);
        $idpa=$counta+1;
       
        $yeara = substr( $thna, -2);

        // // dd($year);

        $ida = $tglaa.$yeara.$ja.$blna.$tgla.$idpa;

        $pasangan = new Personal;
        $pasangan->idpersonal = $ida;
        if ($request->hasFile('urlphoto_p')) {
            $person = $request->file('urlphoto_p');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/foto';
                $person->move($destinationPath, $filename);
                $pasangan->urlphoto=$filename;
        }
        $pasangan->ktpid = $request->noktp_p;
        $pasangan->ktpberlakusd = $request->berlaku_p;
        $pasangan->nokkj = $request->nokkj_p;
        $pasangan->tempatlahir = $request->tela_p;
        $pasangan->tanggallahir = $request->tala_p;
        $pasangan->namalengkap = $request->nama_p;
        $pasangan->jeniskelamin = $request->jk_p;
        $pasangan->golongandarah = $request->gol_p;
        $pasangan->alamattinggal = $request->alamat_p;
        $pasangan->rtrw = $request->rtrw_p;
        $pasangan->kelurahan = $request->villages_p;
        $pasangan->kecamatan = $request->districts_p;
        $pasangan->kabkota = $request->regencies_p;
        $pasangan->provinsi = $request->provinces_p;
        $pasangan->kodepos = $request->kodepos_p;
        $pasangan->agama = $request->agama_p;
        $pasangan->statusperkawinan = $request->sk_p;
        $pasangan->sejaktanggalstatuskawin = $request->tsk_p;
        $pasangan->kewarganegaraan = $request->kewarganegaraan_p;
        $pasangan->statuspersonal = $request->sp_p;
        $pasangan->sejaktanggalstatuspersonal = $request->stp_p;

        $pasangan->save();

        }else{
            
            $pasangan = Personal::find($request->caper2);
            $pasangan->save();
        }
        

        $ai = Ayahibu::orderBy('id','DESC')->first();
        $ida = ($ai != null) ? $ai->id+1: '1';
        $ayahibu = new Ayahibu;
        $ayahibu->id=$ida;
        $ayahibu->idpersonal=$request->personal;
        $ayahibu->idayahper=$request->idayahper;
        $ayahibu->namadepan=$request->namaayah_depan;
        $ayahibu->namatengah=$request->namaayah_tengah;
        $ayahibu->namabelakang=$request->namaayah_belakang;
        $ayahibu->idibuper=$request->idibuper;
        $ayahibu->namadepanibu=$request->namaibu_depan;
        $ayahibu->namatengahibu=$request->namaibu_tengah;
        $ayahibu->namabelakangibu=$request->namaibu_belakang;
        $ayahibu->save();


        $nik = Nikah::orderBy('idpernikahan','DESC')->first();
        $idnik = ($nik != null) ? $nik->idpernikahan+1: '1';
        $pernikahan = new Nikah;
        $pernikahan->idpernikahan=$idnik;
        $pernikahan->idpasangan=$pasangan->idpersonal;
        $pernikahan->idpersonal=$personal->idpersonal;
        $pernikahan->idcabangranting=$request->idcabangranting;
        $pernikahan->idayahibupas=$ayahibu->id;
        $pernikahan->idpelayan=$request->idpelayan;
        $pernikahan->petugas=$request->petugas;
        $pernikahan->menyatakan=$request->menyatakan;
        $pernikahan->penerima=$request->penerima;
        $pernikahan->verifikasi=$request->verifikasi;
        $pernikahan->validasi=$request->validasi;
        $pernikahan->noakta=$request->noakta;
        $pernikahan->tanggal=$request->tanggal;
        $pernikahan->tempatpernikahan=$request->tempat;
        $pernikahan->keterangan=$request->keterangan;
        $pernikahan->status=$request->status;

        if ($request->hasFile('d_akta')) {
            $person = $request->file('d_akta');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/pernikahan/d_aktakelahiran';
                $person->move($destinationPath, $filename);
                $pernikahan->d_aktakelahiran=$filename;
        }
        if ($request->hasFile('dokumen')) {
            $person = $request->file('dokumen');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/pernikahan/dokumen';
                $person->move($destinationPath, $filename);
                $pernikahan->dokumen=$filename;
        }
        if ($request->hasFile('d_ktp')) {
            $person = $request->file('d_ktp');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/pernikahan/d_ktp';
                $person->move($destinationPath, $filename);
                $pernikahan->d_ktp=$filename;
        }
        if ($request->hasFile('d_sk_nikah')) {
            $person = $request->file('d_sk_nikah');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/pernikahan/d_sk_nikah';
                $person->move($destinationPath, $filename);
                $pernikahan->d_sk_nikah=$filename;
        }
        if ($request->hasFile('d_sk_asal')) {
            $person = $request->file('d_sk_asal');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/pernikahan/d_sk_asal';
                $person->move($destinationPath, $filename);
                $pernikahan->d_sk_asal=$filename;
        }
        if ($request->hasFile('d_sk_ortu')) {
            $person = $request->file('d_sk_ortu');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/pernikahan/d_sk_ortu';
                $person->move($destinationPath, $filename);
                $pernikahan->d_sk_ortu=$filename;
        }
        if ($request->hasFile('d_sp_belummenikah')) {
            $person = $request->file('d_sp_belummenikah');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/pernikahan/d_sp_belummenikah';
                $person->move($destinationPath, $filename);
                $pernikahan->d_sp_belummenikah=$filename;
        }
        if ($request->hasFile('d_kk')) {
            $person = $request->file('d_kk');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/pernikahan/d_kk';
                $person->move($destinationPath, $filename);
                $pernikahan->d_kk=$filename;
        }
        if ($request->hasFile('d_ktp_ayah')) {
            $person = $request->file('d_ktp_ayah');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/pernikahan/d_ktp_ayah';
                $person->move($destinationPath, $filename);
                $pernikahan->d_ktp_ayah=$filename;
        }
        if ($request->hasFile('d_ktp_ibu')) {
            $person = $request->file('d_ktp_ibu');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/pernikahan/d_ktp_ibu';
                $person->move($destinationPath, $filename);
                $pernikahan->d_ktp_ibu=$filename;
        }
        if ($request->hasFile('d_sp_ortu')) {
            $person = $request->file('d_sp_ortu');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/pernikahan/d_sp_ortu';
                $person->move($destinationPath, $filename);
                $pernikahan->d_sp_ortu=$filename;
        }
        if ($request->hasFile('d_perceraian_ortu')) {
            $person = $request->file('d_perceraian_ortu');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/pernikahan/d_perceraian_ortu';
                $person->move($destinationPath, $filename);
                $pernikahan->d_perceraian_ortu=$filename;
        }
        if ($request->hasFile('d_baptisan')) {
            $person = $request->file('d_baptisan');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/pernikahan/d_baptisan';
                $person->move($destinationPath, $filename);
                $pernikahan->d_baptisan=$filename;
        }
        if ($request->hasFile('d_kkj')) {
            $person = $request->file('d_kkj');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/pernikahan/d_kkj';
                $person->move($destinationPath, $filename);
                $pernikahan->d_kkj=$filename;
        }
        if ($request->hasFile('d_sertifikat_kom')) {
            $person = $request->file('d_sertifikat_kom');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/pernikahan/d_sertifikat_kom';
                $person->move($destinationPath, $filename);
                $pernikahan->d_sertifikat_kom=$filename;
        }
        if ($request->hasFile('d_sertifikat_bpn')) {
            $person = $request->file('d_sertifikat_bpn');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/pernikahan/d_sertifikat_bpn';
                $person->move($destinationPath, $filename);
                $pernikahan->d_sertifikat_bpn=$filename;
        }
        if ($request->hasFile('d_foto1')) {
            $person = $request->file('d_foto1');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/pernikahan/d_foto1';
                $person->move($destinationPath, $filename);
                $pernikahan->d_foto1=$filename;
        }if ($request->hasFile('d_foto2')) {
            $person = $request->file('d_foto2');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/pernikahan/d_foto2';
                $person->move($destinationPath, $filename);
                $pernikahan->d_foto2=$filename;
        }if ($request->hasFile('d_foto3')) {
            $person = $request->file('d_foto3');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/pernikahan/d_foto3';
                $person->move($destinationPath, $filename);
                $pernikahan->d_foto3=$filename;
        }
        if ($request->hasFile('d_saksi1')) {
            $person = $request->file('d_saksi1');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/pernikahan/d_saksi1';
                $person->move($destinationPath, $filename);
                $pernikahan->d_saksi1=$filename;
        }
        if ($request->hasFile('d_saksi2')) {
            $person = $request->file('d_saksi2');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/pernikahan/d_saksi2';
                $person->move($destinationPath, $filename);
                $pernikahan->d_saksi2=$filename;
        }
        if ($request->hasFile('d_pasangan_dulu')) {
            $person = $request->file('d_pasangan_dulu');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/pernikahan/d_pasangan_dulu';
                $person->move($destinationPath, $filename);
                $pernikahan->d_pasangan_dulu=$filename;
        }
        if ($request->hasFile('d_konseling')) {
            $person = $request->file('d_konseling');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/pernikahan/d_konseling';
                $person->move($destinationPath, $filename);
                $pernikahan->d_konseling=$filename;
        }
        if ($request->hasFile('d_sp_kelurahan')) {
            $person = $request->file('d_sp_kelurahan');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/pernikahan/d_sp_kelurahan';
                $person->move($destinationPath, $filename);
                $pernikahan->d_sp_kelurahan=$filename;
        }
        if ($request->hasFile('d_berita')) {
            $person = $request->file('d_berita');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/pernikahan/d_berita';
                $person->move($destinationPath, $filename);
                $pernikahan->d_berita=$filename;
        }
        if ($request->hasFile('d_lain')) {
            $person = $request->file('d_lain');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/pernikahan/d_lain';
                $person->move($destinationPath, $filename);
                $pernikahan->d_lain=$filename;
        }
        
        $pernikahan->save();


        return redirect('modul/pelayanjemaat/pernikahan');
    }
    public function akta_update(Request $request,$id)
    {
        //
       //  $personal = Personal::find($request->caper1);
       //  if ($request->hasFile('urlphoto')) {
       //      $person = $request->file('urlphoto');
       //      $extension = $person->getClientOriginalExtension();
       //      $filename = str_random('6'). '.' .$extension;
       //      $destinationPath = public_path() . 
       //          DIRECTORY_SEPARATOR . 'assets/foto';
       //          $person->move($destinationPath, $filename);
       //          $personal->urlphoto=$filename;
       //  }
       //  $personal->ktpid = $request->noktp;
       //  $personal->ktpberlakusd = $request->berlaku;
       //  $personal->nokkj = $request->nokkj;
       //  $personal->tempatlahir = $request->tela;
       //  $personal->tanggallahir = $request->tala;
       //  $personal->namalengkap = $request->nama;
       //  $personal->jeniskelamin = $request->jk;
       //  $personal->golongandarah = $request->gol;
       //  $personal->alamattinggal = $request->alamat;
       //  $personal->rtrw = $request->rtrw;
       //  $personal->kelurahan = $request->villages;
       //  $personal->kecamatan = $request->districts;
       //  $personal->kabkota = $request->regencies;
       //  $personal->provinsi = $request->provinces;
       //  $personal->kodepos = $request->kodepos;
       //  $personal->agama = $request->agama;
       //  $personal->statusperkawinan = $request->sk;
       //  $personal->sejaktanggalstatuskawin = $request->tsk;
       //  $personal->kewarganegaraan = $request->kewarganegaraan;
       //  $personal->statuspersonal = $request->sp;
       //  $personal->sejaktanggalstatuspersonal = $request->stp;

       //  $personal->save();
        

        

       // $pasangan = Personal::find($request->caper2);
       //  $pasangan->idpersonal = $ida;
       //  if ($request->hasFile('urlphoto_p')) {
       //      $person = $request->file('urlphoto_p');
       //      $extension = $person->getClientOriginalExtension();
       //      $filename = str_random('6'). '.' .$extension;
       //      $destinationPath = public_path() . 
       //          DIRECTORY_SEPARATOR . 'assets/foto';
       //          $person->move($destinationPath, $filename);
       //          $pasangan->urlphoto=$filename;
       //  }
       //  $pasangan->ktpid = $request->noktp_p;
       //  $pasangan->ktpberlakusd = $request->berlaku_p;
       //  $pasangan->nokkj = $request->nokkj_p;
       //  $pasangan->tempatlahir = $request->tela_p;
       //  $pasangan->tanggallahir = $request->tala_p;
       //  $pasangan->namalengkap = $request->nama_p;
       //  $pasangan->jeniskelamin = $request->jk_p;
       //  $pasangan->golongandarah = $request->gol_p;
       //  $pasangan->alamattinggal = $request->alamat_p;
       //  $pasangan->rtrw = $request->rtrw_p;
       //  $pasangan->kelurahan = $request->villages_p;
       //  $pasangan->kecamatan = $request->districts_p;
       //  $pasangan->kabkota = $request->regencies_p;
       //  $pasangan->provinsi = $request->provinces_p;
       //  $pasangan->kodepos = $request->kodepos_p;
       //  $pasangan->agama = $request->agama_p;
       //  $pasangan->statusperkawinan = $request->sk_p;
       //  $pasangan->sejaktanggalstatuskawin = $request->tsk_p;
       //  $pasangan->kewarganegaraan = $request->kewarganegaraan_p;
       //  $pasangan->statuspersonal = $request->sp_p;
       //  $pasangan->sejaktanggalstatuspersonal = $request->stp_p;
       //  $pasangan->save();
        
        // $ayahibu = Ayahibu::find($id);
        // $ayahibu->idpersonal=$request->personal;
        // $ayahibu->idayahper=$request->idayahper;
        // $ayahibu->namadepan=$request->namaayah_depan;
        // $ayahibu->namatengah=$request->namaayah_tengah;
        // $ayahibu->namabelakang=$request->namaayah_belakang;
        // $ayahibu->idibuper=$request->idibuper;
        // $ayahibu->namadepanibu=$request->namaibu_depan;
        // $ayahibu->namatengahibu=$request->namaibu_tengah;
        // $ayahibu->namabelakangibu=$request->namaibu_belakang;
        // $ayahibu->save();

        $pernikahan = Nikah::findOrFail($id);
        $pernikahan->idpasangan=$request->caper1;
        $pernikahan->idpersonal=$request->caper2;
        $pernikahan->idcabangranting=$request->idcabangranting;
        $pernikahan->idayahibupas=$request->idayahibupas;
        $pernikahan->idpelayan=$request->idpelayan;
        $pernikahan->petugas=$request->petugas;
        $pernikahan->menyatakan=$request->menyatakan;
        $pernikahan->penerima=$request->penerima;
        $pernikahan->verifikasi=$request->verifikasi;
        $pernikahan->validasi=$request->validasi;
        $pernikahan->noakta=$request->noakta;
        $pernikahan->tanggal=$request->tanggal;
        $pernikahan->tempatpernikahan=$request->tempat;
        $pernikahan->keterangan=$request->keterangan;
        $pernikahan->status='Menerima Akta Pernikahan';

        if ($request->hasFile('d_akta')) {
            $person = $request->file('d_akta');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/pernikahan/d_aktakelahiran';
                $person->move($destinationPath, $filename);
                $pernikahan->d_aktakelahiran=$filename;
        }
        if ($request->hasFile('dokumen')) {
            $person = $request->file('dokumen');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/pernikahan/dokumen';
                $person->move($destinationPath, $filename);
                $pernikahan->dokumen=$filename;
        }
        if ($request->hasFile('d_ktp')) {
            $person = $request->file('d_ktp');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/pernikahan/d_ktp';
                $person->move($destinationPath, $filename);
                $pernikahan->d_ktp=$filename;
        }
        if ($request->hasFile('d_sk_nikah')) {
            $person = $request->file('d_sk_nikah');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/pernikahan/d_sk_nikah';
                $person->move($destinationPath, $filename);
                $pernikahan->d_sk_nikah=$filename;
        }
        if ($request->hasFile('d_sk_asal')) {
            $person = $request->file('d_sk_asal');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/pernikahan/d_sk_asal';
                $person->move($destinationPath, $filename);
                $pernikahan->d_sk_asal=$filename;
        }
        if ($request->hasFile('d_sk_ortu')) {
            $person = $request->file('d_sk_ortu');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/pernikahan/d_sk_ortu';
                $person->move($destinationPath, $filename);
                $pernikahan->d_sk_ortu=$filename;
        }
        if ($request->hasFile('d_sp_belummenikah')) {
            $person = $request->file('d_sp_belummenikah');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/pernikahan/d_sp_belummenikah';
                $person->move($destinationPath, $filename);
                $pernikahan->d_sp_belummenikah=$filename;
        }
        if ($request->hasFile('d_kk')) {
            $person = $request->file('d_kk');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/pernikahan/d_kk';
                $person->move($destinationPath, $filename);
                $pernikahan->d_kk=$filename;
        }
        if ($request->hasFile('d_ktp_ayah')) {
            $person = $request->file('d_ktp_ayah');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/pernikahan/d_ktp_ayah';
                $person->move($destinationPath, $filename);
                $pernikahan->d_ktp_ayah=$filename;
        }
        if ($request->hasFile('d_ktp_ibu')) {
            $person = $request->file('d_ktp_ibu');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/pernikahan/d_ktp_ibu';
                $person->move($destinationPath, $filename);
                $pernikahan->d_ktp_ibu=$filename;
        }
        if ($request->hasFile('d_sp_ortu')) {
            $person = $request->file('d_sp_ortu');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/pernikahan/d_sp_ortu';
                $person->move($destinationPath, $filename);
                $pernikahan->d_sp_ortu=$filename;
        }
        if ($request->hasFile('d_perceraian_ortu')) {
            $person = $request->file('d_perceraian_ortu');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/pernikahan/d_perceraian_ortu';
                $person->move($destinationPath, $filename);
                $pernikahan->d_perceraian_ortu=$filename;
        }
        if ($request->hasFile('d_baptisan')) {
            $person = $request->file('d_baptisan');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/pernikahan/d_baptisan';
                $person->move($destinationPath, $filename);
                $pernikahan->d_baptisan=$filename;
        }
        if ($request->hasFile('d_kkj')) {
            $person = $request->file('d_kkj');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/pernikahan/d_kkj';
                $person->move($destinationPath, $filename);
                $pernikahan->d_kkj=$filename;
        }
        if ($request->hasFile('d_sertifikat_kom')) {
            $person = $request->file('d_sertifikat_kom');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/pernikahan/d_sertifikat_kom';
                $person->move($destinationPath, $filename);
                $pernikahan->d_sertifikat_kom=$filename;
        }
        if ($request->hasFile('d_sertifikat_bpn')) {
            $person = $request->file('d_sertifikat_bpn');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/pernikahan/d_sertifikat_bpn';
                $person->move($destinationPath, $filename);
                $pernikahan->d_sertifikat_bpn=$filename;
        }
        if ($request->hasFile('d_foto1')) {
            $person = $request->file('d_foto1');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/pernikahan/d_foto1';
                $person->move($destinationPath, $filename);
                $pernikahan->d_foto1=$filename;
        }if ($request->hasFile('d_foto2')) {
            $person = $request->file('d_foto2');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/pernikahan/d_foto2';
                $person->move($destinationPath, $filename);
                $pernikahan->d_foto2=$filename;
        }if ($request->hasFile('d_foto3')) {
            $person = $request->file('d_foto3');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/pernikahan/d_foto3';
                $person->move($destinationPath, $filename);
                $pernikahan->d_foto3=$filename;
        }
        if ($request->hasFile('d_saksi1')) {
            $person = $request->file('d_saksi1');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/pernikahan/d_saksi1';
                $person->move($destinationPath, $filename);
                $pernikahan->d_saksi1=$filename;
        }
        if ($request->hasFile('d_saksi2')) {
            $person = $request->file('d_saksi2');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/pernikahan/d_saksi2';
                $person->move($destinationPath, $filename);
                $pernikahan->d_saksi2=$filename;
        }
        if ($request->hasFile('d_pasangan_dulu')) {
            $person = $request->file('d_pasangan_dulu');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/pernikahan/d_pasangan_dulu';
                $person->move($destinationPath, $filename);
                $pernikahan->d_pasangan_dulu=$filename;
        }
        if ($request->hasFile('d_konseling')) {
            $person = $request->file('d_konseling');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/pernikahan/d_konseling';
                $person->move($destinationPath, $filename);
                $pernikahan->d_konseling=$filename;
        }
        if ($request->hasFile('d_sp_kelurahan')) {
            $person = $request->file('d_sp_kelurahan');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/pernikahan/d_sp_kelurahan';
                $person->move($destinationPath, $filename);
                $pernikahan->d_sp_kelurahan=$filename;
        }
        if ($request->hasFile('d_berita')) {
            $person = $request->file('d_berita');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/pernikahan/d_berita';
                $person->move($destinationPath, $filename);
                $pernikahan->d_berita=$filename;
        }
        if ($request->hasFile('d_lain')) {
            $person = $request->file('d_lain');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/pernikahan/d_lain';
                $person->move($destinationPath, $filename);
                $pernikahan->d_lain=$filename;
        }
        
        $pernikahan->save();
        return redirect('modul/pelayanjemaat/pernikahan');
    }
    
}
