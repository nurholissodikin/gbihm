<?php

namespace App\Http\Controllers;

use App\Divisi;
use Illuminate\Http\Request;
use App\Personal;
use App\Provinces;
use App\Bank;
use App\Saldo;

class DivisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $per= Personal::all();
        $provinces=Provinces::all();
        $divisi= Divisi::all();
        return view('frontend.institusi.divisi.index',compact('divisi','per','provinces'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $personal= Personal::all();
        return view('frontend.institusi.divisi.create',compact('personal'));
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
        $divisi = new Divisi;
        $divisi->kodedivisi = $request->kodediv;
        $divisi->namadivisi = $request->namadiv;
        $divisi->pemimpin = $request->pemimpin;
        $divisi->wakilpemimpin = $request->wakilpemimpin;
        $divisi->jenisdivisi = $request->jenisdivisi;
        $divisi->alamat = trim($request->alamat);
        $divisi->rtrw = $request->rtrw;
        $divisi->kelurahan = $request->villages;
        $divisi->kecamatan = $request->districts;
        $divisi->kota = $request->regencies;
        $divisi->provinsi = $request->provinces;
        $divisi->negara = $request->negara;
        $divisi->kodepos = $request->kodepos;
        $divisi->googlemap = $request->google;
        $divisi->latitude = $request->latitude;
        $divisi->longitude = $request->longitude;
        $divisi->notelepon = $request->notelp;
        $divisi->fax = $request->fax;
        $divisi->email = $request->email;
        $divisi->noref = $request->noref;
        $divisi->keterangan = $request->keterangan;
        $divisi->status = $request->status;
        $divisi->save();
        return redirect()->route('divisi.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Divisi  $divisi
     * @return \Illuminate\Http\Response
     */
    public function show($iddivisi)
    {
        //
        $divisi= Divisi::findOrFail($iddivisi);
        $saldo = Saldo::where('iddivisi',$divisi->iddivisi)->get();
       
        return view('frontend.institusi.divisi.indexsaldo',compact('divisi','saldo','total'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Divisi  $divisi
     * @return \Illuminate\Http\Response
     */
    public function edit($iddivisi)
    {
        //
        $personal= Personal::all();
        $provinces=Provinces::all();
        $divisi= Divisi::findOrFail($iddivisi);
        return view('frontend.institusi.divisi.edit',compact('divisi','personal','provinces'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Divisi  $divisi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$iddivisi)
    {
        //
        $divisi= Divisi::findOrFail($iddivisi);
        $divisi->kodedivisi = $request->kodediv;
        $divisi->namadivisi = $request->namadiv;
        $divisi->pemimpin = $request->pemimpin;
        $divisi->wakilpemimpin = $request->wakilpemimpin;
        $divisi->jenisdivisi = $request->jenisdivisi;
        $divisi->alamat = $request->alamat;
        $divisi->rtrw = $request->rtrw;
        $divisi->kelurahan = $request->villages;
        $divisi->kecamatan = $request->districts;
        $divisi->kota = $request->regencies;
        $divisi->provinsi = $request->provinces;
        $divisi->negara = $request->negara;
        $divisi->kodepos = $request->kodepos;
        $divisi->googlemap = $request->google;
        $divisi->latitude = $request->latitude;
        $divisi->longitude = $request->longitude;
        $divisi->notelepon = $request->notelp;
        $divisi->fax = $request->fax;
        $divisi->email = $request->email;
        $divisi->noref = $request->noref;
        $divisi->keterangan = $request->keterangan;
        $divisi->status = $request->status;
        $divisi->save();
        return redirect()->route('divisi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Divisi  $divisi
     * @return \Illuminate\Http\Response
     */
    public function destroy($iddivisi)
    {
        //
        $divisi = Divisi::findOrFail($iddivisi);
        $divisi->delete();
        return redirect()->route('divisi.index');
    }
     public function get_divisi($iddivisi){

        $divisi = Divisi::findOrFail($iddivisi);
        $bank = Bank::all();
        return view('frontend.institusi.divisi.setor',compact('divisi','bank'));
    }
    public function detail_divisi($iddivisi){
        $personal= Personal::all();
        $provinces=Provinces::all();
        $divisi= Divisi::findOrFail($iddivisi);
        return view('frontend.institusi.divisi.detail',compact('divisi','personal','provinces'));
    }
}
