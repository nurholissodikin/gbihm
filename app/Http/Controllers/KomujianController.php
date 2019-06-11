<?php

namespace App\Http\Controllers;

use App\Komujian;
use App\Rayon;
use Illuminate\Http\Request;

class KomujianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $komujian = Komujian::all();
        return view('frontend.modul.kom.kelas.ujian.index',compact('komujian'));
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
        return view('frontend.modul.kom.kelas.ujian.create',compact('rayon'));
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
        $komujian = new komujian;
        $komujian->idkelaskom=$request->id;
        $komujian->tanggal=$request->tanggal;
        $komujian->nilai=$request->nilai;
        $komujian->idmurid=$request->idmurid;
        $komujian->usercreated=$request->created;
        $komujian->save();
        return redirect()->route('komujian.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Komujian  $komujian
     * @return \Illuminate\Http\Response
     */
    public function show(Komujian $komujian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Komujian  $komujian
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $komujian = Komujian::findOrFail($id);
        $rayon = Rayon::all();
        return view('frontend.modul.kom.kelas.ujian.edit',compact('rayon','komujian'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Komujian  $komujian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $komujian = Komujian::findOrFail($id);
        $komujian->idkelaskom=$request->id;
        $komujian->tanggal=$request->tanggal;
        $komujian->nilai=$request->nilai;
        $komujian->idmurid=$request->idmurid;
        $komujian->userupdated=$request->updated;
        $komujian->save();
        return redirect()->route('komujian.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Komujian  $komujian
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
         $komujian = Komujian::findOrFail($id);
         $komujian->delete();
         return $komujian;
    }
}
