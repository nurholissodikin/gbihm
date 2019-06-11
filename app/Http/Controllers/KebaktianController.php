<?php

namespace App\Http\Controllers;

use App\Kebaktian;
use Illuminate\Http\Request;
use App\Personal;
use App\Provinces;
use App\Cabang;
use App\Subrayon;
use App\Rayon;

class KebaktianController extends Controller
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
        $rayon= Rayon::all();
        $subrayon= Subrayon::all();
        $personal= Personal::all();
        $provinces=Provinces::all();
        $cabang= Cabang::all();
        return view('frontend.institusi.cabang.tamkebaktian',compact('personal','provinces','rayon','subrayon','cabang'));
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
        $kebaktian = new Kebaktian;
        $kebaktian->idcabangranting =  $request->idcabangranting;
        $kebaktian->idrayon = $request->idrayon;
        $kebaktian->idsubrayon = $request->idsubrayon;
        $kebaktian->kodekebaktian = $request->kode;
        $kebaktian->namakebaktian = $request->nama;
        $kebaktian->jam = $request->jam;
        $kebaktian->kategori = $request->kategori;
        $kebaktian->alamat = $request->alamat;
        $kebaktian->rtrw = $request->rtrw;
        $kebaktian->kelurahan = $request->villages;
        $kebaktian->kecamatan = $request->districts;
        $kebaktian->kota = $request->regencies;
        $kebaktian->provinsi = $request->provinces;
        $kebaktian->tempat = $request->tempat;
        $kebaktian->kordinator = $request->kordinator;
        $kebaktian->kodepos = $request->kodepos;
        $kebaktian->notelepon = $request->notelp;
        $kebaktian->fax = $request->fax;
        $kebaktian->email = $request->email;
        $kebaktian->noref = $request->noref;
        $kebaktian->keterangan = $request->keterangan;
        $kebaktian->status = $request->status;
        $kebaktian->save();
        return redirect()->route('cabang.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kebaktian  $kebaktian
     * @return \Illuminate\Http\Response
     */
    public function show(Kebaktian $kebaktian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kebaktian  $kebaktian
     * @return \Illuminate\Http\Response
     */
    public function edit(Kebaktian $kebaktian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kebaktian  $kebaktian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kebaktian $kebaktian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kebaktian  $kebaktian
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kebaktian $kebaktian)
    {
        //
    }

    public function kebaktian($idcabangranting)
    {
        //
        $cabang = Cabang::where('idcabangranting',$idcabangranting)->first();
        $provinces = Provinces::all();
        $personal = Personal::all();   

        return view('frontend/institusi/cabang/createkebaktian',compact('cabang','provinces','personal'));
    }
    public function create_kebaktian(Request $request)
    {
        //
        $kebaktian = new Kebaktian;
        $kebaktian->idcabangranting =  $request->idcabangranting;
        $kebaktian->idrayon = $request->idrayon;
        $kebaktian->idsubrayon = $request->idsubrayon;
        $kebaktian->kodekebaktian = $request->kode;
        $kebaktian->namakebaktian = $request->nama;
        $kebaktian->jam = $request->jam;
        $kebaktian->kategori = $request->kategori;
        $kebaktian->alamat = $request->alamat;
        $kebaktian->rtrw = $request->rtrw;
        $kebaktian->kelurahan = $request->villages;
        $kebaktian->kecamatan = $request->districts;
        $kebaktian->kota = $request->regencies;
        $kebaktian->provinsi = $request->provinces;
        $kebaktian->tempat = $request->tempat;
        $kebaktian->kordinator = $request->kordinator;
        $kebaktian->kodepos = $request->kodepos;
        $kebaktian->notelepon = $request->notelp;
        $kebaktian->fax = $request->fax;
        $kebaktian->email = $request->email;
        $kebaktian->noref = $request->noref;
        $kebaktian->keterangan = $request->keterangan;
        $kebaktian->status = $request->status;
        $kebaktian->save();
        return redirect()->route('cabang.index');
    }

     public function add_kebaktian(Request $request)
    {
        //
        $kebaktian = new Kebaktian;
        $kebaktian->idcabangranting =  $request->idcabangranting;
        $kebaktian->idrayon = $request->idrayon;
        $kebaktian->idsubrayon = $request->idsubrayon;
        $kebaktian->kodekebaktian = $request->kode;
        $kebaktian->namakebaktian = $request->nama;
        $kebaktian->jam = $request->jam;
        $kebaktian->kategori = $request->kategori;
        $kebaktian->alamat = $request->alamat;
        $kebaktian->rtrw = $request->rtrw;
         $kebaktian->kecamatan = $request->districts;
        $kebaktian->kota = $request->regencies;
        $kebaktian->kota = $request->districts;
        $kebaktian->provinsi = $request->provinces;
        $kebaktian->tempat = $request->tempat;
        $kebaktian->kordinator = $request->kordinator;
        $kebaktian->kodepos = $request->kodepos;
        $kebaktian->notelepon = $request->notelp;
        $kebaktian->fax = $request->fax;
        $kebaktian->email = $request->email;
        $kebaktian->noref = $request->noref;
        $kebaktian->keterangan = $request->keterangan;
        $kebaktian->status = $request->status;
        $kebaktian->save();
         return redirect()->route('cabang.show',$kebaktian->idcabangranting);
    }

     public function edit_kebaktian(Request $request,$idkebaktian)
    {
        $kebaktian = Kebaktian::findOrFail($idkebaktian);
        $kebaktian->idcabangranting =  $request->idcabangranting;
        $kebaktian->idrayon = $request->idrayon;
        $kebaktian->idsubrayon = $request->idsubrayon;
        $kebaktian->kodekebaktian = $request->kode;
        $kebaktian->namakebaktian = $request->nama;
        $kebaktian->jam = $request->jam;
        $kebaktian->kategori = $request->kategori;
        $kebaktian->alamat = $request->alamat;
        $kebaktian->rtrw = $request->rtrw;
        $kebaktian->kelurahan = $request->villages;
        $kebaktian->kecamatan = $request->districts;
        $kebaktian->kota = $request->regencies;
        $kebaktian->provinsi = $request->provinces;
        $kebaktian->tempat = $request->tempat;
        $kebaktian->kordinator = $request->kordinator;
        $kebaktian->kodepos = $request->kodepos;
        $kebaktian->notelepon = $request->notelp;
        $kebaktian->fax = $request->fax;
        $kebaktian->email = $request->email;
        $kebaktian->noref = $request->noref;
        $kebaktian->keterangan = $request->keterangan;
        $kebaktian->status = $request->status;
        $kebaktian->save();
         return redirect()->route('cabang.show',$kebaktian->idcabangranting);
    }
     public function detail_kebaktian($idkebaktian){
        $kebaktian = Kebaktian::FindOrFail($idkebaktian);
        return view('frontend.institusi.cabang.detailkebaktian',compact('kebaktian'));
    }
}
