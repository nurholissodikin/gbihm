<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JabatanGembalaCool;
class JabatangembalaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $jabatan = JabatanGembalaCool::all();
        return view('frontend.masterdata.jabatangembalacool.index',compact('jabatan'));
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
        $jabatan = new JabatanGembalaCool;
        $jabatan->kode_jabatan=$request->kode;
        $jabatan->jabatan_gembala=$request->jabatan;
        $jabatan->usercreated=$request->created;
        $jabatan->save();
        return redirect()->route('jabatangembalacool.index');
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
        $jabatan = JabatanGembalaCool::findOrFail($id);
        return view('frontend.masterdata.jabatangembalacool.edit',compact('jabatan'));
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
        $jabatan = JabatanGembalaCool::findOrFail($id);
        $jabatan->kode_jabatan=$request->kode;
        $jabatan->jabatan_gembala=$request->jabatan;
        $jabatan->userupdated=$request->updated;
        $jabatan->save();
        return redirect()->route('jabatangembalacool.index');
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
        $jabatan = JabatanGembalaCool::findOrFail($id);
        $jabatan->delete();
        return $jabatan;
    }
}
