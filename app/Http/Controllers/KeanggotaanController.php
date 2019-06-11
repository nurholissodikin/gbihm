<?php

namespace App\Http\Controllers;

use App\Keanggotaan;
use Illuminate\Http\Request;
use App\Rayon;
use App\Personal;
use App\Kompetensi;
use App\Cabang;

class KeanggotaanController extends Controller
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
    public function create($idpersonal)
    {
        //
        $personal= Personal::findOrFail($idpersonal);
        $rayon= Rayon::all();
        $kompetensi= Kompetensi::all();
        return view('frontend.keanggotaan.create',compact('rayon','personal','kompetensi'));
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
        $personal = Personal::find($request->idpersonal);
        $personal->gerejaasal = $request->gereja;
        $personal->mulaiberjemaat = $request->berjemaat;
        $personal->save();

        $last_pen = Keanggotaan::orderBy('idkeanggotaan','DESC')->first();
        $id = ($last_pen != null) ? $last_pen->idkeanggotaan+1: '1';
        $keanggotaan = new Keanggotaan;
        $keanggotaan->idkeanggotaan=$id;
        $keanggotaan->idpersonal=$request->idpersonal;
        $keanggotaan->idkompetensi=$request->kompetensi;
        $keanggotaan->idcabangranting=$request->cabang;
        $keanggotaan->idrayon=$request->rayon;
        $keanggotaan->idsubrayon=$request->subrayon;
        $keanggotaan->statuskeanggotaan=$request->stke;
        $keanggotaan->tglregistrasipindah=$request->tala;
        $keanggotaan->alasanpindah=$request->alasan;
        if ($request->hasFile('dokke')) {
            $person = $request->file('dokke');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/keanggotaan/dokumen';
                $person->move($destinationPath, $filename);
                $keanggotaan->dokumen=$filename;
        }
        $keanggotaan->save();
         return redirect('/personal/detail/'.$request->idpersonal);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Keanggotaan  $keanggotaan
     * @return \Illuminate\Http\Response
     */
    public function show(Keanggotaan $keanggotaan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Keanggotaan  $keanggotaan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $rayon= Rayon::all();
        $kompetensi= Kompetensi::all();
        $keanggotaan = Keanggotaan::findOrFail($id);
        $cabang= Cabang::all();

      return view('frontend.keanggotaan.edit',compact('rayon','keanggotaan','kompetensi','cabang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Keanggotaan  $keanggotaan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $keanggotaan = Keanggotaan::findOrFail($id);
        $keanggotaan->idpersonal=$request->idpersonal;
        $keanggotaan->idkompetensi=$request->kompetensi;
        $keanggotaan->idcabangranting=$request->cabang;
        $keanggotaan->idrayon=$request->rayon;
        $keanggotaan->idsubrayon=$request->subrayon;
        $keanggotaan->statuskeanggotaan=$request->stke;
        $keanggotaan->tglregistrasipindah=$request->tala;
        $keanggotaan->alasanpindah=$request->alasan;
        if ($request->hasFile('dokke')) {
            $person = $request->file('dokke');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/keanggotaan/dokumen';
                $person->move($destinationPath, $filename);
                $keanggotaan->dokumen=$filename;
        }
        $keanggotaan->save();
         return redirect('/personal/detail/'.$request->idpersonal);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Keanggotaan  $keanggotaan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Keanggotaan $keanggotaan)
    {
        //
    }
    public function mutasi($idpersonal){
        $personal= Personal::findOrFail($idpersonal);
        $rayon= Rayon::all();
        $kompetensi= Kompetensi::all();
        return view('frontend.keanggotaan.mutasi',compact('rayon','personal','kompetensi'));
    }
}
