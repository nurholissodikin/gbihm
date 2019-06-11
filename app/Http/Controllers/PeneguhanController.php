<?php

namespace App\Http\Controllers;

use App\Peneguhan;
use App\Nikah;
use App\Personal;
use App\Vpeneguhan;
use App\Ayahibu;
use App\Vnikah;
use App\Provinces;
use App\Cabang;
use Illuminate\Http\Request;

class PeneguhanController extends Controller
{
    //
    public function peneguhan(){
        $peneguhan = Vpeneguhan::where('status','Menerima Akta Peneguhan')->get();
        return view('frontend.modul.jemaat.peneguhan.index',compact('peneguhan'));
    }
    public function peneguhan_caper(){
        $peneguhan = Vpeneguhan::where('status','!=','Menerima Akta Peneguhan')->get();
        return view('frontend.modul.jemaat.peneguhan.caper.index',compact('peneguhan'));
    }
    public function peneguhan_pendaftaran(){
        $personal = Personal::all();
        $cabang = Cabang::all();
        $provinces = Provinces::all();
        return view('frontend.modul.jemaat.peneguhan.pendaftaran.index',compact('personal','cabang','provinces'));
    }
    public function peneguhan_pendaftaran_edit($id){
        $peneguhan = Vpeneguhan::findOrFail($id);
        $personal = Personal::all();
        $cabang = Cabang::all();
        $provinces = Provinces::all();
        return view('frontend.modul.jemaat.peneguhan.caper.edit',compact('personal','cabang','provinces','peneguhan'));
    }
    public function peneguhan_pendaftaran_detail($id){
        $peneguhan = Vpeneguhan::findOrFail($id);
         $personal = Personal::all();
        $cabang = Cabang::all();
        $provinces = Provinces::all();
        return view('frontend.modul.jemaat.peneguhan.detail.detail_inconfirm',compact('personal','cabang','provinces','peneguhan'));
    }
    public function peneguhan_akta(){
        $personal = Personal::all();
        $cabang = Cabang::all();
        $provinces = Provinces::all();
        return view('frontend.modul.jemaat.peneguhan.tambah.index',compact('personal','cabang','provinces'));
    }
    public function akta_edit($id){
        $peneguhan = Vpeneguhan::findOrFail($id);
        $personal = Personal::all();
        $cabang = Cabang::all();
        $provinces = Provinces::all();
        return view('frontend.modul.jemaat.peneguhan.tambah.edit',compact('personal','cabang','provinces','peneguhan'));
    }
    public function akta_detail($id){
        $peneguhan = Vpeneguhan::findOrFail($id);
        $personal = Personal::all();
        $cabang = Cabang::all();
        $provinces = Provinces::all();
        return view('frontend.modul.jemaat.peneguhan.tambah.detail',compact('personal','cabang','provinces','peneguhan'));
    }


