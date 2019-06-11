<?php

namespace App\Http\Controllers;

use App\Kkmta;
use App\Rayon;
use Illuminate\Http\Request;

class KkmtaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $kkmta = Kkmta::all();
        return view('frontend.modul.kom.murid.kelas.index',compact('kkmta'));
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
        return view ('frontend.modul.kom.murid.kelas.create',compact('rayon'));
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
        $materi = new Kkmta;
        $materi->idkelaskom=$request->id;
        $materi->idmurid=$request->idmurid;
        $materi->makalah=$request->makalah;
        $materi->usercreated=$request->created;
        $materi->save();
        return redirect()->route('kkmta.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kkmta  $kkmta
     * @return \Illuminate\Http\Response
     */
    public function show(Kkmta $kkmta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kkmta  $kkmta
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $rayon = Rayon::all();
        $kkmta = Kkmta::findOrFail($id);
        return view('frontend.modul.kom.murid.kelas.edit',compact('kkmta','rayon'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kkmta  $kkmta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $materi = Kkmta::findOrFail($id);
        $materi->idkelaskom=$request->id;
        $materi->idmurid=$request->idmurid;
        $materi->makalah=$request->makalah;
        $materi->usercreated=$request->created;
        $materi->save();
        return redirect()->route('kkmta.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kkmta  $kkmta
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $kkmta = Kkmta::findOrFail($id);
        $kkmta->delete();
        return $kkmta;
    }
}
