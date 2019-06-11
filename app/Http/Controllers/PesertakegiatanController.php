<?php

namespace App\Http\Controllers;

use App\Pesertakegiatan;
use Illuminate\Http\Request;

class PesertakegiatanController extends Controller
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
        $kegiatan = new Pesertakegiatan ;
        $kegiatan->idkegiatan=$request->idkegiatan;
        $kegiatan->idpeserta=$request->idpeserta;
        $kegiatan->hadir=$request->hadir;
        $kegiatan->alasan=$request->alasan;
        $kegiatan->save();
        return redirect('kegiatan/peserta/'.$request->idkegiatan);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pesertakegiatan  $pesertakegiatan
     * @return \Illuminate\Http\Response
     */
    public function show(Pesertakegiatan $pesertakegiatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pesertakegiatan  $pesertakegiatan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pesertakegiatan $pesertakegiatan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pesertakegiatan  $pesertakegiatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pesertakegiatan $pesertakegiatan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pesertakegiatan  $pesertakegiatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pesertakegiatan $pesertakegiatan)
    {
        //
    }
}
