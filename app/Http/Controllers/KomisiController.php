<?php

namespace App\Http\Controllers;

use App\Komisi;
use Illuminate\Http\Request;

class KomisiController extends Controller
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
        $komisi = new Komisi;
        $komisi->idpersonal=$request->idper;
        $komisi->idrayon=$request->rayon;
        $komisi->idsubrayon=$request->subrayon;
        $komisi->idcabangranting=$request->cabang;
        $komisi->komisi=$request->komisi;
        $komisi->save();
        return $komisi;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Komisi  $komisi
     * @return \Illuminate\Http\Response
     */
    public function show(Komisi $komisi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Komisi  $komisi
     * @return \Illuminate\Http\Response
     */
    public function edit(Komisi $komisi)
    {
        //

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Komisi  $komisi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
        $komisi = Komisi::findOrFail($id);
        $komisi->idrayon=$request->rayon;
        $komisi->idsubrayon=$request->subrayon;
        $komisi->idcabangranting=$request->cabang;
        $komisi->komisi=$request->komisi;
        $komisi->save();
        return $komisi;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Komisi  $komisi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $komisi = Komisi::findOrFail($id);
        $komisi->delete();
        return $komisi;
    }

    public function storea(Request $request)
    {
        //
        $komisi = new Komisi;
        $komisi->idpersonal=$request->idpersonal;
        $komisi->idrayon=$request->rayon;
        $komisi->idsubrayon=$request->subrayon;
        $komisi->idcabangranting=$request->cabang;
        $komisi->komisi=$request->komisi;
        $komisi->save();
        return redirect('/personal/detail/'.$request->idpersonal);
    }
}
