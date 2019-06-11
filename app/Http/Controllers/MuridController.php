<?php

namespace App\Http\Controllers;

use App\Murid;
use App\Kkmta;
use App\Personal;
use Illuminate\Http\Request;

class MuridController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $murid = Murid::all();
        return view('frontend.modul.kom.murid.index',compact('murid'));
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
        $kkmta = Kkmta::all();
        return view('frontend.modul.kom.murid.create',compact('personal','kkmta'));
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
        $murid = new Murid;
        $murid->idpersonal=$request->idpersonal;
        $murid->kategori_peserta=$request->kategori;
        $murid->angkatan=$request->angkatan;
        $murid->idkkmta=$request->idkkmta;
        
        $murid->save();
        return redirect()->route('murid.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Murid  $murid
     * @return \Illuminate\Http\Response
     */
    public function show(Murid $murid)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Murid  $murid
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
         $murid = Murid::findOrFail($id);
         $personal = Personal::all();
        $kkmta = Kkmta::all();
        return view('frontend.modul.kom.murid.edit',compact('personal','kkmta','murid'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Murid  $murid
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $murid = Murid::findOrFail($id);
        $murid->idpersonal=$request->idpersonal;
        $murid->kategori_peserta=$request->kategori;
        $murid->angkatan=$request->angkatan;
        $murid->idkkmta=$request->idkkmta;
        $murid->save();
        return redirect()->route('murid.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Murid  $murid
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $murid = Murid::findOrFail($id);
        $murid->delete();
        return $murid;
    }
}
