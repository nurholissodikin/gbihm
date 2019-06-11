<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jenispekerjaan;

class JenispekerjaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $jp = Jenispekerjaan::all();
        return view('frontend.masterdata.jenispekerjaan.index',compact('jp'));
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
        $last_dok = Jenispekerjaan::orderBy('idjenispekerjaan','DESC')->first();
        $idd = ($last_dok != null) ? $last_dok->idjenispekerjaan+1: '1';
        $jenispekerjaan = new Jenispekerjaan;
        $jenispekerjaan->idjenispekerjaan=$idd;
        $jenispekerjaan->jenispekerjaan=$request->nama;
        $jenispekerjaan->active=$request->status;
        $jenispekerjaan->save();
        return redirect()->route('jenispekerjaan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $jenispekerjaan = Jenispekerjaan::findOrFail($id);
       
        return view('frontend.masterdata.jenispekerjaan.edit',compact('jenispekerjaan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $jenispekerjaan = Jenispekerjaan::findOrFail($id);
        $jenispekerjaan->jenispekerjaan=$request->nama;
        $jenispekerjaan->active=$request->status;
        $jenispekerjaan->save();
        return redirect()->route('jenispekerjaan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
         $jenispekerjaan = Jenispekerjaan::findOrFail($id);
        $jenispekerjaan->delete();
        return $jenispekerjaan;
    }
}
