<?php

namespace App\Http\Controllers;

use App\Bpnkehadiran;
use App\Bpnguru;
use App\Bpnpeserta;
use App\Vbpnkehadiran;
use App\Bpnmateri;
use Illuminate\Http\Request;

class BpnkehadiranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $kehadiran = Bpnkehadiran::all();
        return view('frontend.modul.bp2n.kehadiran.index',compact('kehadiran'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $peserta = Bpnpeserta::all();
        $guru = Bpnguru::all();
        $materi = Bpnmateri::all();
        return view('frontend.modul.bp2n.kehadiran.create',compact('guru','materi','peserta'));
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
        $konseling = new Bpnkehadiran;
        $konseling->idpeserta=$request->peserta;
        $konseling->tanggal=$request->tanggal;
        $konseling->idmateri=$request->materi;
         $konseling->idguru=$request->guru;
        $konseling->status=$request->status;
        $konseling->save();
        return redirect()->route('bp2nkehadiran.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bpnkehadiran  $bpnkehadiran
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
         $kehadiran = Bpnkehadiran::findorFail($id);
        $peserta = Bpnpeserta::all();
        $guru = Bpnguru::all();
        $materi = Bpnmateri::all();
        return view('frontend.modul.bp2n.kehadiran.detail',compact('guru','materi','kehadiran','peserta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bpnkehadiran  $bpnkehadiran
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        //
        $kehadiran = Bpnkehadiran::findorFail($id);
        $peserta = Bpnpeserta::all();
        $guru = Bpnguru::all();
        $materi = Bpnmateri::all();
        return view('frontend.modul.bp2n.kehadiran.edit',compact('guru','materi','kehadiran','peserta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bpnkehadiran  $bpnkehadiran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
         $konseling = Bpnkehadiran::findorFail($id);
        $konseling->idpeserta=$request->peserta;
        $konseling->tanggal=$request->tanggal;
        $konseling->idmateri=$request->materi;
         $konseling->idguru=$request->guru;
        $konseling->status=$request->status;
        $konseling->save();
        return redirect()->route('bp2nkehadiran.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bpnkehadiran  $bpnkehadiran
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bpnkehadiran $bpnkehadiran)
    {
        //
    }

    public function kehadiran_store(Request $request)
    {
        $konseling = new Bpnkehadiran;
        $konseling->idpeserta=$request->peserta;
        $konseling->tanggal=$request->tanggal;
        $konseling->idmateri=$request->materi;
         $konseling->idguru=$request->guru;
        $konseling->status=$request->status;
        $konseling->save();
        return redirect('bp2npeserta/kehadiran/'.$request->peserta);
    }

    public function kehadiran_update(Request $request, $id)
    {
        $konseling = Bpnkehadiran::findorFail($id);
        $konseling->idpeserta=$request->peserta;
        $konseling->tanggal=$request->tanggal;
        $konseling->idmateri=$request->materi;
        $konseling->idguru=$request->guru;
        $konseling->status=$request->status;
        $konseling->save();
        return redirect('bp2npeserta/kehadiran/'.$request->peserta);
    }       
     public function get_peserta($id)
    {
        $peserta = Bpnpeserta::where('id',$id)->first();
        $auto = [];
        $auto['id_pria'] = $peserta->idpria .' || '. $peserta->pria['namalengkap'];
        $auto['id_wanita'] = $peserta->idwanita .' || '. $peserta->wanita['namalengkap'];
        return $auto;
    } 
    public function pra()
    {
        $kehadiran = Vbpnkehadiran::where('kategori_peserta','["Pra Nikah"]')->get();
        return view('frontend.modul.bp2n.kehadiran.pra',compact('kehadiran'));
    }
    public function pasca()
    {
        $kehadiran = Vbpnkehadiran::where('kategori_peserta','["Pasca Nikah"]')->get();
        return view('frontend.modul.bp2n.kehadiran.pasca',compact('kehadiran'));
    }
    
}
