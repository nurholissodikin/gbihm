<?php

namespace App\Http\Controllers;

use App\Baptisanair;
use App\Personal;
use App\Ayahibu;
use App\Cabang; 
use App\Vbaptisan;
use Illuminate\Http\Request;

class BaptisanairController extends Controller
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

        $ai = Ayahibu::orderBy('id','DESC')->first();
        $ida = ($ai != null) ? $ai->id+1: '1';
        $ayahibu = new Ayahibu;
        $ayahibu->id=$ida;
        $ayahibu->idpersonal=$request->idper;
        $ayahibu->idayahper=$request->idayahper;
        $ayahibu->namadepan=$request->namaayah_depan;
        $ayahibu->namatengah=$request->namaayah_tengah;
        $ayahibu->namabelakang=$request->namaayah_belakang;
        $ayahibu->idibuper=$request->idibuper;
        $ayahibu->namadepanibu=$request->namaibu_depan;
        $ayahibu->namatengahibu=$request->namaibu_tengah;
        $ayahibu->namabelakangibu=$request->namaibu_belakang;
        $ayahibu->save();


        $bap_air = Baptisanair::orderBy('idbaptisan','DESC')->first();
        $id = ($bap_air != null) ? $bap_air->idbaptisan+1: '1';
        $baptisan = new Baptisanair;
        $baptisan->idbaptisan=$id;
        $baptisan->idpersonal=$request->idper;
        $baptisan->idcabangranting=$request->idcabangranting;
        $baptisan->idayahibubap=$ayahibu->id;
        $baptisan->idpelayan=$request->idpelayan;
        $baptisan->noakta=$request->noakta;
        $baptisan->tanggal=$request->tanggal;
        $baptisan->baptisanair=$request->baptisanair;
        $baptisan->keterangan=$request->keterangan;
        $baptisan->status=$request->status;

        if ($request->hasFile('d_akta')) {
            $person = $request->file('d_akta');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/baptisan/d_aktakelahiran';
                $person->move($destinationPath, $filename);
                $baptisan->d_aktakelahiran=$filename;
        }
        if ($request->hasFile('d_ktppass')) {
            $person = $request->file('d_ktppass');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/baptisan/d_ktppass';
                $person->move($destinationPath, $filename);
                $baptisan->d_ktppass=$filename;
        }
        if ($request->hasFile('d_kk')) {
            $person = $request->file('d_kk');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/baptisan/d_kartukeluarga';
                $person->move($destinationPath, $filename);
                $baptisan->d_kk=$filename;
        }
        if ($request->hasFile('d_kkj')) {
            $person = $request->file('d_kkj');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/baptisan/kkj';
                $person->move($destinationPath, $filename);
                $baptisan->d_kkj=$filename;
        }
        if ($request->hasFile('d_foto1')) {
            $person = $request->file('d_foto1');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/baptisan/d_foto1';
                $person->move($destinationPath, $filename);
                $baptisan->d_foto1=$filename;
        }
        if ($request->hasFile('d_foto2')) {
            $person = $request->file('d_foto2');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/baptisan/d_foto2';
                $person->move($destinationPath, $filename);
                $baptisan->d_foto2=$filename;
        }
        if ($request->hasFile('d_perceraian')) {
            $person = $request->file('d_perceraian');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/baptisan/d_perceraian';
                $person->move($destinationPath, $filename);
                $baptisan->d_perceraian=$filename;
        }
        if ($request->hasFile('d_saksi1')) {
            $person = $request->file('d_saksi1');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/baptisan/d_saksi1';
                $person->move($destinationPath, $filename);
                $baptisan->d_saksi1=$filename;
        }
        if ($request->hasFile('d_saksi2')) {
            $person = $request->file('d_saksi2');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/baptisan/d_saksi2';
                $person->move($destinationPath, $filename);
                $baptisan->d_saksi2=$filename;
        }
        if ($request->hasFile('d_sp_ortu')) {
            $person = $request->file('d_sp_ortu');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/baptisan/d_sp_ortu';
                $person->move($destinationPath, $filename);
                $baptisan->d_sp_ortu=$filename;
        }
        if ($request->hasFile('d_ktp_ortu')) {
            $person = $request->file('d_ktp_ortu');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/baptisan/d_ktp_ortu';
                $person->move($destinationPath, $filename);
                $baptisan->d_ktp_ortu=$filename;
        }
        if ($request->hasFile('d_kawin_ortu')) {
            $person = $request->file('d_kawin_ortu');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/baptisan/d_kawin_ortu';
                $person->move($destinationPath, $filename);
                $baptisan->d_kawin_ortu=$filename;
        }
        if ($request->hasFile('d_sp_agama')) {
            $person = $request->file('d_sp_agama');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/baptisan/d_sp_agama';
                $person->move($destinationPath, $filename);
                $baptisan->d_sp_agama=$filename;
        }
        if ($request->hasFile('d_kawin_ortu')) {
            $person = $request->file('d_kawin_ortu');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/baptisan/d_kawin_ortu';
                $person->move($destinationPath, $filename);
                $baptisan->d_kawin_ortu=$filename;
        }
        if ($request->hasFile('d_ttd_baptisan')) {
            $person = $request->file('d_ttd_baptisan');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/baptisan/d_ttd_baptisan';
                $person->move($destinationPath, $filename);
                $baptisan->d_ttd_baptisan=$filename;
        }
        if ($request->hasFile('d_berita')) {
            $person = $request->file('d_berita');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/baptisan/d_berita';
                $person->move($destinationPath, $filename);
                $baptisan->d_berita=$filename;
        }
        if ($request->hasFile('d_pendaftaran')) {
            $person = $request->file('d_pendaftaran');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/baptisan/d_pendaftaran';
                $person->move($destinationPath, $filename);
                $baptisan->d_pendaftaran=$filename;
        }
        if ($request->hasFile('d_lain')) {
            $person = $request->file('d_lain');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/baptisan/d_lain';
                $person->move($destinationPath, $filename);
                $baptisan->d_lain=$filename;
        }
        $baptisan->save();


        return $baptisan;

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Baptisanair  $baptisanair
     * @return \Illuminate\Http\Response
     */
    public function show(Baptisanair $baptisanair)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Baptisanair  $baptisanair
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $baptisan = Vbaptisan::FindOrfail($id);
        return $baptisan;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Baptisanair  $baptisanair
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $ayahibu = Ayahibu::find($request->id_ayahibubrk);
        $ayahibu->idpersonal=$request->idper;
        $ayahibu->idayahper=$request->idayahper;
        $ayahibu->namadepan=$request->namaayah_depan;
        $ayahibu->namatengah=$request->namaayah_tengah;
        $ayahibu->namabelakang=$request->namaayah_belakang;
        $ayahibu->idibuper=$request->idibuper;
        $ayahibu->namadepanibu=$request->namaibu_depan;
        $ayahibu->namatengahibu=$request->namaibu_tengah;
        $ayahibu->namabelakangibu=$request->namaibu_belakang;
        $ayahibu->save();


       
        $baptisan = Baptisanair::findOrFail($id);
        $baptisan->idpersonal=$request->idper;
        $baptisan->idcabangranting=$request->idcabangranting;
        $baptisan->idayahibubap=$ayahibu->id;
        $baptisan->idpelayan=$request->idpelayan;
        $baptisan->noakta=$request->noakta;
        $baptisan->tanggal=$request->tanggal;
        $baptisan->baptisanair=$request->baptisanair;
        $baptisan->keterangan=$request->keterangan;


        if ($request->hasFile('d_akta')) {
            $person = $request->file('d_akta');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/baptisan/d_aktakelahiran';
                $person->move($destinationPath, $filename);
                $baptisan->d_aktakelahiran=$filename;
        }
        if ($request->hasFile('d_ktppass')) {
            $person = $request->file('d_ktppass');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/baptisan/d_ktppass';
                $person->move($destinationPath, $filename);
                $baptisan->d_ktppass=$filename;
        }
        if ($request->hasFile('d_kk')) {
            $person = $request->file('d_kk');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/baptisan/d_kartukeluarga';
                $person->move($destinationPath, $filename);
                $baptisan->d_kk=$filename;
        }
        if ($request->hasFile('d_kkj')) {
            $person = $request->file('d_kkj');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/baptisan/kkj';
                $person->move($destinationPath, $filename);
                $baptisan->d_kkj=$filename;
        }
        if ($request->hasFile('d_foto1')) {
            $person = $request->file('d_foto1');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/baptisan/d_foto1';
                $person->move($destinationPath, $filename);
                $baptisan->d_foto1=$filename;
        }
        if ($request->hasFile('d_foto2')) {
            $person = $request->file('d_foto2');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/baptisan/d_foto2';
                $person->move($destinationPath, $filename);
                $baptisan->d_foto2=$filename;
        }
        if ($request->hasFile('d_perceraian')) {
            $person = $request->file('d_perceraian');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/baptisan/d_perceraian';
                $person->move($destinationPath, $filename);
                $baptisan->d_perceraian=$filename;
        }
        if ($request->hasFile('d_saksi1')) {
            $person = $request->file('d_saksi1');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/baptisan/d_saksi1';
                $person->move($destinationPath, $filename);
                $baptisan->d_saksi1=$filename;
        }
        if ($request->hasFile('d_saksi2')) {
            $person = $request->file('d_saksi2');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/baptisan/d_saksi2';
                $person->move($destinationPath, $filename);
                $baptisan->d_saksi2=$filename;
        }
        if ($request->hasFile('d_sp_ortu')) {
            $person = $request->file('d_sp_ortu');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/baptisan/d_sp_ortu';
                $person->move($destinationPath, $filename);
                $baptisan->d_sp_ortu=$filename;
        }
        if ($request->hasFile('d_ktp_ortu')) {
            $person = $request->file('d_ktp_ortu');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/baptisan/d_ktp_ortu';
                $person->move($destinationPath, $filename);
                $baptisan->d_ktp_ortu=$filename;
        }
        if ($request->hasFile('d_kawin_ortu')) {
            $person = $request->file('d_kawin_ortu');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/baptisan/d_kawin_ortu';
                $person->move($destinationPath, $filename);
                $baptisan->d_kawin_ortu=$filename;
        }
        if ($request->hasFile('d_sp_agama')) {
            $person = $request->file('d_sp_agama');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/baptisan/d_sp_agama';
                $person->move($destinationPath, $filename);
                $baptisan->d_sp_agama=$filename;
        }
        if ($request->hasFile('d_kawin_ortu')) {
            $person = $request->file('d_kawin_ortu');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/baptisan/d_kawin_ortu';
                $person->move($destinationPath, $filename);
                $baptisan->d_kawin_ortu=$filename;
        }
        if ($request->hasFile('d_ttd_baptisan')) {
            $person = $request->file('d_ttd_baptisan');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/baptisan/d_ttd_baptisan';
                $person->move($destinationPath, $filename);
                $baptisan->d_ttd_baptisan=$filename;
        }
        if ($request->hasFile('d_berita')) {
            $person = $request->file('d_berita');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/baptisan/d_berita';
                $person->move($destinationPath, $filename);
                $baptisan->d_berita=$filename;
        }
        if ($request->hasFile('d_pendaftaran')) {
            $person = $request->file('d_pendaftaran');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/baptisan/d_pendaftaran';
                $person->move($destinationPath, $filename);
                $baptisan->d_pendaftaran=$filename;
        }
        if ($request->hasFile('d_lain')) {
            $person = $request->file('d_lain');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/baptisan/d_lain';
                $person->move($destinationPath, $filename);
                $baptisan->d_lain=$filename;
        }
        $baptisan->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Baptisanair  $baptisanair
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
         $baptisan = Baptisanair::findOrFail($id);
        $baptisan->delete();
        return $baptisan;
    }
    public function get_data_baper($id_personal){
        $personal = Personal::where('idpersonal',$id_personal)->first();

        $auto = [];
        $auto['id_personal'] = $personal->idpersonal;
        $auto['nama_depan'] = $personal->namadepan;
        $auto['nama_tengah'] = $personal->namatengah;
        $auto['nama_belakang'] = $personal->namabelakang;
        $auto['tempat_la'] = $personal->tempatlahir;
        $auto['tanggal_la'] = $personal->tanggallahir;
        $auto['jk_la'] = $personal->jeniskelamin;
        $auto['alamat'] = $personal->alamattinggal;
        $auto['rtrw_la'] = $personal->rtrw;
        $auto['provinsi_la'] = $personal->provinsi;
        $auto['districts'] = $personal->kecamatan;
        $auto['villages'] = $personal->kelurahan;
        $auto['regencies'] = $personal->kabkota;
        $auto['kodepos_la'] = $personal->kodepos;
        
        return $auto;
    }

    public function baptisan(){
        $baptisan = Vbaptisan::where('status','Menerima Akta Baptisanair')->get();
        return view('frontend.modul.jemaat.baptisan.index',compact('baptisan'));
    }
    public function baptisan_caper(){
        $baptisan = Vbaptisan::where('status','!=','Menerima Akta Baptisanair')->get();
        return view('frontend.modul.jemaat.baptisan.caper.index',compact('baptisan'));
    }
    public function baptisan_create(){
        $personal = Personal::all();
        $cabang = Cabang::all();
        return view('frontend.modul.jemaat.baptisan.tambah.index',compact('personal','cabang'));
    }
    public function baptisan_caper_edit($id){
        $baptisan = Vbaptisan::FindOrfail($id);
        $personal = Personal::all();
        $cabang = Cabang::all();
        return view('frontend.modul.jemaat.baptisan.caper.edit',compact('personal','cabang','baptisan'));
    }
    public function baptisan_caper_detail($id){
        $baptisan = Vbaptisan::FindOrfail($id);
        $personal = Personal::all();
        $cabang = Cabang::all();
        return view('frontend.modul.jemaat.baptisan.detail.detail_akta',compact('personal','cabang','baptisan'));
    }
    public function akta_edit($id){
        $baptisan = Vbaptisan::FindOrfail($id);
        $personal = Personal::all();
        $cabang = Cabang::all();
        return view('frontend.modul.jemaat.baptisan.tambah.edit',compact('personal','cabang','baptisan'));
    }
    public function akta_detail($id){
        $baptisan = Vbaptisan::FindOrfail($id);
        $personal = Personal::all();
        $cabang = Cabang::all();
        return view('frontend.modul.jemaat.baptisan.tambah.detail',compact('personal','cabang','baptisan'));
    }
    public function baptisan_pendaftaran(){
        $personal = Personal::all();
        $cabang = Cabang::all();
        return view('frontend.modul.jemaat.baptisan.pendaftaran.index',compact('personal','cabang'));
    }

    public function baptisan_store(Request $request)
    {
        //
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


        $bap_air = Baptisanair::orderBy('idbaptisan','DESC')->first();
        $id = ($bap_air != null) ? $bap_air->idbaptisan+1: '1';
        $baptisan = new Baptisanair;
        $baptisan->idbaptisan=$id;
        $baptisan->idpersonal=$request->personal;
        $baptisan->idcabangranting=$request->idcabangranting;
        $baptisan->idayahibubap=$ayahibu->id;
        $baptisan->idpelayan=$request->idpelayan;
        $baptisan->noakta=$request->noakta;
        $baptisan->tanggal=$request->tanggal;
        $baptisan->baptisanair=$request->baptisanair;
        $baptisan->keterangan=$request->keterangan;
        $baptisan->status=$request->status;

        if ($request->hasFile('d_akta')) {
            $person = $request->file('d_akta');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/baptisan/d_aktakelahiran';
                $person->move($destinationPath, $filename);
                $baptisan->d_aktakelahiran=$filename;
        }
        if ($request->hasFile('d_ktppass')) {
            $person = $request->file('d_ktppass');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/baptisan/d_ktppass';
                $person->move($destinationPath, $filename);
                $baptisan->d_ktppass=$filename;
        }
        if ($request->hasFile('d_kk')) {
            $person = $request->file('d_kk');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/baptisan/d_kartukeluarga';
                $person->move($destinationPath, $filename);
                $baptisan->d_kk=$filename;
        }
        if ($request->hasFile('d_kkj')) {
            $person = $request->file('d_kkj');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/baptisan/kkj';
                $person->move($destinationPath, $filename);
                $baptisan->d_kkj=$filename;
        }
        if ($request->hasFile('d_foto1')) {
            $person = $request->file('d_foto1');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/baptisan/d_foto1';
                $person->move($destinationPath, $filename);
                $baptisan->d_foto1=$filename;
        }
        if ($request->hasFile('d_foto2')) {
            $person = $request->file('d_foto2');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/baptisan/d_foto2';
                $person->move($destinationPath, $filename);
                $baptisan->d_foto2=$filename;
        }
        if ($request->hasFile('d_perceraian')) {
            $person = $request->file('d_perceraian');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/baptisan/d_perceraian';
                $person->move($destinationPath, $filename);
                $baptisan->d_perceraian=$filename;
        }
        if ($request->hasFile('d_saksi1')) {
            $person = $request->file('d_saksi1');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/baptisan/d_saksi1';
                $person->move($destinationPath, $filename);
                $baptisan->d_saksi1=$filename;
        }
        if ($request->hasFile('d_saksi2')) {
            $person = $request->file('d_saksi2');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/baptisan/d_saksi2';
                $person->move($destinationPath, $filename);
                $baptisan->d_saksi2=$filename;
        }
        if ($request->hasFile('d_sp_ortu')) {
            $person = $request->file('d_sp_ortu');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/baptisan/d_sp_ortu';
                $person->move($destinationPath, $filename);
                $baptisan->d_sp_ortu=$filename;
        }
        if ($request->hasFile('d_ktp_ortu')) {
            $person = $request->file('d_ktp_ortu');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/baptisan/d_ktp_ortu';
                $person->move($destinationPath, $filename);
                $baptisan->d_ktp_ortu=$filename;
        }
        if ($request->hasFile('d_kawin_ortu')) {
            $person = $request->file('d_kawin_ortu');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/baptisan/d_kawin_ortu';
                $person->move($destinationPath, $filename);
                $baptisan->d_kawin_ortu=$filename;
        }
        if ($request->hasFile('d_sp_agama')) {
            $person = $request->file('d_sp_agama');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/baptisan/d_sp_agama';
                $person->move($destinationPath, $filename);
                $baptisan->d_sp_agama=$filename;
        }
        if ($request->hasFile('d_kawin_ortu')) {
            $person = $request->file('d_kawin_ortu');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/baptisan/d_kawin_ortu';
                $person->move($destinationPath, $filename);
                $baptisan->d_kawin_ortu=$filename;
        }
        if ($request->hasFile('d_ttd_baptisan')) {
            $person = $request->file('d_ttd_baptisan');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/baptisan/d_ttd_baptisan';
                $person->move($destinationPath, $filename);
                $baptisan->d_ttd_baptisan=$filename;
        }
        if ($request->hasFile('d_berita')) {
            $person = $request->file('d_berita');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/baptisan/d_berita';
                $person->move($destinationPath, $filename);
                $baptisan->d_berita=$filename;
        }
        if ($request->hasFile('d_pendaftaran')) {
            $person = $request->file('d_pendaftaran');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/baptisan/d_pendaftaran';
                $person->move($destinationPath, $filename);
                $baptisan->d_pendaftaran=$filename;
        }
        if ($request->hasFile('d_lain')) {
            $person = $request->file('d_lain');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/baptisan/d_lain';
                $person->move($destinationPath, $filename);
                $baptisan->d_lain=$filename;
        }
        $baptisan->save();


        return redirect('modul/pelayanjemaat/baptisan');
    }
    public function akta_update(Request $request, $id)
    {
        //

        $ayahibu = Ayahibu::find($request->id_ayahibubrk);
        $ayahibu->idpersonal=$request->idper;
        $ayahibu->idayahper=$request->idayahper;
        $ayahibu->namadepan=$request->namaayah_depan;
        $ayahibu->namatengah=$request->namaayah_tengah;
        $ayahibu->namabelakang=$request->namaayah_belakang;
        $ayahibu->idibuper=$request->idibuper;
        $ayahibu->namadepanibu=$request->namaibu_depan;
        $ayahibu->namatengahibu=$request->namaibu_tengah;
        $ayahibu->namabelakangibu=$request->namaibu_belakang;
        $ayahibu->save();
       
        $baptisan = Baptisanair::findOrFail($id);
        $baptisan->idpersonal=$request->idper;
        $baptisan->idcabangranting=$request->idcabangranting;
        $baptisan->idayahibubap=$request->id_ayahibubrk;
        $baptisan->idpelayan=$request->idpelayan;
        $baptisan->noakta=$request->noakta;
        $baptisan->tanggal=$request->tanggal;
        $baptisan->baptisanair=$request->baptisanair;
        $baptisan->keterangan=$request->keterangan;


        if ($request->hasFile('d_akta')) {
            $person = $request->file('d_akta');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/baptisan/d_aktakelahiran';
                $person->move($destinationPath, $filename);
                $baptisan->d_aktakelahiran=$filename;
        }
        if ($request->hasFile('d_ktppass')) {
            $person = $request->file('d_ktppass');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/baptisan/d_ktppass';
                $person->move($destinationPath, $filename);
                $baptisan->d_ktppass=$filename;
        }
        if ($request->hasFile('d_kk')) {
            $person = $request->file('d_kk');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/baptisan/d_kartukeluarga';
                $person->move($destinationPath, $filename);
                $baptisan->d_kk=$filename;
        }
        if ($request->hasFile('d_kkj')) {
            $person = $request->file('d_kkj');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/baptisan/d_kkj';
                $person->move($destinationPath, $filename);
                $baptisan->d_kkj=$filename;
        }
        if ($request->hasFile('d_foto1')) {
            $person = $request->file('d_foto1');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/baptisan/d_foto1';
                $person->move($destinationPath, $filename);
                $baptisan->d_foto1=$filename;
        }
        if ($request->hasFile('d_foto2')) {
            $person = $request->file('d_foto2');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/baptisan/d_foto2';
                $person->move($destinationPath, $filename);
                $baptisan->d_foto2=$filename;
        }
        if ($request->hasFile('d_perceraian')) {
            $person = $request->file('d_perceraian');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/baptisan/d_perceraian';
                $person->move($destinationPath, $filename);
                $baptisan->d_perceraian=$filename;
        }
        if ($request->hasFile('d_saksi1')) {
            $person = $request->file('d_saksi1');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/baptisan/d_saksi1';
                $person->move($destinationPath, $filename);
                $baptisan->d_saksi1=$filename;
        }
        if ($request->hasFile('d_saksi2')) {
            $person = $request->file('d_saksi2');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/baptisan/d_saksi2';
                $person->move($destinationPath, $filename);
                $baptisan->d_saksi2=$filename;
        }
        if ($request->hasFile('d_sp_ortu')) {
            $person = $request->file('d_sp_ortu');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/baptisan/d_sp_ortu';
                $person->move($destinationPath, $filename);
                $baptisan->d_sp_ortu=$filename;
        }
        if ($request->hasFile('d_ktp_ortu')) {
            $person = $request->file('d_ktp_ortu');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/baptisan/d_ktp_ortu';
                $person->move($destinationPath, $filename);
                $baptisan->d_ktp_ortu=$filename;
        }
        if ($request->hasFile('d_kawin_ortu')) {
            $person = $request->file('d_kawin_ortu');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/baptisan/d_kawin_ortu';
                $person->move($destinationPath, $filename);
                $baptisan->d_kawin_ortu=$filename;
        }
        if ($request->hasFile('d_sp_agama')) {
            $person = $request->file('d_sp_agama');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/baptisan/d_sp_agama';
                $person->move($destinationPath, $filename);
                $baptisan->d_sp_agama=$filename;
        }
        if ($request->hasFile('d_kawin_ortu')) {
            $person = $request->file('d_kawin_ortu');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/baptisan/d_kawin_ortu';
                $person->move($destinationPath, $filename);
                $baptisan->d_kawin_ortu=$filename;
        }
        if ($request->hasFile('d_ttd_baptisan')) {
            $person = $request->file('d_ttd_baptisan');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/baptisan/d_ttd_baptisan';
                $person->move($destinationPath, $filename);
                $baptisan->d_ttd_baptisan=$filename;
        }
        if ($request->hasFile('d_berita')) {
            $person = $request->file('d_berita');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/baptisan/d_berita';
                $person->move($destinationPath, $filename);
                $baptisan->d_berita=$filename;
        }
        if ($request->hasFile('d_pendaftaran')) {
            $person = $request->file('d_pendaftaran');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/baptisan/d_pendaftaran';
                $person->move($destinationPath, $filename);
                $baptisan->d_pendaftaran=$filename;
        }
        if ($request->hasFile('d_lain')) {
            $person = $request->file('d_lain');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/baptisan/d_lain';
                $person->move($destinationPath, $filename);
                $baptisan->d_lain=$filename;
        }
        $baptisan->save();

        return redirect('modul/pelayanjemaat/baptisan');
    }
    public function baptisan_caper_store(Request $request)
    {
        //
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


        $bap_air = Baptisanair::orderBy('idbaptisan','DESC')->first();
        $id = ($bap_air != null) ? $bap_air->idbaptisan+1: '1';
        $baptisan = new Baptisanair;
        $baptisan->idbaptisan=$id;
        $baptisan->idpersonal=$request->personal;
        $baptisan->idcabangranting=$request->idcabangranting;
        $baptisan->idayahibubap=$ayahibu->id;
        $baptisan->idpelayan=$request->idpelayan;
        $baptisan->noakta=$request->noakta;
        $baptisan->tanggal=$request->tanggal;
        $baptisan->baptisanair=$request->baptisanair;
        $baptisan->keterangan=$request->keterangan;
        $baptisan->status=$request->status;

        if ($request->hasFile('d_akta')) {
            $person = $request->file('d_akta');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/baptisan/d_aktakelahiran';
                $person->move($destinationPath, $filename);
                $baptisan->d_aktakelahiran=$filename;
        }
        if ($request->hasFile('d_ktppass')) {
            $person = $request->file('d_ktppass');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/baptisan/d_ktppass';
                $person->move($destinationPath, $filename);
                $baptisan->d_ktppass=$filename;
        }
        if ($request->hasFile('d_kk')) {
            $person = $request->file('d_kk');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/baptisan/d_kartukeluarga';
                $person->move($destinationPath, $filename);
                $baptisan->d_kk=$filename;
        }
        if ($request->hasFile('d_kkj')) {
            $person = $request->file('d_kkj');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/baptisan/kkj';
                $person->move($destinationPath, $filename);
                $baptisan->d_kkj=$filename;
        }
        if ($request->hasFile('d_foto1')) {
            $person = $request->file('d_foto1');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/baptisan/d_foto1';
                $person->move($destinationPath, $filename);
                $baptisan->d_foto1=$filename;
        }
        if ($request->hasFile('d_foto2')) {
            $person = $request->file('d_foto2');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/baptisan/d_foto2';
                $person->move($destinationPath, $filename);
                $baptisan->d_foto2=$filename;
        }
        if ($request->hasFile('d_perceraian')) {
            $person = $request->file('d_perceraian');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/baptisan/d_perceraian';
                $person->move($destinationPath, $filename);
                $baptisan->d_perceraian=$filename;
        }
        if ($request->hasFile('d_saksi1')) {
            $person = $request->file('d_saksi1');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/baptisan/d_saksi1';
                $person->move($destinationPath, $filename);
                $baptisan->d_saksi1=$filename;
        }
        if ($request->hasFile('d_saksi2')) {
            $person = $request->file('d_saksi2');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/baptisan/d_saksi2';
                $person->move($destinationPath, $filename);
                $baptisan->d_saksi2=$filename;
        }
        if ($request->hasFile('d_sp_ortu')) {
            $person = $request->file('d_sp_ortu');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/baptisan/d_sp_ortu';
                $person->move($destinationPath, $filename);
                $baptisan->d_sp_ortu=$filename;
        }
        if ($request->hasFile('d_ktp_ortu')) {
            $person = $request->file('d_ktp_ortu');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/baptisan/d_ktp_ortu';
                $person->move($destinationPath, $filename);
                $baptisan->d_ktp_ortu=$filename;
        }
        if ($request->hasFile('d_kawin_ortu')) {
            $person = $request->file('d_kawin_ortu');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/baptisan/d_kawin_ortu';
                $person->move($destinationPath, $filename);
                $baptisan->d_kawin_ortu=$filename;
        }
        if ($request->hasFile('d_sp_agama')) {
            $person = $request->file('d_sp_agama');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/baptisan/d_sp_agama';
                $person->move($destinationPath, $filename);
                $baptisan->d_sp_agama=$filename;
        }
        if ($request->hasFile('d_kawin_ortu')) {
            $person = $request->file('d_kawin_ortu');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/baptisan/d_kawin_ortu';
                $person->move($destinationPath, $filename);
                $baptisan->d_kawin_ortu=$filename;
        }
        if ($request->hasFile('d_ttd_baptisan')) {
            $person = $request->file('d_ttd_baptisan');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/baptisan/d_ttd_baptisan';
                $person->move($destinationPath, $filename);
                $baptisan->d_ttd_baptisan=$filename;
        }
        if ($request->hasFile('d_berita')) {
            $person = $request->file('d_berita');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/baptisan/d_berita';
                $person->move($destinationPath, $filename);
                $baptisan->d_berita=$filename;
        }
        if ($request->hasFile('d_pendaftaran')) {
            $person = $request->file('d_pendaftaran');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/baptisan/d_pendaftaran';
                $person->move($destinationPath, $filename);
                $baptisan->d_pendaftaran=$filename;
        }
        if ($request->hasFile('d_lain')) {
            $person = $request->file('d_lain');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/baptisan/d_lain';
                $person->move($destinationPath, $filename);
                $baptisan->d_lain=$filename;
        }
        $baptisan->save();


        return redirect('modul/pelayanjemaat/baptisan/caper');

    }
    public function caper_update(Request $request, $id)
    {
        //

        $ayahibu = Ayahibu::find($request->id_ayahibubrk);
        $ayahibu->idpersonal=$request->idper;
        $ayahibu->idayahper=$request->idayahper;
        $ayahibu->namadepan=$request->namaayah_depan;
        $ayahibu->namatengah=$request->namaayah_tengah;
        $ayahibu->namabelakang=$request->namaayah_belakang;
        $ayahibu->idibuper=$request->idibuper;
        $ayahibu->namadepanibu=$request->namaibu_depan;
        $ayahibu->namatengahibu=$request->namaibu_tengah;
        $ayahibu->namabelakangibu=$request->namaibu_belakang;
        $ayahibu->save();
       
        $baptisan = Baptisanair::findOrFail($id);
        $baptisan->idpersonal=$request->idper;
        $baptisan->idcabangranting=$request->idcabangranting;
        $baptisan->idayahibubap=$request->id_ayahibubrk;
        $baptisan->idpelayan=$request->idpelayan;
        $baptisan->noakta=$request->noakta;
        $baptisan->tanggal=$request->tanggal;
        $baptisan->baptisanair=$request->baptisanair;
        $baptisan->keterangan=$request->keterangan;


        if ($request->hasFile('d_akta')) {
            $person = $request->file('d_akta');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/baptisan/d_aktakelahiran';
                $person->move($destinationPath, $filename);
                $baptisan->d_aktakelahiran=$filename;
        }
        if ($request->hasFile('d_ktppass')) {
            $person = $request->file('d_ktppass');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/baptisan/d_ktppass';
                $person->move($destinationPath, $filename);
                $baptisan->d_ktppass=$filename;
        }
        if ($request->hasFile('d_kk')) {
            $person = $request->file('d_kk');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/baptisan/d_kartukeluarga';
                $person->move($destinationPath, $filename);
                $baptisan->d_kk=$filename;
        }
        if ($request->hasFile('d_kkj')) {
            $person = $request->file('d_kkj');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/baptisan/d_kkj';
                $person->move($destinationPath, $filename);
                $baptisan->d_kkj=$filename;
        }
        if ($request->hasFile('d_foto1')) {
            $person = $request->file('d_foto1');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/baptisan/d_foto1';
                $person->move($destinationPath, $filename);
                $baptisan->d_foto1=$filename;
        }
        if ($request->hasFile('d_foto2')) {
            $person = $request->file('d_foto2');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/baptisan/d_foto2';
                $person->move($destinationPath, $filename);
                $baptisan->d_foto2=$filename;
        }
        if ($request->hasFile('d_perceraian')) {
            $person = $request->file('d_perceraian');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/baptisan/d_perceraian';
                $person->move($destinationPath, $filename);
                $baptisan->d_perceraian=$filename;
        }
        if ($request->hasFile('d_saksi1')) {
            $person = $request->file('d_saksi1');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/baptisan/d_saksi1';
                $person->move($destinationPath, $filename);
                $baptisan->d_saksi1=$filename;
        }
        if ($request->hasFile('d_saksi2')) {
            $person = $request->file('d_saksi2');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/baptisan/d_saksi2';
                $person->move($destinationPath, $filename);
                $baptisan->d_saksi2=$filename;
        }
        if ($request->hasFile('d_sp_ortu')) {
            $person = $request->file('d_sp_ortu');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/baptisan/d_sp_ortu';
                $person->move($destinationPath, $filename);
                $baptisan->d_sp_ortu=$filename;
        }
        if ($request->hasFile('d_ktp_ortu')) {
            $person = $request->file('d_ktp_ortu');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/baptisan/d_ktp_ortu';
                $person->move($destinationPath, $filename);
                $baptisan->d_ktp_ortu=$filename;
        }
        if ($request->hasFile('d_kawin_ortu')) {
            $person = $request->file('d_kawin_ortu');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/baptisan/d_kawin_ortu';
                $person->move($destinationPath, $filename);
                $baptisan->d_kawin_ortu=$filename;
        }
        if ($request->hasFile('d_sp_agama')) {
            $person = $request->file('d_sp_agama');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/baptisan/d_sp_agama';
                $person->move($destinationPath, $filename);
                $baptisan->d_sp_agama=$filename;
        }
        if ($request->hasFile('d_kawin_ortu')) {
            $person = $request->file('d_kawin_ortu');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/baptisan/d_kawin_ortu';
                $person->move($destinationPath, $filename);
                $baptisan->d_kawin_ortu=$filename;
        }
        if ($request->hasFile('d_ttd_baptisan')) {
            $person = $request->file('d_ttd_baptisan');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/baptisan/d_ttd_baptisan';
                $person->move($destinationPath, $filename);
                $baptisan->d_ttd_baptisan=$filename;
        }
        if ($request->hasFile('d_berita')) {
            $person = $request->file('d_berita');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/baptisan/d_berita';
                $person->move($destinationPath, $filename);
                $baptisan->d_berita=$filename;
        }
        if ($request->hasFile('d_pendaftaran')) {
            $person = $request->file('d_pendaftaran');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/baptisan/d_pendaftaran';
                $person->move($destinationPath, $filename);
                $baptisan->d_pendaftaran=$filename;
        }
        if ($request->hasFile('d_lain')) {
            $person = $request->file('d_lain');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/baptisan/d_lain';
                $person->move($destinationPath, $filename);
                $baptisan->d_lain=$filename;
        }
        $baptisan->save();

        return redirect('modul/pelayanjemaat/baptisan/caper');
    }
}
