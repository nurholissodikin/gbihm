<?php

namespace App\Http\Controllers;

use App\Peneguhandokumen;
use Illuminate\Http\Request;

class PeneguhandokumenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $dokumen = Peneguhandokumen::all();
        return view('frontend.modul.jemaat.peneguhan.dokumen.index',compact('dokumen'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         return view('frontend.modul.jemaat.peneguhan.dokumen.create');
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
        $dokumen = new Peneguhandokumen;
        $dokumen->nama = $request->nama;
        if ($request->hasFile('dokumen')) {
            $person = $request->file('dokumen');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/modul/jemaat/peneguhan/dokumen';
                $person->move($destinationPath, $filename);
                $dokumen->dokumen=$filename;
        }
        $dokumen->save();
        return redirect()->route('dokumenpeneguhan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Peneguhandokumen  $peneguhandokumen
     * @return \Illuminate\Http\Response
     */
    public function show(Peneguhandokumen $peneguhandokumen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Peneguhandokumen  $peneguhandokumen
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $dokumen = Peneguhandokumen::findorFail($id);
        return view('frontend.modul.jemaat.peneguhan.dokumen.edit',compact('dokumen'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Peneguhandokumen  $peneguhandokumen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
        $dokumen = Peneguhandokumen::findOrFail($id);
        $dokumen->nama = $request->nama;
        if ($request->hasFile('dokumen')) {
            $person = $request->file('dokumen');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/modul/jemaat/peneguhan/dokumen';
                $person->move($destinationPath, $filename);
                $dokumen->dokumen=$filename;
        }
        $dokumen->save();
        return redirect()->route('dokumenpeneguhan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Peneguhandokumen  $peneguhandokumen
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $dokumen = Peneguhandokumen::findorFail($id);
        $dokumen->delete();
        return $dokumen;
    }
}
