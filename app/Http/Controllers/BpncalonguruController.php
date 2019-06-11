<?php

namespace App\Http\Controllers;

use App\Bpncalonguru;
use App\Personal;
use Illuminate\Http\Request;

class BpncalonguruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $calonguru = Bpncalonguru::all();
        return view('frontend.modul.bp2n.calonguru.index',compact('calonguru'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $personal = Personal::all();
        return view('frontend.modul.bp2n.calonguru.create',compact('personal'));
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
        $calonguru = new Bpncalonguru;
        $calonguru->idpersonal=$request->personal;
        $calonguru->jenis_jabatan=$request->jenis;
        $calonguru->nosertifikat=$request->noser;
        $calonguru->angkatan=$request->angkatan;
        $calonguru->keterangan=$request->keterangan;
        $calonguru->status=$request->status;
        $calonguru->save();
        return redirect()->route('bp2ncalonguru.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bpncalonguru  $bpncalonguru
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $calonguru = Bpncalonguru::findorFail($id);
        return view('frontend.modul.bp2n.calonguru.detail',compact('calonguru'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bpncalonguru  $bpncalonguru
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
         $calonguru = Bpncalonguru::findorFail($id);
         $personal = Personal::all();
        return view('frontend.modul.bp2n.calonguru.edit',compact('personal','calonguru'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bpncalonguru  $bpncalonguru
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
        $calonguru = Bpncalonguru::findorFail($id);
        $calonguru->idpersonal=$request->personal;
        $calonguru->jenis_jabatan=$request->jenis;
        $calonguru->nosertifikat=$request->noser;
        $calonguru->angkatan=$request->angkatan;
        $calonguru->keterangan=$request->keterangan;
        $calonguru->status=$request->status;
        $calonguru->save();
        return redirect()->route('bp2ncalonguru.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bpncalonguru  $bpncalonguru
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
         $calonguru = Bpncalonguru::findorFail($id);
         $calonguru->delete();
         return $calonguru;
    }
}