    public function caper_store(Request $request){
        $ai = Ayahibu::orderBy('id','DESC')->first();
        $ida = ($ai != null) ? $ai->id+1: '1';
        $ayahibu_per = new Ayahibu;
        $ayahibu_per->id=$ida;
        $ayahibu_per->idpersonal=$request->idsuami;
        $ayahibu_per->idayahper=$request->idayah_suami;
        $ayahibu_per->namadepan=$request->namaayah_depan_suami;
        $ayahibu_per->namatengah=$request->namaayah_tengah_suami;
        $ayahibu_per->namabelakang=$request->namaayah_belakang_suami;
        $ayahibu_per->idibuper=$request->idibu_suami;
        $ayahibu_per->namadepanibu=$request->namaibu_depan_suami;
        $ayahibu_per->namatengahibu=$request->namaibu_tengah_suami;
        $ayahibu_per->namabelakangibu=$request->namaibu_belakang_suami;
        $ayahibu_per->save();

        $aia = Ayahibu::orderBy('id','DESC')->first();
        $idaa = ($aia != null) ? $aia->id+1: '1';
        $ayahibu_pas = new Ayahibu;
        $ayahibu_pas->id=$idaa;
        $ayahibu_pas->idpersonal=$request->idistri;
        $ayahibu_pas->idayahper=$request->idayah_istri;
        $ayahibu_pas->namadepan=$request->namaayah_depan_istri;
        $ayahibu_pas->namatengah=$request->namaayah_tengah_istri;
        $ayahibu_pas->namabelakang=$request->namaayah_belakang_istri;
        $ayahibu_pas->idibuper=$request->idibu_istri;
        $ayahibu_pas->namadepanibu=$request->namaibu_depan_istri;
        $ayahibu_pas->namatengahibu=$request->namaibu_tengah_istri;
        $ayahibu_pas->namabelakangibu=$request->namaibu_belakang_istri;
        $ayahibu_pas->save();

        $peneguhan = new Peneguhan;
        $peneguhan->idpersonal=$request->idsuami;
        $peneguhan->idpasangan=$request->idistri;
        $peneguhan->idpelayan=$request->idpelayan;
        $peneguhan->noakta=$request->noakta;
        $peneguhan->tanggal=$request->tanggal;
        $peneguhan->idcabangranting=$request->idcabangranting;
        $peneguhan->tempatpernikahan=$request->tempatpernikahan;
        $peneguhan->keterangan=$request->keterangan;
        $peneguhan->penerima=$request->penerima;
        $peneguhan->menyatakan=$request->menyatakan;
        $peneguhan->verifikasi=$request->verifikasi;
        $peneguhan->validasi=$request->validasi;
        $peneguhan->petugas=$request->petugas;
        $peneguhan->idayahibupas=$ayahibu_pas->id;  
        $peneguhan->idayahibuper=$ayahibu_per->id;  
        $peneguhan->status=$request->status;

        if ($request->hasFile('d_akta')) {
            $person = $request->file('d_akta');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/peneguhan/d_aktakelahiran';
                $person->move($destinationPath, $filename);
                $peneguhan->d_aktakelahiran=$filename;
        }
        if ($request->hasFile('d_ktp')) {
            $person = $request->file('d_ktp');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/peneguhan/d_ktp';
                $person->move($destinationPath, $filename);
                $peneguhan->d_ktp=$filename;
        }
        
        if ($request->hasFile('d_kk')) {
            $person = $request->file('d_kk');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/peneguhan/d_kartukeluarga';
                $person->move($destinationPath, $filename);
                $peneguhan->d_kk=$filename;
        }
        if ($request->hasFile('d_akta_nikah')) {
            $person = $request->file('d_akta_nikah');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/peneguhan/d_akta_nikah';
                $person->move($destinationPath, $filename);
                $peneguhan->d_akta_nikah=$filename;
        }
        if ($request->hasFile('d_sp_suami_istri')) {
            $person = $request->file('d_sp_suami_istri');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/peneguhan/d_sp_suami_istri';
                $person->move($destinationPath, $filename);
                $peneguhan->d_sp_suami_istri=$filename;
        }
        if ($request->hasFile('d_baptisan')) {
            $person = $request->file('d_baptisan');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/peneguhan/d_baptisan';
                $person->move($destinationPath, $filename);
                $peneguhan->d_baptisan=$filename;
        }
        if ($request->hasFile('d_kkj')) {
            $person = $request->file('d_kkj');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/peneguhan/kkj';
                $person->move($destinationPath, $filename);
                $peneguhan->d_kkj=$filename;
        }
        if ($request->hasFile('d_sertfifkat_kom')) {
            $person = $request->file('d_sertfifkat_kom');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/peneguhan/d_sertfifkat_kom';
                $person->move($destinationPath, $filename);
                $peneguhan->d_sertfifkat_kom=$filename;
        }
        if ($request->hasFile('d_sertfifkat_bpn')) {
            $person = $request->file('d_sertfifkat_bpn');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/peneguhan/d_sertfifkat_bpn';
                $person->move($destinationPath, $filename);
                $peneguhan->d_sertfifkat_bpn=$filename;
        }
        if ($request->hasFile('d_foto1')) {
            $person = $request->file('d_foto1');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/peneguhan/d_foto1';
                $person->move($destinationPath, $filename);
                $peneguhan->d_foto1=$filename;
        }
        if ($request->hasFile('d_foto2')) {
            $person = $request->file('d_foto2');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/peneguhan/d_foto2';
                $person->move($destinationPath, $filename);
                $peneguhan->d_foto2=$filename;
        }
        if ($request->hasFile('d_foto3')) {
            $person = $request->file('d_foto3');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/peneguhan/d_foto3';
                $person->move($destinationPath, $filename);
                $peneguhan->d_foto3=$filename;
        }
        if ($request->hasFile('d_perceraian')) {
            $person = $request->file('d_perceraian');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/peneguhan/d_perceraian';
                $person->move($destinationPath, $filename);
                $peneguhan->d_perceraian=$filename;
        }
        if ($request->hasFile('d_ttd_peneguhan')) {
            $person = $request->file('d_ttd_peneguhan');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/peneguhan/d_ttd_peneguhan';
                $person->move($destinationPath, $filename);
                $peneguhan->d_ttd_peneguhan=$filename;
        }
        if ($request->hasFile('d_berita')) {
            $person = $request->file('d_berita');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/peneguhan/d_berita';
                $person->move($destinationPath, $filename);
                $peneguhan->d_berita=$filename;
        }
        if ($request->hasFile('d_pendaftaran')) {
            $person = $request->file('d_pendaftaran');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/peneguhan/d_pendaftaran';
                $person->move($destinationPath, $filename);
                $peneguhan->d_pendaftaran=$filename;
        }
        if ($request->hasFile('d_lain')) {
            $person = $request->file('d_lain');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/peneguhan/d_lain';
                $person->move($destinationPath, $filename);
                $peneguhan->d_lain=$filename;
        }
        $peneguhan->save();
        return redirect('modul/pelayanjemaat/peneguhan/caper');
    }

