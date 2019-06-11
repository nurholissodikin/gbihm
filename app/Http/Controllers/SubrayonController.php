<?php

namespace App\Http\Controllers;

use App\Subrayon;
use Illuminate\Http\Request;
use App\Personal;
use App\Provinces;
use App\Rayon;
use App\Kegiatan;
use App\Bank;
use App\Saldo;
use App\Keanggotaan;
class SubrayonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $personal= personal::all();
        $subrayon= Subrayon::all();
        $rayon= Rayon::all();
        $provinces=Provinces::all();
        return view('frontend.institusi.subrayon.index',compact('subrayon','personal','provinces','rayon'));
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
        $last_sra = Subrayon::orderBy('idsubrayon','DESC')->first();
        $id = ($last_sra != null) ? $last_sra->idsubrayon+1: '1';
       
        $subrayon = new Subrayon;
        $subrayon->idsubrayon = $id;
        $subrayon->wilayah = $request->wilayah;
        $subrayon->idrayon = $request->idrayon;
        $subrayon->kodesubrayon = $request->kodes;
        $subrayon->namasubrayon = $request->namas;
        $subrayon->pemimpin = $request->pemimpin;
        $subrayon->wakilpemimpin = $request->wakilpemimpin;
        $subrayon->jenissubrayon = $request->jeniss;
        $subrayon->alamat = $request->alamat;
        $subrayon->rtrw = $request->rt;
        $subrayon->kelurahan = $request->villages;
        $subrayon->kecamatan = $request->districts;
        $subrayon->kota = $request->regencies;
        $subrayon->provinsi = $request->provinces;
        $subrayon->negara = $request->negara;
        $subrayon->kodepos = $request->kodepos;
        $subrayon->googlemap = $request->google;
        $subrayon->latitude = $request->latitude;
        $subrayon->longitude = $request->longitude;
        $subrayon->notelepon = $request->notelp;
        $subrayon->fax = $request->fax;
        $subrayon->email = $request->email;
        $subrayon->noref = $request->noref;
        $subrayon->keterangan = $request->keterangan;
        $subrayon->active = $request->status;
        $subrayon->save();
        return redirect()->route('subrayon.index');
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subrayon  $subrayon
     * @return \Illuminate\Http\Response
     */
    public function show($idsubrayon)
    {
        //
        $subrayon = Subrayon::findOrFail($idsubrayon);
        $saldo = Saldo::where('idsubrayon',$subrayon->idsubrayon)->get();
        return view('frontend.institusi.subrayon.indexsaldo',compact('subrayon','saldo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subrayon  $subrayon
     * @return \Illuminate\Http\Response
     */
    public function edit($idsubrayon)
    {
        //
        $personal= Personal::all();
        $provinces=Provinces::all();
        $rayon=Rayon::all();
        $subrayon= Subrayon::findOrFail($idsubrayon);
        return view('frontend.institusi.subrayon.edit',compact('subrayon','personal','provinces','rayon'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subrayon  $subrayon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$idsubrayon)
    {
        //
        $subrayon= Subrayon::findOrFail($idsubrayon);
        $subrayon->wilayah = $request->wilayah;
        $subrayon->idrayon = $request->idrayon;
        $subrayon->kodesubrayon = $request->kodes;
        $subrayon->namasubrayon = $request->namas;
        $subrayon->pemimpin = $request->pemimpin;
        $subrayon->wakilpemimpin = $request->wakilpemimpin;
        $subrayon->jenissubrayon = $request->jeniss;
        $subrayon->alamat = $request->alamat;
        $subrayon->rtrw = $request->rt;
        $subrayon->kelurahan = $request->villages;
        $subrayon->kecamatan = $request->districts;
        $subrayon->kota = $request->regencies;
        $subrayon->provinsi = $request->provinces;
        $subrayon->negara = $request->negara;
        $subrayon->kodepos = $request->kodepos;
        $subrayon->googlemap = $request->google;
        $subrayon->latitude = $request->latitude;
        $subrayon->longitude = $request->longitude;
        $subrayon->notelepon = $request->notelp;
        $subrayon->fax = $request->fax;
        $subrayon->email = $request->email;
        $subrayon->noref = $request->noref;
        $subrayon->keterangan = $request->keterangan;
        $subrayon->active = $request->status;
        $subrayon->save();
        return redirect()->route('subrayon.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subrayon  $subrayon
     * @return \Illuminate\Http\Response
     */
    public function destroy($idsubrayon)
    {
        //
         $subrayon = Subrayon::findOrFail($idsubrayon);
        $subrayon->delete();
        return redirect()->route('subrayon.index');
    }
    
    public function get_subrayon($idsubrayon){

        $subrayon = Subrayon::findOrFail($idsubrayon);
        $bank = Bank::all();
        return view('frontend.institusi.subrayon.setorsaldo',compact('subrayon','bank'));
    }
    public function detail_subrayon($idsubrayon){
        $personal= Personal::all();
        $provinces=Provinces::all();
        $rayon= Rayon::all();
        $subrayon= Subrayon::findOrFail($idsubrayon);
        return view('frontend.institusi.subrayon.detail',compact('subrayon','personal','provinces','rayon'));
    }
    public function personal($idsubrayon){
        $anggota= Keanggotaan::where('idsubrayon',$idsubrayon)->whereNull('tglregistrasipindah')->get();
        return view('frontend.institusi.subrayon.personal',compact('anggota'));
    }
     public function edit_personal($idpersonal){
        $personal= Personal::findOrFail($idpersonal);
        $anggota= Keanggotaan::where('idpersonal',$personal->idpersonal)->get();
       
        return view('frontend.institusi.subrayon.editpersonal',compact('personal','anggota'));
    }
    public function detail_personal($idpersonal){
        $personal= Personal::findOrFail($idpersonal);
        return view('frontend.institusi.subrayon.detailpersonal',compact('personal'));
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
        return redirect('subrayon/personal/'.$request->idsubrayon);
    }

    public function kegiatan($id){
        $kegiatan= kegiatan::where('idsubrayon',$id)->get();
        return view('frontend.institusi.subrayon.kegiatan.index',compact('kegiatan'));
    }
}
