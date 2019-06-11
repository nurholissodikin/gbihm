<?php

namespace App\Http\Controllers;

use App\Kommagang;
use App\Rayon;
use Illuminate\Http\Request;

class KommagangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $magang = Kommagang::all();
        return view('frontend.modul.kom.kelas.magang.index',compact('magang'));
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
        return view('frontend.modul.kom.kelas.magang.create',compact('rayon'));
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
        $magang = new Kommagang;
        $magang->idrayon=$request->rayon;
        $magang->kom_seri=$request->kom;
        $magang->angkatan=$request->angkatan;
        $magang->tanggal=$request->tanggal;
        $magang->save();
        return redirect()->route('magang.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kommagang  $kommagang
     * @return \Illuminate\Http\Response
     */
    public function show(Kommagang $kommagang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kommagang  $kommagang
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        //
        $magang = Kommagang::findOrFail($id);
        $rayon = Rayon::all();
        return view('frontend.modul.kom.kelas.magang.edit',compact('rayon','magang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kommagang  $kommagang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        //
        $magang = Kommagang::findOrFail($id);
        $magang->idrayon=$request->rayon;
        $magang->kom_seri=$request->kom;
        $magang->angkatan=$request->angkatan;
        $magang->tanggal=$request->tanggal;
        $magang->save();
        return redirect()->route('magang.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kommagang  $kommagang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $magang = Kommagang::findOrFail($id);
        $magang->delete();
        return $magang;
    }
}