    public function caper_update(Request $request,$id){
        $ayahibu_per = Ayahibu::find($request->idayahibupas);
        $ayahibu_per->idpersonal=$request->idsuami;
        $ayahibu_per->idayahper=$request->idayah_suami;
        $ayahibu_per->namadepan=$request->namaayah_depan_suami;
        $ayahibu_per->namatengah=$request->namaayah_tengah_suami;
        $ayahibu_per->namabelakang=$request->namaayah_belakang_suami;
        $ayahibu_per->idibuper=$request->idibu_suami;
        $ayahibu_per->namadepanibu=$request->namaibu_depan_suami;
        $ayahibu_per->namatengahibu=$request->namaibu_tengah_suami;
        $ayahibu_per->namabelakangibu=$request->namaibu_belakang_suami;
        $ayahibu_per->save();

        $ayahibu_pas =  Ayahibu::find($request->idayahibuper);
        $ayahibu_pas->idpersonal=$request->idistri;
        $ayahibu_pas->idayahper=$request->idayah_istri;
        $ayahibu_pas->namadepan=$request->namaayah_depan_istri;
        $ayahibu_pas->namatengah=$request->namaayah_tengah_istri;
        $ayahibu_pas->namabelakang=$request->namaayah_belakang_istri;
        $ayahibu_pas->idibuper=$request->idibu_istri;
        $ayahibu_pas->namadepanibu=$request->namaibu_depan_istri;
        $ayahibu_pas->namatengahibu=$request->namaibu_tengah_istri;
        $ayahibu_pas->namabelakangibu=$request->namaibu_belakang_istri;
        $ayahibu_pas->save();

        $peneguhan =  Peneguhan::findOrFail($id);
        $peneguhan->idpersonal=$request->idsuami;
        $peneguhan->idpasangan=$request->idistri;
        $peneguhan->idpelayan=$request->idpelayan;
        $peneguhan->noakta=$request->noakta;
        $peneguhan->tanggal=$request->tanggal;
        $peneguhan->idcabangranting=$request->idcabangranting;
        $peneguhan->tempatpernikahan=$request->tempatpernikahan;
        $peneguhan->keterangan=$request->keterangan;
        $peneguhan->penerima=$request->penerima;
        $peneguhan->menyatakan=$request->menyatakan;
        $peneguhan->verifikasi=$request->verifikasi;
        $peneguhan->validasi=$request->validasi;
        $peneguhan->petugas=$request->petugas;
        $peneguhan->idayahibupas=$ayahibu_pas->id;  
        $peneguhan->idayahibuper=$ayahibu_per->id;  
        $peneguhan->status=$request->status;

        if ($request->hasFile('d_akta')) {
            $person = $request->file('d_akta');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/peneguhan/d_aktakelahiran';
                $person->move($destinationPath, $filename);
                $peneguhan->d_aktakelahiran=$filename;
        }
        if ($request->hasFile('d_ktp')) {
            $person = $request->file('d_ktp');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/peneguhan/d_ktp';
                $person->move($destinationPath, $filename);
                $peneguhan->d_ktp=$filename;
        }
        
        if ($request->hasFile('d_kk')) {
            $person = $request->file('d_kk');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/peneguhan/d_kartukeluarga';
                $person->move($destinationPath, $filename);
                $peneguhan->d_kk=$filename;
        }
        if ($request->hasFile('d_akta_nikah')) {
            $person = $request->file('d_akta_nikah');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/peneguhan/d_akta_nikah';
                $person->move($destinationPath, $filename);
                $peneguhan->d_akta_nikah=$filename;
        }
        if ($request->hasFile('d_sp_suami_istri')) {
            $person = $request->file('d_sp_suami_istri');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/peneguhan/d_sp_suami_istri';
                $person->move($destinationPath, $filename);
                $peneguhan->d_sp_suami_istri=$filename;
        }
        if ($request->hasFile('d_baptisan')) {
            $person = $request->file('d_baptisan');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/peneguhan/d_baptisan';
                $person->move($destinationPath, $filename);
                $peneguhan->d_baptisan=$filename;
        }
        if ($request->hasFile('d_kkj')) {
            $person = $request->file('d_kkj');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/peneguhan/kkj';
                $person->move($destinationPath, $filename);
                $peneguhan->d_kkj=$filename;
        }
        if ($request->hasFile('d_sertfifkat_kom')) {
            $person = $request->file('d_sertfifkat_kom');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/peneguhan/d_sertfifkat_kom';
                $person->move($destinationPath, $filename);
                $peneguhan->d_sertfifkat_kom=$filename;
        }
        if ($request->hasFile('d_sertfifkat_bpn')) {
            $person = $request->file('d_sertfifkat_bpn');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/peneguhan/d_sertfifkat_bpn';
                $person->move($destinationPath, $filename);
                $peneguhan->d_sertfifkat_bpn=$filename;
        }
        if ($request->hasFile('d_foto1')) {
            $person = $request->file('d_foto1');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/peneguhan/d_foto1';
                $person->move($destinationPath, $filename);
                $peneguhan->d_foto1=$filename;
        }
        if ($request->hasFile('d_foto2')) {
            $person = $request->file('d_foto2');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/peneguhan/d_foto2';
                $person->move($destinationPath, $filename);
                $peneguhan->d_foto2=$filename;
        }
        if ($request->hasFile('d_foto3')) {
            $person = $request->file('d_foto3');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/peneguhan/d_foto3';
                $person->move($destinationPath, $filename);
                $peneguhan->d_foto3=$filename;
        }
        if ($request->hasFile('d_perceraian')) {
            $person = $request->file('d_perceraian');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/peneguhan/d_perceraian';
                $person->move($destinationPath, $filename);
                $peneguhan->d_perceraian=$filename;
        }
        if ($request->hasFile('d_ttd_penenguhan')) {
            $person = $request->file('d_ttd_penenguhan');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/peneguhan/d_ttd_penenguhan';
                $person->move($destinationPath, $filename);
                $peneguhan->d_ttd_penenguhan=$filename;
        }
        if ($request->hasFile('d_berita')) {
            $person = $request->file('d_berita');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/peneguhan/d_berita';
                $person->move($destinationPath, $filename);
                $peneguhan->d_berita=$filename;
        }
        if ($request->hasFile('d_pendaftaran')) {
            $person = $request->file('d_pendaftaran');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/peneguhan/d_pendaftaran';
                $person->move($destinationPath, $filename);
                $peneguhan->d_pendaftaran=$filename;
        }
        if ($request->hasFile('d_lain')) {
            $person = $request->file('d_lain');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/peneguhan/d_lain';
                $person->move($destinationPath, $filename);
                $peneguhan->d_lain=$filename;
        }
        $peneguhan->save();
        return redirect('modul/pelayanjemaat/peneguhan/caper');
    }

