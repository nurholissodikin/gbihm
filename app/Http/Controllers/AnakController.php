<?php

namespace App\Http\Controllers;

use App\Anak;
use App\Personal;
use App\Provinces;
use App\Cabang;
use Carbon\Carbon;
use App\Ayahibu;
use App\Vanak;
use Illuminate\Http\Request;

class AnakController extends Controller
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

        $nak = Anak::orderBy('idpenyanak','DESC')->first();
        $id = ($nak != null) ? $nak->idpenyanak+1: '1';
        $anak = new Anak;
        $anak->idpenyanak=$id;
        $anak->idpersonal=$request->idper;
        $anak->idpersonalanak=$request->idanakpersonal;
        $anak->idpelayan=$request->idpelayananak;
        $anak->noakta=$request->noakta;
        $anak->tanggal=$request->tanggalpe;
        $anak->idcabangranting=$request->idanakcab;
        $anak->tanggal=$request->tanggalpe;
        if ($request->hasFile('dokumen')) {
            $person = $request->file('dokumen');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/anak/d_anak';
                $person->move($destinationPath, $filename);
                $anak->dokumen=$filename;
        }
        $anak->save();
        return $anak;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Anak  $anak
     * @return \Illuminate\Http\Response
     */
    public function show(Anak $anak)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Anak  $anak
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
         $anak = Anak::findOrFail($id);
         return $anak;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Anak  $anak
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $anak = Anak::FindOrfail($id);
        $anak->idpersonal=$request->idper;
        $anak->idpersonalanak=$request->idanakpersonal;
        $anak->idpelayan=$request->idpelayananak;
        $anak->noakta=$request->noakta;
        $anak->tanggal=$request->tanggalpe;
        $anak->idcabangranting=$request->idanakcab;
        $anak->tanggal=$request->tanggalpe;
        if ($request->hasFile('dokumen')) {
            $person = $request->file('dokumen');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/anak/d_anak';
                $person->move($destinationPath, $filename);
                $anak->dokumen=$filename;
        }
        $anak->save();
        return $anak;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Anak  $anak
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
         $anak = Anak::findOrFail($id);
        $anak->delete();
        return $anak;
    }
    public function get_data_baper($id_personal){
        $personal = Personal::where('idpersonal',$id_personal)->first();

        $auto = [];
        $auto['id_personal'] = $personal->idpersonal;
        $auto['nama_depan'] = $personal->namadepan;
        $auto['nama_tengah'] = $personal->namatengah;
        $auto['nama_belakang'] = $personal->namabelakang;
        $auto['tempat_lahir'] = $personal->tempatlahir;
        $auto['tanggal_la'] = $personal->tanggallahir;
        $auto['jk'] = $personal->jeniskelamin;


        return $auto;
    }
    public function anak(){
        $anak = Vanak::where('status','Menerima Akta Penyerahan Anak')->get();
        return view('frontend.modul.jemaat.anak.index',compact('anak'));
    }
    public function anak_caper(){
        $anak = Vanak::where('status','!=','Menerima Akta Penyerahan Anak')->get();
        return view('frontend.modul.jemaat.anak.caper.index',compact('anak'));
    }
    public function anak_pendaftaran(){
        $personal = Personal::all();
        $cabang = Cabang::all();
        $provinces = Provinces::all();
        return view('frontend.modul.jemaat.anak.pendaftaran.index',compact('personal','cabang','provinces'));
    }
    public function anak_pendaftaran_edit($id){
        $anak = Vanak::findOrFail($id);
        $personal = Personal::all();
        $cabang = Cabang::all();
        $provinces = Provinces::all();
        return view('frontend.modul.jemaat.anak.caper.edit',compact('personal','cabang','provinces','anak'));
    }
    public function anak_pendaftaran_detail($id){
        $anak = Vanak::findOrFail($id);
        return view('frontend.modul.jemaat.anak.detail.detail_waiting',compact('anak'));
    }
    public function anak_akta(){
        $personal = Personal::all();
        $cabang = Cabang::all();
        $provinces = Provinces::all();
        return view('frontend.modul.jemaat.anak.tambah.index',compact('personal','cabang','provinces'));
    }
    public function akta_edit($id){
        $anak = Vanak::findOrFail($id);
        $personal = Personal::all();
        $cabang = Cabang::all();
        $provinces = Provinces::all();
        return view('frontend.modul.jemaat.anak.tambah.edit',compact('personal','cabang','provinces','anak'));
    }
    public function akta_detail($id){
        $anak = Vanak::findOrFail($id);
        return view('frontend.modul.jemaat.anak.tambah.detail',compact('anak'));
    }
    public function anak_caper_store(Request $request)
    {
        //
        $tanggal_lahir = Carbon::parse($request->tanggal_lahir);
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

        $ids = $tgla.$year.$j.$bln.$tgl.$idp;
        $ai = Ayahibu::orderBy('id','DESC')->first();
        $ida = ($ai != null) ? $ai->id+1: '1';
       

        if(!$request->personalanak){
            $personal = new Personal;
            $personal->idpersonal = $ids;
            $namalengkap = $request->nama_depan.$request->nama_tengah.$request->nama_belakang;
            $personal->namalengkap = $namalengkap;
            $personal->namadepan = $request->nama_depan;
            $personal->namatengah = $request->nama_tengah;
            $personal->namabelakang = $request->nama_belakang;
            $personal->tempatlahir = $request->tempat_lahir;
            $personal->tanggallahir = $request->tanggal_lahir;
            $personal->jeniskelamin = $request->jk;
            $personal->alamattinggal = $request->alamat;
            $personal->rtrw = $request->rtrw;
            $personal->kelurahan = $request->villages;
            $personal->kecamatan = $request->districts;
            $personal->kabkota = $request->regencies;
            $personal->provinsi = $request->provinces;
            $personal->kodepos = $request->kodepos;
            $personal->save();
        }else{
            $this->validate($request,[
                // 'nokkj' => 'unique:kkj,nokkj,'.$request->nokkj,
                'noktp' => 'unique:personal,ktpid,'.$request->personalanak.',idpersonal|nullable'
            ]);
            $personal = Personal::find($request->personalanak);
            $personal->namadepan = $request->nama_depan;
            $personal->namatengah = $request->nama_tengah;
            $personal->namabelakang = $request->nama_belakang;
            $personal->tempatlahir = $request->tempat_lahir;
            $personal->tanggallahir = $request->tanggal_lahir;
            $personal->jeniskelamin = $request->jk;
            $personal->alamattinggal = $request->alamat;
            $personal->save();
        }
        $ayahibu = new Ayahibu;
        $ayahibu->id=$ida;
        $ayahibu->idpersonal=$personal->idpersonal;
        $ayahibu->idayahper=$request->idayahper;
        $ayahibu->namadepan=$request->namaayah_depan;
        $ayahibu->namatengah=$request->namaayah_tengah;
        $ayahibu->namabelakang=$request->namaayah_belakang;
        $ayahibu->idibuper=$request->idibuper;
        $ayahibu->namadepanibu=$request->namaibu_depan;
        $ayahibu->namatengahibu=$request->namaibu_tengah;
        $ayahibu->namabelakangibu=$request->namaibu_belakang;
        $ayahibu->save();

        $nak = Anak::orderBy('idpenyanak','DESC')->first();
        $id = ($nak != null) ? $nak->idpenyanak+1: '1';
        $anak = new Anak;
        $anak->idpenyanak=$id;
        $anak->idpersonal=$request->menyatakan;
        $anak->idpersonalanak=$personal->idpersonal;
        $anak->idpelayan=$request->idpelayan;
        $anak->noakta=$request->noakta;
        $anak->tanggal=$request->tanggal;
        $anak->idcabangranting=$request->idcabangranting;
        $anak->keterangan=$request->keterangan;
        $anak->penerima=$request->penerima;
        $anak->verifikasi=$request->menyatakan;
        $anak->validasi=$request->validasi;
        $anak->petugas=$request->petugas;
        $anak->ayah_ibu=$ayahibu->id;  
        $anak->status=$request->status;

        if ($request->hasFile('d_akta')) {
            $person = $request->file('d_akta');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/anak/d_aktakelahiran';
                $person->move($destinationPath, $filename);
                $anak->d_aktakelahiran=$filename;
        }
        if ($request->hasFile('d_ktp_ayah')) {
            $person = $request->file('d_ktp_ayah');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/anak/d_ktp_ayah';
                $person->move($destinationPath, $filename);
                $anak->d_ktp_ayah=$filename;
        }
        if ($request->hasFile('d_ktp_ibu')) {
            $person = $request->file('d_ktp_ibu');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/anak/d_ktp_ibu';
                $person->move($destinationPath, $filename);
                $anak->d_ktp_ibu=$filename;
        }
        if ($request->hasFile('d_kk')) {
            $person = $request->file('d_kk');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/anak/d_kartukeluarga';
                $person->move($destinationPath, $filename);
                $anak->d_kk=$filename;
        }
        if ($request->hasFile('d_kkj')) {
            $person = $request->file('d_kkj');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/anak/kkj';
                $person->move($destinationPath, $filename);
                $anak->d_kkj=$filename;
        }
        if ($request->hasFile('d_foto1')) {
            $person = $request->file('d_foto1');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/anak/d_foto1';
                $person->move($destinationPath, $filename);
                $anak->d_foto1=$filename;
        }
        if ($request->hasFile('d_foto2')) {
            $person = $request->file('d_foto2');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/anak/d_foto2';
                $person->move($destinationPath, $filename);
                $anak->d_foto2=$filename;
        }
        if ($request->hasFile('d_perceraian')) {
            $person = $request->file('d_perceraian');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/anak/d_perceraian';
                $person->move($destinationPath, $filename);
                $anak->d_perceraian=$filename;
        }
        if ($request->hasFile('d_saksi1')) {
            $person = $request->file('d_saksi1');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/anak/d_saksi1';
                $person->move($destinationPath, $filename);
                $anak->d_saksi1=$filename;
        }
        if ($request->hasFile('d_saksi2')) {
            $person = $request->file('d_saksi2');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/anak/d_saksi2';
                $person->move($destinationPath, $filename);
                $anak->d_saksi2=$filename;
        }
        if ($request->hasFile('d_sp_ortu')) {
            $person = $request->file('d_sp_ortu');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/anak/d_sp_ortu';
                $person->move($destinationPath, $filename);
                $anak->d_sp_ortu=$filename;
        }
        if ($request->hasFile('d_ktp_ortu')) {
            $person = $request->file('d_ktp_ortu');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/anak/d_ktp_ortu';
                $person->move($destinationPath, $filename);
                $anak->d_ktp_ortu=$filename;
        }
        if ($request->hasFile('d_kawin_ortu')) {
            $person = $request->file('d_kawin_ortu');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/anak/d_kawin_ortu';
                $person->move($destinationPath, $filename);
                $anak->d_kawin_ortu=$filename;
        }
        if ($request->hasFile('d_ttd_anak')) {
            $person = $request->file('d_ttd_anak');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/anak/d_ttd_anak';
                $person->move($destinationPath, $filename);
                $anak->d_ttd_anak=$filename;
        }
        if ($request->hasFile('d_berita')) {
            $person = $request->file('d_berita');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/anak/d_berita';
                $person->move($destinationPath, $filename);
                $anak->d_berita=$filename;
        }
        if ($request->hasFile('d_pendaftaran')) {
            $person = $request->file('d_pendaftaran');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/anak/d_pendaftaran';
                $person->move($destinationPath, $filename);
                $anak->d_pendaftaran=$filename;
        }
        if ($request->hasFile('d_lain')) {
            $person = $request->file('d_lain');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/anak/d_lain';
                $person->move($destinationPath, $filename);
                $anak->d_lain=$filename;
        }
        $anak->save();


        return redirect('modul/pelayanjemaat/penyerahananak/caper');
    }
    public function anak_caper_update(Request $request,$id)
    {
        //
       

    
      
        $personal = Personal::find($request->personalanak);
        $namalengkap = $request->nama_depan.$request->nama_tengah.$request->nama_belakang;
        $personal->namalengkap = $namalengkap;
        $personal->namadepan = $request->nama_depan;
        $personal->namatengah = $request->nama_tengah;
        $personal->namabelakang = $request->nama_belakang;
        $personal->tempatlahir = $request->tempat_lahir;
        $personal->tanggallahir = $request->tanggal_lahir;
        $personal->jeniskelamin = $request->jk;
        $personal->alamattinggal = $request->alamat;
        $personal->rtrw = $request->rtrw;
        $personal->kelurahan = $request->villages;
        $personal->kecamatan = $request->districts;
        $personal->kabkota = $request->regencies;
        $personal->provinsi = $request->provinces;
        $personal->kodepos = $request->kodepos;
        $personal->save();
        
        $ayahibu = Ayahibu::find($request->idayahibu);
        $ayahibu->idpersonal=$personal->idpersonal;
        $ayahibu->idayahper=$request->idayahper;
        $ayahibu->namadepan=$request->namaayah_depan;
        $ayahibu->namatengah=$request->namaayah_tengah;
        $ayahibu->namabelakang=$request->namaayah_belakang;
        $ayahibu->idibuper=$request->idibuper;
        $ayahibu->namadepanibu=$request->namaibu_depan;
        $ayahibu->namatengahibu=$request->namaibu_tengah;
        $ayahibu->namabelakangibu=$request->namaibu_belakang;
        $ayahibu->save();

        $anak = Anak::findOrFail($id);
        $anak->idpersonal=$request->menyatakan;
        $anak->idpersonalanak=$personal->idpersonal;
        $anak->idpelayan=$request->idpelayan;
        $anak->noakta=$request->noakta;
        $anak->tanggal=$request->tanggal;
        $anak->negara=$request->negara;
        $anak->idcabangranting=$request->idcabangranting;
        $anak->keterangan=$request->keterangan;
        $anak->penerima=$request->penerima;
        $anak->verifikasi=$request->menyatakan;
        $anak->validasi=$request->validasi;
        $anak->petugas=$request->petugas;
        $anak->ayah_ibu=$ayahibu->id;  
        $anak->status=$request->status;

        if ($request->hasFile('d_akta')) {
            $person = $request->file('d_akta');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/anak/d_aktakelahiran';
                $person->move($destinationPath, $filename);
                $anak->d_aktakelahiran=$filename;
        }
        if ($request->hasFile('d_ktp_ayah')) {
            $person = $request->file('d_ktp_ayah');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/anak/d_ktp_ayah';
                $person->move($destinationPath, $filename);
                $anak->d_ktp_ayah=$filename;
        }
        if ($request->hasFile('d_ktp_ibu')) {
            $person = $request->file('d_ktp_ibu');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/anak/d_ktp_ibu';
                $person->move($destinationPath, $filename);
                $anak->d_ktp_ibu=$filename;
        }
        if ($request->hasFile('d_kk')) {
            $person = $request->file('d_kk');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/anak/d_kartukeluarga';
                $person->move($destinationPath, $filename);
                $anak->d_kk=$filename;
        }
        if ($request->hasFile('d_kkj')) {
            $person = $request->file('d_kkj');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/anak/kkj';
                $person->move($destinationPath, $filename);
                $anak->d_kkj=$filename;
        }
        if ($request->hasFile('d_foto1')) {
            $person = $request->file('d_foto1');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/anak/d_foto1';
                $person->move($destinationPath, $filename);
                $anak->d_foto1=$filename;
        }
        if ($request->hasFile('d_foto2')) {
            $person = $request->file('d_foto2');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/anak/d_foto2';
                $person->move($destinationPath, $filename);
                $anak->d_foto2=$filename;
        }
        if ($request->hasFile('d_perceraian')) {
            $person = $request->file('d_perceraian');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/anak/d_perceraian';
                $person->move($destinationPath, $filename);
                $anak->d_perceraian=$filename;
        }
        if ($request->hasFile('d_saksi1')) {
            $person = $request->file('d_saksi1');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/anak/d_saksi1';
                $person->move($destinationPath, $filename);
                $anak->d_saksi1=$filename;
        }
        if ($request->hasFile('d_saksi2')) {
            $person = $request->file('d_saksi2');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/anak/d_saksi2';
                $person->move($destinationPath, $filename);
                $anak->d_saksi2=$filename;
        }
        if ($request->hasFile('d_sp_ortu')) {
            $person = $request->file('d_sp_ortu');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/anak/d_sp_ortu';
                $person->move($destinationPath, $filename);
                $anak->d_sp_ortu=$filename;
        }
        if ($request->hasFile('d_ktp_ortu')) {
            $person = $request->file('d_ktp_ortu');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/anak/d_ktp_ortu';
                $person->move($destinationPath, $filename);
                $anak->d_ktp_ortu=$filename;
        }
        if ($request->hasFile('d_kawin_ortu')) {
            $person = $request->file('d_kawin_ortu');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/anak/d_kawin_ortu';
                $person->move($destinationPath, $filename);
                $anak->d_kawin_ortu=$filename;
        }
        if ($request->hasFile('d_ttd_anak')) {
            $person = $request->file('d_ttd_anak');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/anak/d_ttd_anak';
                $person->move($destinationPath, $filename);
                $anak->d_ttd_anak=$filename;
        }
        if ($request->hasFile('d_berita')) {
            $person = $request->file('d_berita');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/anak/d_berita';
                $person->move($destinationPath, $filename);
                $anak->d_berita=$filename;
        }
        if ($request->hasFile('d_pendaftaran')) {
            $person = $request->file('d_pendaftaran');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/anak/d_pendaftaran';
                $person->move($destinationPath, $filename);
                $anak->d_pendaftaran=$filename;
        }
        if ($request->hasFile('d_lain')) {
            $person = $request->file('d_lain');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/anak/d_lain';
                $person->move($destinationPath, $filename);
                $anak->d_lain=$filename;
        }
        $anak->save();


        return redirect('modul/pelayanjemaat/penyerahananak/caper');
    }
    public function akta_store(Request $request)
    {
        //
        $tanggal_lahir = Carbon::parse($request->tanggal_lahir);
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

        $ids = $tgla.$year.$j.$bln.$tgl.$idp;
        $ai = Ayahibu::orderBy('id','DESC')->first();
        $ida = ($ai != null) ? $ai->id+1: '1';
       

        if(!$request->personalanak){
            $personal = new Personal;
            $personal->idpersonal = $ids;
            $namalengkap = $request->nama_depan.$request->nama_tengah.$request->nama_belakang;
            $personal->namalengkap = $namalengkap;
            $personal->namadepan = $request->nama_depan;
            $personal->namatengah = $request->nama_tengah;
            $personal->namabelakang = $request->nama_belakang;
            $personal->tempatlahir = $request->tempat_lahir;
            $personal->tanggallahir = $request->tanggal_lahir;
            $personal->jeniskelamin = $request->jk;
            $personal->alamattinggal = $request->alamat;
            $personal->rtrw = $request->rtrw;
            $personal->kelurahan = $request->villages;
            $personal->kecamatan = $request->districts;
            $personal->kabkota = $request->regencies;
            $personal->provinsi = $request->provinces;
            $personal->kodepos = $request->kodepos;
            $personal->save();
        }else{
            $this->validate($request,[
                // 'nokkj' => 'unique:kkj,nokkj,'.$request->nokkj,
                'noktp' => 'unique:personal,ktpid,'.$request->personalanak.',idpersonal|nullable'
            ]);
            $personal = Personal::find($request->personalanak);
            $personal->namadepan = $request->nama_depan;
            $personal->namatengah = $request->nama_tengah;
            $personal->namabelakang = $request->nama_belakang;
            $personal->tempatlahir = $request->tempat_lahir;
            $personal->tanggallahir = $request->tanggal_lahir;
            $personal->jeniskelamin = $request->jk;
            $personal->alamattinggal = $request->alamat;
            $personal->save();
        }
        $ayahibu = new Ayahibu;
        $ayahibu->id=$ida;
        $ayahibu->idpersonal=$personal->idpersonal;
        $ayahibu->idayahper=$request->idayahper;
        $ayahibu->namadepan=$request->namaayah_depan;
        $ayahibu->namatengah=$request->namaayah_tengah;
        $ayahibu->namabelakang=$request->namaayah_belakang;
        $ayahibu->idibuper=$request->idibuper;
        $ayahibu->namadepanibu=$request->namaibu_depan;
        $ayahibu->namatengahibu=$request->namaibu_tengah;
        $ayahibu->namabelakangibu=$request->namaibu_belakang;
        $ayahibu->save();

        $nak = Anak::orderBy('idpenyanak','DESC')->first();
        $id = ($nak != null) ? $nak->idpenyanak+1: '1';
        $anak = new Anak;
        $anak->idpenyanak=$id;
        $anak->idpersonal=$request->menyatakan;
        $anak->idpersonalanak=$personal->idpersonal;
        $anak->idpelayan=$request->idpelayan;
        $anak->noakta=$request->noakta;
        $anak->tanggal=$request->tanggal;
        $anak->idcabangranting=$request->idcabangranting;
        $anak->keterangan=$request->keterangan;
        $anak->penerima=$request->penerima;
        $anak->verifikasi=$request->menyatakan;
        $anak->validasi=$request->validasi;
        $anak->petugas=$request->petugas;
        $anak->ayah_ibu=$ayahibu->id;  
        $anak->status=$request->status;

        if ($request->hasFile('d_akta')) {
            $person = $request->file('d_akta');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/anak/d_aktakelahiran';
                $person->move($destinationPath, $filename);
                $anak->d_aktakelahiran=$filename;
        }
        if ($request->hasFile('d_ktp_ayah')) {
            $person = $request->file('d_ktp_ayah');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/anak/d_ktp_ayah';
                $person->move($destinationPath, $filename);
                $anak->d_ktp_ayah=$filename;
        }
        if ($request->hasFile('d_ktp_ibu')) {
            $person = $request->file('d_ktp_ibu');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/anak/d_ktp_ibu';
                $person->move($destinationPath, $filename);
                $anak->d_ktp_ibu=$filename;
        }
        if ($request->hasFile('d_kk')) {
            $person = $request->file('d_kk');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/anak/d_kartukeluarga';
                $person->move($destinationPath, $filename);
                $anak->d_kk=$filename;
        }
        if ($request->hasFile('d_kkj')) {
            $person = $request->file('d_kkj');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/anak/kkj';
                $person->move($destinationPath, $filename);
                $anak->d_kkj=$filename;
        }
        if ($request->hasFile('d_foto1')) {
            $person = $request->file('d_foto1');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/anak/d_foto1';
                $person->move($destinationPath, $filename);
                $anak->d_foto1=$filename;
        }
        if ($request->hasFile('d_foto2')) {
            $person = $request->file('d_foto2');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/anak/d_foto2';
                $person->move($destinationPath, $filename);
                $anak->d_foto2=$filename;
        }
        if ($request->hasFile('d_perceraian')) {
            $person = $request->file('d_perceraian');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/anak/d_perceraian';
                $person->move($destinationPath, $filename);
                $anak->d_perceraian=$filename;
        }
        if ($request->hasFile('d_saksi1')) {
            $person = $request->file('d_saksi1');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/anak/d_saksi1';
                $person->move($destinationPath, $filename);
                $anak->d_saksi1=$filename;
        }
        if ($request->hasFile('d_saksi2')) {
            $person = $request->file('d_saksi2');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/anak/d_saksi2';
                $person->move($destinationPath, $filename);
                $anak->d_saksi2=$filename;
        }
        if ($request->hasFile('d_sp_ortu')) {
            $person = $request->file('d_sp_ortu');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/anak/d_sp_ortu';
                $person->move($destinationPath, $filename);
                $anak->d_sp_ortu=$filename;
        }
        if ($request->hasFile('d_ktp_ortu')) {
            $person = $request->file('d_ktp_ortu');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/anak/d_ktp_ortu';
                $person->move($destinationPath, $filename);
                $anak->d_ktp_ortu=$filename;
        }
        if ($request->hasFile('d_kawin_ortu')) {
            $person = $request->file('d_kawin_ortu');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/anak/d_kawin_ortu';
                $person->move($destinationPath, $filename);
                $anak->d_kawin_ortu=$filename;
        }
        if ($request->hasFile('d_ttd_anak')) {
            $person = $request->file('d_ttd_anak');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/anak/d_ttd_anak';
                $person->move($destinationPath, $filename);
                $anak->d_ttd_anak=$filename;
        }
        if ($request->hasFile('d_berita')) {
            $person = $request->file('d_berita');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/anak/d_berita';
                $person->move($destinationPath, $filename);
                $anak->d_berita=$filename;
        }
        if ($request->hasFile('d_pendaftaran')) {
            $person = $request->file('d_pendaftaran');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/anak/d_pendaftaran';
                $person->move($destinationPath, $filename);
                $anak->d_pendaftaran=$filename;
        }
        if ($request->hasFile('d_lain')) {
            $person = $request->file('d_lain');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/anak/d_lain';
                $person->move($destinationPath, $filename);
                $anak->d_lain=$filename;
        }
        $anak->save();


        return redirect('modul/pelayanjemaat/penyerahananak');
    }
    public function akta_update(Request $request,$id)
    {
        //      
        $personal = Personal::find($request->personalanak);
        $namalengkap = $request->nama_depan.$request->nama_tengah.$request->nama_belakang;
        $personal->namalengkap = $namalengkap;
        $personal->namadepan = $request->nama_depan;
        $personal->namatengah = $request->nama_tengah;
        $personal->namabelakang = $request->nama_belakang;
        $personal->tempatlahir = $request->tempat_lahir;
        $personal->tanggallahir = $request->tanggal_lahir;
        $personal->jeniskelamin = $request->jk;
        $personal->alamattinggal = $request->alamat;
        $personal->rtrw = $request->rtrw;
        $personal->kelurahan = $request->villages;
        $personal->kecamatan = $request->districts;
        $personal->kabkota = $request->regencies;
        $personal->provinsi = $request->provinces;
        $personal->kodepos = $request->kodepos;
        $personal->save();
        
        $ayahibu = Ayahibu::find($request->idayahibu);
        $ayahibu->idpersonal=$personal->idpersonal;
        $ayahibu->idayahper=$request->idayahper;
        $ayahibu->namadepan=$request->namaayah_depan;
        $ayahibu->namatengah=$request->namaayah_tengah;
        $ayahibu->namabelakang=$request->namaayah_belakang;
        $ayahibu->idibuper=$request->idibuper;
        $ayahibu->namadepanibu=$request->namaibu_depan;
        $ayahibu->namatengahibu=$request->namaibu_tengah;
        $ayahibu->namabelakangibu=$request->namaibu_belakang;
        $ayahibu->save();

        $anak = Anak::findOrFail($id);
        $anak->idpersonal=$request->menyatakan;
        $anak->idpersonalanak=$personal->idpersonal;
        $anak->idpelayan=$request->idpelayan;
        $anak->noakta=$request->noakta;
        $anak->tanggal=$request->tanggal;
        $anak->negara=$request->negara;
        $anak->idcabangranting=$request->idcabangranting;
        $anak->keterangan=$request->keterangan;
        $anak->penerima=$request->penerima;
        $anak->verifikasi=$request->menyatakan;
        $anak->validasi=$request->validasi;
        $anak->petugas=$request->petugas;
        $anak->ayah_ibu=$ayahibu->id;  
        $anak->status=$request->status;

        if ($request->hasFile('d_akta')) {
            $person = $request->file('d_akta');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/anak/d_aktakelahiran';
                $person->move($destinationPath, $filename);
                $anak->d_aktakelahiran=$filename;
        }
        if ($request->hasFile('d_ktp_ayah')) {
            $person = $request->file('d_ktp_ayah');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/anak/d_ktp_ayah';
                $person->move($destinationPath, $filename);
                $anak->d_ktp_ayah=$filename;
        }
        if ($request->hasFile('d_ktp_ibu')) {
            $person = $request->file('d_ktp_ibu');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/anak/d_ktp_ibu';
                $person->move($destinationPath, $filename);
                $anak->d_ktp_ibu=$filename;
        }
        if ($request->hasFile('d_kk')) {
            $person = $request->file('d_kk');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/anak/d_kartukeluarga';
                $person->move($destinationPath, $filename);
                $anak->d_kk=$filename;
        }
        if ($request->hasFile('d_kkj')) {
            $person = $request->file('d_kkj');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/anak/kkj';
                $person->move($destinationPath, $filename);
                $anak->d_kkj=$filename;
        }
        if ($request->hasFile('d_foto1')) {
            $person = $request->file('d_foto1');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/anak/d_foto1';
                $person->move($destinationPath, $filename);
                $anak->d_foto1=$filename;
        }
        if ($request->hasFile('d_foto2')) {
            $person = $request->file('d_foto2');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/anak/d_foto2';
                $person->move($destinationPath, $filename);
                $anak->d_foto2=$filename;
        }
        if ($request->hasFile('d_perceraian')) {
            $person = $request->file('d_perceraian');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/anak/d_perceraian';
                $person->move($destinationPath, $filename);
                $anak->d_perceraian=$filename;
        }
        if ($request->hasFile('d_saksi1')) {
            $person = $request->file('d_saksi1');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/anak/d_saksi1';
                $person->move($destinationPath, $filename);
                $anak->d_saksi1=$filename;
        }
        if ($request->hasFile('d_saksi2')) {
            $person = $request->file('d_saksi2');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/anak/d_saksi2';
                $person->move($destinationPath, $filename);
                $anak->d_saksi2=$filename;
        }
        if ($request->hasFile('d_sp_ortu')) {
            $person = $request->file('d_sp_ortu');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/anak/d_sp_ortu';
                $person->move($destinationPath, $filename);
                $anak->d_sp_ortu=$filename;
        }
        if ($request->hasFile('d_ktp_ortu')) {
            $person = $request->file('d_ktp_ortu');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/anak/d_ktp_ortu';
                $person->move($destinationPath, $filename);
                $anak->d_ktp_ortu=$filename;
        }
        if ($request->hasFile('d_kawin_ortu')) {
            $person = $request->file('d_kawin_ortu');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/anak/d_kawin_ortu';
                $person->move($destinationPath, $filename);
                $anak->d_kawin_ortu=$filename;
        }
        if ($request->hasFile('d_ttd_anak')) {
            $person = $request->file('d_ttd_anak');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/anak/d_ttd_anak';
                $person->move($destinationPath, $filename);
                $anak->d_ttd_anak=$filename;
        }
        if ($request->hasFile('d_berita')) {
            $person = $request->file('d_berita');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/anak/d_berita';
                $person->move($destinationPath, $filename);
                $anak->d_berita=$filename;
        }
        if ($request->hasFile('d_pendaftaran')) {
            $person = $request->file('d_pendaftaran');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/anak/d_pendaftaran';
                $person->move($destinationPath, $filename);
                $anak->d_pendaftaran=$filename;
        }
        if ($request->hasFile('d_lain')) {
            $person = $request->file('d_lain');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/anak/d_lain';
                $person->move($destinationPath, $filename);
                $anak->d_lain=$filename;
        }
        $anak->save();


        return redirect('modul/pelayanjemaat/penyerahananak');
    }
}
