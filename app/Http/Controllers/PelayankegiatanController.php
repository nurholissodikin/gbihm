<?php

namespace App\Http\Controllers;

use App\Pelayankegiatan;
use Illuminate\Http\Request;

class PelayankegiatanController extends Controller
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
        $kegiatan = new Pelayankegiatan;
        $kegiatan->idkegiatan=$request->idkegiatan;
        $kegiatan->idpersonal=$request->idjabpel;
        $kegiatan->melayani=$request->melayani;
        $kegiatan->hadir=$request->hadir;
        $kegiatan->save();
        return redirect('kegiatan/pelayan/'.$request->idkegiatan);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pelayankegiatan  $pelayankegiatan
     * @return \Illuminate\Http\Response
     */
    public function show(Pelayankegiatan $pelayankegiatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pelayankegiatan  $pelayankegiatan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pelayankegiatan $pelayankegiatan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pelayankegiatan  $pelayankegiatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $kegiatan = Pelayankegiatan::findOrFail($id);
        $kegiatan->idkegiatan=$request->idkegiatan;
        $kegiatan->idpersonal=$request->idpersonal;
        $kegiatan->melayani=$request->melayani;
        $kegiatan->hadir=$request->hadir;
        $kegiatan->alasan=$request->alasan;
        $kegiatan->save();
        return redirect('personal/detail/'.$request->idpersonal);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pelayankegiatan  $pelayankegiatan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $kegiatan = Pelayankegiatan::findOrFail($id);
        $kegiatan->delete();
        return $kegiatan;
    }
    public function add_personal_kegiatan(Request $request){
        $kegiatan = new Pelayankegiatan;
        $kegiatan->idkegiatan=$request->idkegiatan;
        $kegiatan->idpersonal=$request->idpersonal;
        $kegiatan->melayani=$request->melayani;
        $kegiatan->hadir=$request->hadir;
        $kegiatan->save();
        return redirect('personal/detail/'.$request->idpersonal);
    }
    public function ibadahraya_store(Request $request)
    {
        //
        $kegiatan = new Pelayankegiatan;
        $kegiatan->idkegiatan=$request->idkegiatan;
        $kegiatan->idpersonal=$request->idjabpel;
        $kegiatan->melayani=$request->melayani;
        $kegiatan->hadir=$request->hadir;
        $kegiatan->save();
        return redirect('modul/ibadahraya/pelayan/'.$request->idkegiatan);
    }
}
