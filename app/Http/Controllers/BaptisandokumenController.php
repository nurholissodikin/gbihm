<?php

namespace App\Http\Controllers;

use App\Baptisandokumen;
use Illuminate\Http\Request;

class BaptisandokumenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $dokumen = Baptisandokumen::all();
        return view('frontend.modul.jemaat.baptisan.dokumen.index',compact('dokumen'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('frontend.modul.jemaat.baptisan.dokumen.create');
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
        $dokumen = new Baptisandokumen;
        $dokumen->nama = $request->nama;
        if ($request->hasFile('dokumen')) {
            $person = $request->file('dokumen');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/modul/jemaat/baptisan/dokumen';
                $person->move($destinationPath, $filename);
                $dokumen->dokumen=$filename;
        }
        $dokumen->save();
        return redirect()->route('dokumenbaptisan.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\baptisandokumen  $baptisandokumen
     * @return \Illuminate\Http\Response
     */
    public function show(baptisandokumen $baptisandokumen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\baptisandokumen  $baptisandokumen
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $dokumen = Baptisandokumen::findorFail($id);
        return view('frontend.modul.jemaat.baptisan.dokumen.edit',compact('dokumen'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\baptisandokumen  $baptisandokumen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
        $dokumen = Baptisandokumen::findOrFail($id);
        $dokumen->nama = $request->nama;
        if ($request->hasFile('dokumen')) {
            $person = $request->file('dokumen');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/modul/jemaat/baptisan//dokumen';
                $person->move($destinationPath, $filename);
                $dokumen->dokumen=$filename;
        }
        $dokumen->save();
        return redirect()->route('dokumenbaptisan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\baptisandokumen  $baptisandokumen
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $dokumen = Baptisandokumen::findorFail($id);
        $dokumen->delete();
        return $dokumen;
    }
}
