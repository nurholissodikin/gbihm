<?php

namespace App\Http\Controllers;

use App\Komseri;
use Illuminate\Http\Request;

class KomseriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $komseri = Komseri::all();
        return view('frontend.masterdata.komseri.index',compact('komseri'));
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
    
        $komseri = new Komseri;
        $komseri->kom_seri=$request->komseri;
        $komseri->usercreated=$request->created;
        $komseri->save();
        return redirect()->route('komseri.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Komseri  $komseri
     * @return \Illuminate\Http\Response
     */
    public function show(Komseri $komseri)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Komseri  $komseri
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
         $komseri = Komseri::findorFail($id);
         return view('frontend.masterdata.komseri.edit',compact('komseri'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Komseri  $komseri
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $komseri = Komseri::findorFail($id);
        $komseri->kom_seri=$request->komseri;
        $komseri->userupdated=$request->updated;
        $komseri->save();
        return redirect()->route('komseri.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Komseri  $komseri
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $komseri = Komseri::findorFail($id);
        $komseri->delete();
        return $komseril;

    }
}
