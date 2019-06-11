<?php

namespace App\Http\Controllers;

use App\Cabang;
use Illuminate\Http\Request;
use App\Personal;
use App\Provinces;
use App\Rayon;
use App\Subrayon;
use App\Kebaktian;
use App\Saldo;
use App\Kegiatan;
use App\Bank;
use App\Keanggotaan;
use App\Kompetensi;



class CabangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cabang= Cabang::all();
        return view('frontend.institusi.cabang.index',compact('cabang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $rayon= Rayon::all();
        $subrayon= Subrayon::all();
        $personal= Personal::all();
        $provinces=Provinces::all();
        return view('frontend.institusi.cabang.create',compact('personal','provinces','rayon','subrayon'));
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
         $last_sra = Cabang::orderBy('idcabangranting','DESC')->first();
        $id = ($last_sra != null) ? $last_sra->idcabangranting+1: '1';
       
        $cabang = new Cabang;
        $cabang->idcabangranting = $id;
        $cabang->wilayah = $request->wilayah;
        $cabang->idrayon = $request->idrayon;
        $cabang->idsubrayon = $request->idsubrayon;
        $cabang->kodecabang = $request->kode;
        $cabang->namacabang = $request->nama;
        $cabang->pemimpin = $request->pemimpin;
        $cabang->wakilpemimpin = $request->wakilpemimpin;
        $cabang->jeniscabang = $request->jeniscabang;
        $cabang->alamat = $request->alamat;
        $cabang->rt = $request->rtrw;
        $cabang->kelurahan = $request->villages;
        $cabang->kecamatan = $request->districts;
        $cabang->kota = $request->regencies;
        $cabang->provinsi = $request->provinces;
        $cabang->negara = $request->negara;
        $cabang->kodepos = $request->kodepos;
        $cabang->googlemap = $request->google;
        $cabang->latitude = $request->latitude;
        $cabang->longitude = $request->longitude;
        $cabang->notelepon = $request->notelp;
        $cabang->fax = $request->fax;
        $cabang->email = $request->email;
        $cabang->noref = $request->noref;
        $cabang->keterangan = $request->keterangan;
        $cabang->active = $request->status;
        $cabang->perjamuan = $request->perjamuan;

        $cabang->save();
        return $cabang;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cabang  $cabang
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $cabang = Cabang::findOrFail($id);
        $rayon= Rayon::all();
        $personal= Personal::all();
        $provinces=Provinces::all();
        $kebaktian = Kebaktian::where('idcabangranting',$cabang->idcabangranting)->get();
        return view('frontend.institusi.cabang.indexkebaktian',compact('cabang','kebaktian','provinces','personal','rayon'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cabang  $cabang
     * @return \Illuminate\Http\Response
     */
    public function edit( $idcabangranting)
    {
        //
        $cabang = Cabang::findOrFail($idcabangranting);
        $personal= Personal::all();
        $rayon=Rayon::all();
        $subrayon=Subrayon::all();
        $provinces=Provinces::all();
        return view('frontend.institusi.cabang.edit',compact('cabang','kebaktian','provinces','personal','rayon','subrayon'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cabang  $cabang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idcabangranting)
    {
        //
        $cabang = Cabang::findOrFail($idcabangranting);
        $cabang->wilayah = $request->wilayah;
        $cabang->idrayon = $request->idrayon;
        $cabang->idsubrayon = $request->idsubrayon;
        $cabang->kodecabang = $request->kode;
        $cabang->namacabang = $request->nama;
        $cabang->pemimpin = $request->pemimpin;
        $cabang->wakilpemimpin = $request->wakilpemimpin;
        $cabang->jeniscabang = $request->jeniscabang;
        $cabang->alamat = $request->alamat;
        $cabang->rt = $request->rtrw;
        $cabang->kelurahan = $request->villages;
        $cabang->kecamatan = $request->districts;
        $cabang->kota = $request->regencies;
        $cabang->provinsi = $request->provinces;
        $cabang->negara = $request->negara;
        $cabang->kodepos = $request->kodepos;
        $cabang->googlemap = $request->google;
        $cabang->latitude = $request->latitude;
        $cabang->longitude = $request->longitude;
        $cabang->notelepon = $request->notelp;
        $cabang->fax = $request->fax;
        $cabang->email = $request->email;
        $cabang->noref = $request->noref;
        $cabang->keterangan = $request->keterangan;
        $cabang->active = $request->status;
        $cabang->perjamuan = $request->perjamuan;
        $cabang->save();
        return redirect()->route('cabang.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cabang  $cabang
     * @return \Illuminate\Http\Response
     */
    public function destroy($idcabangranting)
    {
        //
        $cabang=Cabang::findOrFail($idcabangranting);
        $cabang->delete();
        return redirect()->route('cabang.index');
    }
    public function get_cabang($idcabangranting){
        $cabang = Cabang::findOrFail($idcabangranting);
        $personal= Personal::all();
        $provinces=Provinces::all();
        return view('frontend.institusi.cabang.tambahkebaktian',compact('personal','provinces','cabang'));
    }
    public function get_kebaktian($idkebaktian){
        $kebaktian = Kebaktian::findOrFail($idkebaktian);
        $personal= Personal::all();
        $provinces=Provinces::all();
        return view('frontend.institusi.cabang.editkebaktian',compact('personal','provinces','kebaktian'));
    }
    public function get_anggota($idkebaktian){
        $kebaktian = Kebaktian::findOrFail($idkebaktian);
        $personal= Personal::all();
        return view('frontend.institusi.cabang.anggota',compact('personal','kebaktian'));
    }
     public function detail_cabang($idcabangranting){
        $personal= Personal::all();
        $provinces=Provinces::all();
        $rayon= Rayon::all();
        $subrayon= Subrayon::all();
        $cabang= Cabang::findOrFail($idcabangranting);
        return view('frontend.institusi.cabang.detail',compact('cabang','personal','provinces','rayon','subrayon'));
    }

    public function cabang_saldo($idcabangranting){
        $cabang= Cabang::findOrFail($idcabangranting);
        $saldo = Saldo::where('idcabangranting',$cabang->idcabangranting)->get();
        return view('frontend.institusi.cabang.indexsaldo',compact('cabang','saldo'));
    }
    public function add_saldo($idcabangranting){
        $cabang = Cabang::findOrFail($idcabangranting);
        $bank = Bank::all();
        return view('frontend.institusi.cabang.tambahsaldo',compact('bank','cabang'));
    }

    public function personal($idcabangranting){
        $anggota= Keanggotaan::where('idcabangranting',$idcabangranting)->whereNull('tglregistrasipindah')->get();
        return view('frontend.institusi.cabang.personal',compact('anggota'));
    }
    public function edit_personal($idpersonal){
        $personal= Personal::findOrFail($idpersonal);
        $anggota= Keanggotaan::where('idpersonal',$personal->idpersonal)->get();
        $cabang = Cabang::all();
        return view('frontend.institusi.cabang.editpersonal',compact('personal','cabang','anggota'));
    }
    public function detail_personal($idpersonal){
        $personal= Personal::findOrFail($idpersonal);
        return view('frontend.institusi.cabang.detailpersonal',compact('personal'));
    }
    public function upd_personal(Request $request,$idpersonal){
        $personal= Personal::findOrFail($idpersonal);
        $personal->namalengkap = $request->nama;
        $personal->jeniskelamin = $request->jk;
        $personal->alamattinggal = $request->alamat;
        $personal->nohp = $request->nohp;
        $personal->email = $request->email;
        $personal->gerejaasal = $request->gereja;
        $personal->save();
        return redirect('cabang/personal/'.$request->idcabangranting);
    }
    public function kegiatan($id){
        $kegiatan= kegiatan::where('idcabangranting',$id)->get();
        return view('frontend.institusi.cabang.kegiatan.index',compact('kegiatan'));
    }
}
