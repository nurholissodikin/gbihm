<?php

namespace App\Http\Controllers;

use App\Bpnmateri;
use Illuminate\Http\Request;

class BpnmateriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $materi = Bpnmateri::all();
        return view('frontend.modul.bp2n.materi.index',compact('materi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('frontend.modul.bp2n.materi.create');
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
        $materi = new Bpnmateri;
        $materi->kode_materi=$request->materi;
        $materi->materi=$request->materi;
        $materi->modul=$request->modul;
        $materi->kategori=$request->kategori;
        $materi->active=$request->status;
        $materi->save();
        return redirect()->route('bp2nmateri.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bpnmateri  $bpnmateri
     * @return \Illuminate\Http\Response
     */
    public function show(Bpnmateri $bpnmateri)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bpnmateri  $bpnmateri
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $materi = Bpnmateri::findorFail($id);
        return view('frontend.modul.bp2n.materi.edit',compact('materi'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bpnmateri  $bpnmateri
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
         $materi = Bpnmateri::findorFail($id);
        $materi->kode_materi=$request->materi;
        $materi->materi=$request->materi;
        $materi->modul=$request->modul;
        $materi->kategori=$request->kategori;
        $materi->active=$request->status;
        $materi->save();
        return redirect()->route('bp2nmateri.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bpnmateri  $bpnmateri
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $materi = Bpnmateri::findorFail($id);
        $materi->delete();
        return $materi;
    }
}
