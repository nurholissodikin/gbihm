<?php

namespace App\Http\Controllers;

use App\Anakdokumen;
use Illuminate\Http\Request;

class AnakdokumenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $dokumen = Anakdokumen::all();
        return view('frontend.modul.jemaat.anak.dokumen.index',compact('dokumen'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('frontend.modul.jemaat.anak.dokumen.create');
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
        $dokumen = new Anakdokumen;
        $dokumen->nama = $request->nama;
        if ($request->hasFile('dokumen')) {
            $person = $request->file('dokumen');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/modul/jemaat/anak/dokumen';
                $person->move($destinationPath, $filename);
                $dokumen->dokumen=$filename;
        }
        $dokumen->save();
        return redirect()->route('dokumenanak.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Anakdokumen  $anakdokumen
     * @return \Illuminate\Http\Response
     */
    public function show(Anakdokumen $anakdokumen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Anakdokumen  $anakdokumen
     * @return \Illuminate\Http\Response
     */
    public function edit(Anakdokumen $anakdokumen)
    {
        //
        $dokumen = Anakdokumen::findorFail($id);
        return view('frontend.modul.jemaat.anak.dokumen.edit',compact('dokumen'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Anakdokumen  $anakdokumen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        //
        $dokumen = Anakdokumen::findOrFail($id);
        $dokumen->nama = $request->nama;
        if ($request->hasFile('dokumen')) {
            $person = $request->file('dokumen');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/modul/jemaat/anak/dokumen';
                $person->move($destinationPath, $filename);
                $dokumen->dokumen=$filename;
        }
        $dokumen->save();
        return redirect()->route('dokumenanak.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Anakdokumen  $anakdokumen
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
         $dokumen = Anakdokumen::findorFail($id);
        $dokumen->delete();
        return $dokumen;
    }
}
