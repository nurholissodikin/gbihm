<?php

namespace App\Http\Controllers;

use App\Diserahkan;
use Illuminate\Http\Request;

class DiserahkanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $last_pen = Diserahkan::orderBy('iddiserahkan','DESC')->first();
        $id = ($last_pen != null) ? $last_pen->iddiserahkan+1: '1';
        $diserahkan = new Diserahkan;
        $diserahkan->iddiserahkan=$id;
        $diserahkan->idpersonal=$request->idper;
        $diserahkan->idcabangranting=$request->cabang;
        $diserahkan->idpelayan=$request->pelayan;
        $diserahkan->noakta=$request->noakta;
        $diserahkan->tanggal=$request->tanggal;
       if ($request->hasFile('dokumen')) {
            $person = $request->file('dokumen');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/diserahkan';
                $person->move($destinationPath, $filename);
                $diserahkan->dokumen=$filename;
        }
        $diserahkan->save();
        return $diserahkan;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Diserahkan  $diserahkan
     * @return \Illuminate\Http\Response
     */
    public function show(Diserahkan $diserahkan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Diserahkan  $diserahkan
     * @return \Illuminate\Http\Response
     */
    public function edit($iddiserahkan)
    {
        //
         $diserahkan = Diserahkan::findOrFail($iddiserahkan);
         return $diserahkan;    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Diserahkan  $diserahkan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$iddiserahkan)
    {
        //
        $diserahkan = Diserahkan::findOrFail($iddiserahkan);
        $diserahkan->idpersonal=$request->idper;
        $diserahkan->idcabangranting=$request->cabang;
        $diserahkan->idpelayan=$request->pelayan;
        $diserahkan->noakta=$request->noakta;
        $diserahkan->tanggal=$request->tanggal;
        if ($request->hasFile('dokumen')) {
            $person = $request->file('dokumen');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/jemaat/diserahkan';
                $person->move($destinationPath, $filename);
                $diserahkan->dokumen=$filename;
        }
        $diserahkan->save();
        return $diserahkan;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Diserahkan  $diserahkan
     * @return \Illuminate\Http\Response
     */
    public function destroy($iddiserahkan)
    {
        //
        $diserahkan = Diserahkan::findOrFail($iddiserahkan);
        $diserahkan->delete();
        return $diserahkan;
    }
}
