<?php

namespace App\Http\Controllers;

use App\Nikahdokumen;
use Illuminate\Http\Request;

class NikahdokumenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $dokumen = Nikahdokumen::all();
        return view('frontend.modul.jemaat.pernikahan.dokumen.index',compact('dokumen'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('frontend.modul.jemaat.pernikahan.dokumen.create');
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
        $dokumen = new Nikahdokumen;
        $dokumen->nama = $request->nama;
        if ($request->hasFile('dokumen')) {
            $person = $request->file('dokumen');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/modul/jemaat/pernikahan/dokumen';
                $person->move($destinationPath, $filename);
                $dokumen->dokumen=$filename;
        }
        $dokumen->save();
        return redirect()->route('dokumenpernikahan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Nikahdokumen  $nikahdokumen
     * @return \Illuminate\Http\Response
     */
    public function show(Nikahdokumen $nikahdokumen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Nikahdokumen  $nikahdokumen
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $dokumen = Nikahdokumen::findorFail($id);
        return view('frontend.modul.jemaat.pernikahan.dokumen.edit',compact('dokumen'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Nikahdokumen  $nikahdokumen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
        $dokumen = Nikahdokumen::findOrFail($id);
        $dokumen->nama = $request->nama;
        if ($request->hasFile('dokumen')) {
            $person = $request->file('dokumen');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/modul/jemaat/pernikahan/dokumen';
                $person->move($destinationPath, $filename);
                $dokumen->dokumen=$filename;
        }
        $dokumen->save();
        return redirect()->route('dokumenpernikahan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Nikahdokumen  $nikahdokumen
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
         $dokumen = Nikahdokumen::findorFail($id);
        $dokumen->delete();
        return $dokumen;
    }
}
