<?php

namespace App\Http\Controllers;

use App\Komkehadiran;
use App\Guru;
use App\Rayon;
use App\Kelaskom;
use App\Materi;
use App\Kehadiranabsensi;
use Illuminate\Http\Request;

class KomkehadiranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $komkehadiran = Komkehadiran::all();
        return view('frontend.modul.kom.kelas.kehadiran.index',compact('komkehadiran'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $rayon = Rayon::all();
        $guru = Guru::all();
        return view ('frontend.modul.kom.kelas.kehadiran.create',compact('rayon','guru'));
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
        $materi = new Komkehadiran;
        $materi->idkelaskom=$request->id;
        $materi->idguru=$request->guru;
        $materi->idmateri=$request->materi;
        $materi->tgl=$request->tanggal;
        $materi->jam=$request->jam;
        $materi->persembahan=$request->persembahan;
        $materi->usercreated=$request->created;
        $materi->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Komkehadiran  $komkehadiran
     * @return \Illuminate\Http\Response
     */
    public function show(Komkehadiran $komkehadiran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Komkehadiran  $komkehadiran
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $komke = Komkehadiran::findOrFail($id);
        $materi = Materi::all();
        $guru = Guru::all();
        return view ('frontend.modul.kom.kelas.kehadiran.edit',compact('materi','guru','komke'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Komkehadiran  $komkehadiran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        //
        $materi = Komkehadiran::findOrFail($id);
        $materi->idkelaskom=$request->id;
        $materi->idguru=$request->guru;
        $materi->idmateri=$request->materi;
        $materi->tgl=$request->tanggal;
        $materi->jam=$request->jam;
        $materi->persembahan=$request->persembahan;
        $materi->userupdated=$request->updated;
        $materi->save();
        return redirect('kelaskom/detail/'.$materi->idkelaskom);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Komkehadiran  $komkehadiran
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        //
        $komke = Komkehadiran::findOrFail($id);
        $komke->delete();
        return $komke;
    }
    public function detail($id)
    {
        $komkehadiran = Komkehadiran::findOrFail($id);
        $kelas = Kelaskom::where('id',$komkehadiran->idkelaskom)->first();
        return view('frontend.modul.kom.kelas.kehadiran.detail',compact('komkehadiran','kelas'));
    }
    public function absensi($id)
    {
        $komkehadiran = Komkehadiran::findOrFail($id);
        $absensi = Kehadiranabsensi::where('idkehadiran',$komkehadiran->id)->get();
        $kelas = Kelaskom::where('id',$komkehadiran->idkelaskom)->first();
        return view('frontend.modul.kom.kelas.kehadiran.absensi',compact('komkehadiran','kelas','absensi'));
    }
}
