<?php

namespace App\Http\Controllers;

use App\Tipecool;
use Illuminate\Http\Request;

class TipecoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tipecool = Tipecool::all();
        return view('frontend.masterdata.tipecool.index',compact('tipecool'));
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
        $tipecool = new Tipecool;
        $tipecool->tipecool=$request->tipecool;
        $tipecool->save();
        return redirect()->route('tipecool.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tipecool  $tipecool
     * @return \Illuminate\Http\Response
     */
    public function show(Tipecool $tipecool)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tipecool  $tipecool
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $tipecool = Tipecool::findOrFail($id);
        return view('frontend.masterdata.tipecool.edit',compact('tipecool'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tipecool  $tipecool
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $tipecool = Tipecool::findOrFail($id);
        $tipecool->tipecool=$request->tipecool;
        $tipecool->save();
        return redirect()->route('tipecool.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tipecool  $tipecool
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $tipecool = Tipecool::findOrFail($id);
        $tipecool->delete();
        return $tipecool;
    }
}
