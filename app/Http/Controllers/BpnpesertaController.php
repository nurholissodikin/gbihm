<?php

namespace App\Http\Controllers;

use App\Bpnpeserta;
use App\Personal;
use App\Bpnkehadiran;
use App\Bpnkonseling;
use App\Bpnguru;
use App\Bpnmateri;
use Illuminate\Http\Request;

class BpnpesertaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $peserta = Bpnpeserta::all();
        return view('frontend.modul.bp2n.peserta.index',compact('peserta'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $pria = personal::where('jeniskelamin','L')->get();
        $wanita = personal::where('jeniskelamin','P')->get();
        return view('frontend.modul.bp2n.peserta.create',compact('pria','wanita'));
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
        $peserta = new Bpnpeserta;
        $peserta->idpria=$request->pria;
        $peserta->idwanita=$request->wanita;
        $peserta->nosertifikat=$request->noser;
        $peserta->angkatan=$request->angkatan;
        $peserta->kategori=$request->kategori;
        $peserta->status=$request->status;
        $peserta->save();

        return redirect()->route('bp2npeserta.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bpnpeserta  $bpnpeserta
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $peserta = Bpnpeserta::findorFail($id);
        return view('frontend.modul.bp2n.peserta.detail',compact('peserta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bpnpeserta  $bpnpeserta
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $peserta = Bpnpeserta::findorFail($id);
        $pria = personal::where('jeniskelamin','L')->get();
        $wanita = personal::where('jeniskelamin','P')->get();
        return view('frontend.modul.bp2n.peserta.edit',compact('pria','wanita','peserta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bpnpeserta  $bpnpeserta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
        $peserta = Bpnpeserta::findorFail($id);
        $peserta->idpria=$request->pria;
        $peserta->idwanita=$request->wanita;
        $peserta->nosertifikat=$request->noser;
        $peserta->angkatan=$request->angkatan;
        $peserta->kategori=$request->kategori;
        $peserta->status=$request->status;
        $peserta->save();

        return redirect()->route('bp2npeserta.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bpnpeserta  $bpnpeserta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bpnpeserta $bpnpeserta)
    {
        //
    }
    public function get_peserta($id){
        $personal = Personal::where('idpersonal',$id)->first();
        $auto = [];
        $auto['namalengkap'] = $personal->namalengkap;
        return $auto;
    }
    public function get_konseling($id){
         $peserta = Bpnpeserta::findorFail($id);
        $konseling = Bpnkonseling::where('idpeserta',$id)->get(); 
        return view('frontend.modul.bp2n.peserta.konseling.index',compact('peserta','konseling'));
    }
    public function get_konseling_create($id){
         $peserta = Bpnpeserta::findorFail($id);
        return view('frontend.modul.bp2n.peserta.konseling.create',compact('peserta'));
    }
    public function get_konseling_edit($id){
         $konseling = Bpnkonseling::findorFail($id);
        return view('frontend.modul.bp2n.peserta.konseling.edit',compact('konseling'));
    }
    public function get_konseling_detail($id){
         $konseling = Bpnkonseling::findorFail($id);
        return view('frontend.modul.bp2n.peserta.konseling.detail',compact('konseling'));
    }

    public function get_kehadiran($id){
         $peserta = Bpnpeserta::findorFail($id);
        $kehadiran = Bpnkehadiran::where('idpeserta',$id)->get(); 
        return view('frontend.modul.bp2n.peserta.kehadiran.index',compact('peserta','kehadiran'));
    }
    public function get_kehadiran_create($id){
         $guru = Bpnguru::all();
          $materi = Bpnmateri::all();
         $peserta = Bpnpeserta::findorFail($id);
        return view('frontend.modul.bp2n.peserta.kehadiran.create',compact('peserta','guru','materi'));
    }
    public function get_kehadiran_edit($id){
          $guru = Bpnguru::all();
          $materi = Bpnmateri::all();
         $kehadiran = Bpnkehadiran::findorFail($id);
        return view('frontend.modul.bp2n.peserta.kehadiran.edit',compact('kehadiran','materi','guru'));
    }
    public function get_kehadiran_detail($id){
         $kehadiran = Bpnkehadiran::findorFail($id);
        return view('frontend.modul.bp2n.peserta.kehadiran.detail',compact('kehadiran'));
    }
    
}