    public function akta_store(Request $request){
        $ai = Ayahibu::orderBy('id','DESC')->first();
        $ida = ($ai != null) ? $ai->id+1: '1';
        $ayahibu_per = new Ayahibu;
        $ayahibu_per->id=$ida;
        $ayahibu_per->idpersonal=$request->idsuami;
        $ayahibu_per->idayahper=$request->idayah_suami;
        $ayahibu_per->namadepan=$request->namaayah_depan_suami;
        $ayahibu_per->namatengah=$request->namaayah_tengah_suami;
        $ayahibu_per->namabelakang=$request->namaayah_belakang_suami;
        $ayahibu_per->idibuper=$request->idibu_suami;
        $ayahibu_per->namadepanibu=$request->namaibu_depan_suami;
        $ayahibu_per->namatengahibu=$request->namaibu_tengah_suami;
        $ayahibu_per->namabelakangibu=$request->namaibu_belakang_suami;
        $ayahibu_per->save();

        $aia = Ayahibu::orderBy('id','DESC')->first();
        $idaa = ($aia != null) ? $aia->id+1: '1';
        $ayahibu_pas = new Ayahibu;
        $ayahibu_pas->id=$idaa;
        $ayahibu_pas->idpersonal=$request->idistri;
        $ayahibu_pas->idayahper=$request->idayah_istri;
        $ayahibu_pas->namadepan=$request->namaayah_depan_istri;
        $ayahibu_pas->namatengah=$request->namaayah_tengah_istri;
        $ayahibu_pas->namabelakang=$request->namaayah_belakang_istri;
        $ayahibu_pas->idibuper=$request->idibu_istri;
        $ayahibu_pas->namadepanibu=$request->namaibu_depan_istri;
        $ayahibu_pas->namatengahibu=$request->namaibu_tengah_istri;
        $ayahibu_pas->namabelakangibu=$request->namaibu_belakang_istri;
        $ayahibu_pas->save();

        $peneguhan = new Peneguhan;
        $peneguhan->idpersonal=$request->idsuami;
        $peneguhan->idpasangan=$request->idistri;
        $peneguhan->idpelayan=$request->idpelayan;
        $peneguhan->noakta=$request->noakta;
        $peneguhan->tanggal=$request->tanggal;
        $peneguhan->idcabangranting=$request->idcabangranting;
        $peneguhan->tempatpernikahan=$request->tempatpernikahan;
        $peneguhan->keterangan=$request->keterangan;
        $peneguhan->penerima=$request->penerima;
        $peneguhan->menyatakan=$request->menyatakan;
        $peneguhan->verifikasi=$request->verifikasi;
        $peneguhan->validasi=$request->validasi;
        $peneguhan->petugas=$request->petugas;
        $peneguhan->idayahibupas=$ayahibu_pas->id;  
        $peneguhan->idayahibuper=$ayahibu_per->id;  
        $peneguhan->status=$request->status;

        if ($request->hasFile('d_akta')) {
            $person = $request->file('d_akta');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/peneguhan/d_aktakelahiran';
                $person->move($destinationPath, $filename);
                $peneguhan->d_aktakelahiran=$filename;
        }
        if ($request->hasFile('d_ktp')) {
            $person = $request->file('d_ktp');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/peneguhan/d_ktp';
                $person->move($destinationPath, $filename);
                $peneguhan->d_ktp=$filename;
        }
        
        if ($request->hasFile('d_kk')) {
            $person = $request->file('d_kk');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/peneguhan/d_kartukeluarga';
                $person->move($destinationPath, $filename);
                $peneguhan->d_kk=$filename;
        }
        if ($request->hasFile('d_akta_nikah')) {
            $person = $request->file('d_akta_nikah');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/peneguhan/d_akta_nikah';
                $person->move($destinationPath, $filename);
                $peneguhan->d_akta_nikah=$filename;
        }
        if ($request->hasFile('d_sp_suami_istri')) {
            $person = $request->file('d_sp_suami_istri');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/peneguhan/d_sp_suami_istri';
                $person->move($destinationPath, $filename);
                $peneguhan->d_sp_suami_istri=$filename;
        }
        if ($request->hasFile('d_baptisan')) {
            $person = $request->file('d_baptisan');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/peneguhan/d_baptisan';
                $person->move($destinationPath, $filename);
                $peneguhan->d_baptisan=$filename;
        }
        if ($request->hasFile('d_kkj')) {
            $person = $request->file('d_kkj');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/peneguhan/kkj';
                $person->move($destinationPath, $filename);
                $peneguhan->d_kkj=$filename;
        }
        if ($request->hasFile('d_sertfifkat_kom')) {
            $person = $request->file('d_sertfifkat_kom');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/peneguhan/d_sertfifkat_kom';
                $person->move($destinationPath, $filename);
                $peneguhan->d_sertfifkat_kom=$filename;
        }
        if ($request->hasFile('d_sertfifkat_bpn')) {
            $person = $request->file('d_sertfifkat_bpn');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/peneguhan/d_sertfifkat_bpn';
                $person->move($destinationPath, $filename);
                $peneguhan->d_sertfifkat_bpn=$filename;
        }
        if ($request->hasFile('d_foto1')) {
            $person = $request->file('d_foto1');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/peneguhan/d_foto1';
                $person->move($destinationPath, $filename);
                $peneguhan->d_foto1=$filename;
        }
        if ($request->hasFile('d_foto2')) {
            $person = $request->file('d_foto2');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/peneguhan/d_foto2';
                $person->move($destinationPath, $filename);
                $peneguhan->d_foto2=$filename;
        }
        if ($request->hasFile('d_foto3')) {
            $person = $request->file('d_foto3');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/peneguhan/d_foto3';
                $person->move($destinationPath, $filename);
                $peneguhan->d_foto3=$filename;
        }
        if ($request->hasFile('d_perceraian')) {
            $person = $request->file('d_perceraian');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/peneguhan/d_perceraian';
                $person->move($destinationPath, $filename);
                $peneguhan->d_perceraian=$filename;
        }
        if ($request->hasFile('d_ttd_peneguhan')) {
            $person = $request->file('d_ttd_peneguhan');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/peneguhan/d_ttd_peneguhan';
                $person->move($destinationPath, $filename);
                $peneguhan->d_ttd_peneguhan=$filename;
        }
        if ($request->hasFile('d_berita')) {
            $person = $request->file('d_berita');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/peneguhan/d_berita';
                $person->move($destinationPath, $filename);
                $peneguhan->d_berita=$filename;
        }
        if ($request->hasFile('d_pendaftaran')) {
            $person = $request->file('d_pendaftaran');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/peneguhan/d_pendaftaran';
                $person->move($destinationPath, $filename);
                $peneguhan->d_pendaftaran=$filename;
        }
        if ($request->hasFile('d_lain')) {
            $person = $request->file('d_lain');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/peneguhan/d_lain';
                $person->move($destinationPath, $filename);
                $peneguhan->d_lain=$filename;
        }
        $peneguhan->save();
        return redirect('modul/pelayanjemaat/peneguhan');
    }
    public function akta_update(Request $request,$id){
        $ayahibu_per = Ayahibu::find($request->idayahibupas);
        $ayahibu_per->idpersonal=$request->idsuami;
        $ayahibu_per->idayahper=$request->idayah_suami;
        $ayahibu_per->namadepan=$request->namaayah_depan_suami;
        $ayahibu_per->namatengah=$request->namaayah_tengah_suami;
        $ayahibu_per->namabelakang=$request->namaayah_belakang_suami;
        $ayahibu_per->idibuper=$request->idibu_suami;
        $ayahibu_per->namadepanibu=$request->namaibu_depan_suami;
        $ayahibu_per->namatengahibu=$request->namaibu_tengah_suami;
        $ayahibu_per->namabelakangibu=$request->namaibu_belakang_suami;
        $ayahibu_per->save();

        $ayahibu_pas =  Ayahibu::find($request->idayahibuper);
        $ayahibu_pas->idpersonal=$request->idistri;
        $ayahibu_pas->idayahper=$request->idayah_istri;
        $ayahibu_pas->namadepan=$request->namaayah_depan_istri;
        $ayahibu_pas->namatengah=$request->namaayah_tengah_istri;
        $ayahibu_pas->namabelakang=$request->namaayah_belakang_istri;
        $ayahibu_pas->idibuper=$request->idibu_istri;
        $ayahibu_pas->namadepanibu=$request->namaibu_depan_istri;
        $ayahibu_pas->namatengahibu=$request->namaibu_tengah_istri;
        $ayahibu_pas->namabelakangibu=$request->namaibu_belakang_istri;
        $ayahibu_pas->save();

        $peneguhan =  Peneguhan::findOrFail($id);
        $peneguhan->idpersonal=$request->idsuami;
        $peneguhan->idpasangan=$request->idistri;
        $peneguhan->idpelayan=$request->idpelayan;
        $peneguhan->noakta=$request->noakta;
        $peneguhan->tanggal=$request->tanggal;
        $peneguhan->idcabangranting=$request->idcabangranting;
        $peneguhan->tempatpernikahan=$request->tempatpernikahan;
        $peneguhan->keterangan=$request->keterangan;
        $peneguhan->penerima=$request->penerima;
        $peneguhan->menyatakan=$request->menyatakan;
        $peneguhan->verifikasi=$request->verifikasi;
        $peneguhan->validasi=$request->validasi;
        $peneguhan->petugas=$request->petugas;
        $peneguhan->idayahibupas=$ayahibu_pas->id;  
        $peneguhan->idayahibuper=$ayahibu_per->id;  
        $peneguhan->status='Menerima Akta Peneguhan';

        if ($request->hasFile('d_akta')) {
            $person = $request->file('d_akta');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/peneguhan/d_aktakelahiran';
                $person->move($destinationPath, $filename);
                $peneguhan->d_aktakelahiran=$filename;
        }
        if ($request->hasFile('d_ktp')) {
            $person = $request->file('d_ktp');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/peneguhan/d_ktp';
                $person->move($destinationPath, $filename);
                $peneguhan->d_ktp=$filename;
        }
        
        if ($request->hasFile('d_kk')) {
            $person = $request->file('d_kk');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/peneguhan/d_kartukeluarga';
                $person->move($destinationPath, $filename);
                $peneguhan->d_kk=$filename;
        }
        if ($request->hasFile('d_akta_nikah')) {
            $person = $request->file('d_akta_nikah');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/peneguhan/d_akta_nikah';
                $person->move($destinationPath, $filename);
                $peneguhan->d_akta_nikah=$filename;
        }
        if ($request->hasFile('d_sp_suami_istri')) {
            $person = $request->file('d_sp_suami_istri');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/peneguhan/d_sp_suami_istri';
                $person->move($destinationPath, $filename);
                $peneguhan->d_sp_suami_istri=$filename;
        }
        if ($request->hasFile('d_baptisan')) {
            $person = $request->file('d_baptisan');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/peneguhan/d_baptisan';
                $person->move($destinationPath, $filename);
                $peneguhan->d_baptisan=$filename;
        }
        if ($request->hasFile('d_kkj')) {
            $person = $request->file('d_kkj');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/peneguhan/kkj';
                $person->move($destinationPath, $filename);
                $peneguhan->d_kkj=$filename;
        }
        if ($request->hasFile('d_sertfifkat_kom')) {
            $person = $request->file('d_sertfifkat_kom');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/peneguhan/d_sertfifkat_kom';
                $person->move($destinationPath, $filename);
                $peneguhan->d_sertfifkat_kom=$filename;
        }
        if ($request->hasFile('d_sertfifkat_bpn')) {
            $person = $request->file('d_sertfifkat_bpn');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/peneguhan/d_sertfifkat_bpn';
                $person->move($destinationPath, $filename);
                $peneguhan->d_sertfifkat_bpn=$filename;
        }
        if ($request->hasFile('d_foto1')) {
            $person = $request->file('d_foto1');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/peneguhan/d_foto1';
                $person->move($destinationPath, $filename);
                $peneguhan->d_foto1=$filename;
        }
        if ($request->hasFile('d_foto2')) {
            $person = $request->file('d_foto2');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/peneguhan/d_foto2';
                $person->move($destinationPath, $filename);
                $peneguhan->d_foto2=$filename;
        }
        if ($request->hasFile('d_foto3')) {
            $person = $request->file('d_foto3');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/peneguhan/d_foto3';
                $person->move($destinationPath, $filename);
                $peneguhan->d_foto3=$filename;
        }
        if ($request->hasFile('d_perceraian')) {
            $person = $request->file('d_perceraian');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/peneguhan/d_perceraian';
                $person->move($destinationPath, $filename);
                $peneguhan->d_perceraian=$filename;
        }
        if ($request->hasFile('d_ttd_penenguhan')) {
            $person = $request->file('d_ttd_penenguhan');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/peneguhan/d_ttd_penenguhan';
                $person->move($destinationPath, $filename);
                $peneguhan->d_ttd_penenguhan=$filename;
        }
        if ($request->hasFile('d_berita')) {
            $person = $request->file('d_berita');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/peneguhan/d_berita';
                $person->move($destinationPath, $filename);
                $peneguhan->d_berita=$filename;
        }
        if ($request->hasFile('d_pendaftaran')) {
            $person = $request->file('d_pendaftaran');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/peneguhan/d_pendaftaran';
                $person->move($destinationPath, $filename);
                $peneguhan->d_pendaftaran=$filename;
        }
        if ($request->hasFile('d_lain')) {
            $person = $request->file('d_lain');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/peneguhan/d_lain';
                $person->move($destinationPath, $filename);
                $peneguhan->d_lain=$filename;
        }
        $peneguhan->save();
        return redirect('modul/pelayanjemaat/peneguhan');
    }
}
