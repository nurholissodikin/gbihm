<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profesi;
use DB;
use Excel;

class ProfesiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $profesi = Profesi::all();
        return view('frontend.masterdata.profesi.index',compact('profesi'));
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
        $last_dok = Profesi::orderBy('idprofesi','DESC')->first();
        $idd = ($last_dok != null) ? $last_dok->idprofesi+1: '1';
        $profesi = new Profesi;
        $profesi->idprofesi=$idd;
        $profesi->profesi=$request->nama;
        $profesi->active=$request->status;
        $profesi->save();
       return redirect()->route('profesi.index');
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
        $profesi = Profesi::findOrFail($id);
       
        return view('frontend.masterdata.profesi.edit',compact('profesi'));
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
         $profesi = Profesi::findOrFail($id);
        $profesi->profesi=$request->nama;
        $profesi->active=$request->status;
        $profesi->save();
        return redirect()->route('profesi.index');
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
        $profesi = Profesi::findOrFail($id);
        $profesi->delete();
        return $profesi;
    }

    



}
