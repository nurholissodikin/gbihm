<?php

namespace App\Http\Controllers;

use App\Komtugas;
use App\Rayon;
use Illuminate\Http\Request;

class KomtugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tugas = Komtugas::all();
        return view('frontend.modul.kom.kelas.tugas.index',compact('tugas'));
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
        return view('frontend.modul.kom.kelas.tugas.create',compact('rayon'));
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
        $tugas = new Komtugas;
        $tugas->idkelaskom=$request->id;
        $tugas->idmurid=$request->idmurid;
        $tugas->tugas=$request->tugas;
        $tugas->usercreated=$request->created;
        $tugas->save();
        return redirect('tugas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Komtugas  $komtugas
     * @return \Illuminate\Http\Response
     */
    public function show(Komtugas $komtugas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Komtugas  $komtugas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $tugas = Komtugas::findOrFail($id);
        $rayon = Rayon::all();
        return view('frontend.modul.kom.kelas.tugas.edit',compact('rayon','tugas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Komtugas  $komtugas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        //
        $tugas = Komtugas::findOrFail($id);
        $tugas->idkelaskom=$request->id;
        $tugas->idmurid=$request->idmurid;
        $tugas->tugas=$request->tugas;
        $tugas->userupdated=$request->updated;
        $tugas->save();
        return redirect()->route('tugas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Komtugas  $komtugas
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        //
        $tugas = Komtugas::findOrFail($id);
        $tugas->delete();
        return $tugas;
    }
}
