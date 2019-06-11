<?php

namespace App\Http\Controllers;

use App\Personal;
use App\Bpnguru;
use Illuminate\Http\Request;

class BpnguruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $guru = Bpnguru::all();
        return view('frontend.modul.bp2n.guru.index',compact('guru'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $personal = Personal::all();
        return view('frontend.modul.bp2n.guru.create',compact('personal'));
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
        $guru = new Bpnguru;
        $guru->idpersonal=$request->personal;
        $guru->jenis_jabatan=$request->jenis;
        $guru->nosertifikat=$request->noser;
        $guru->angkatan=$request->angkatan;
        $guru->keterangan=$request->keterangan;
        $guru->status=$request->status;
        $guru->save();
        return redirect()->route('bp2nguru.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bpnguru  $bpnguru
     * @return \Illuminate\Http\Response
     */
    public function show(Bpnguru $bpnguru)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bpnguru  $bpnguru
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $guru = Bpnguru::findorFail($id);
        $personal = Personal::all();
        return view('frontend.modul.bp2n.guru.edit',compact('personal','guru'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bpnguru  $bpnguru
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $guru = new findorFail($id);
        $guru->idpersonal=$request->personal;
        $guru->jenis_jabatan=$request->jenis;
        $guru->nosertifikat=$request->noser;
        $guru->angkatan=$request->angkatan;
        $guru->keterangan=$request->keterangan;
        $guru->status=$request->status;
        $guru->save();
        return redirect()->route('bp2nguru.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bpnguru  $bpnguru
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bpnguru $bpnguru)
    {
        //
         $guru = new findorFail($id);
         $guru->delete();
         return $guru;
    }
}
