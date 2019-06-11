<?php

namespace App\Http\Controllers;

use App\Komlkp;
use App\Rayon;
use App\Kelaskom;
use App\Materi;
use Illuminate\Http\Request;

class KomlkpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $komlkp = Komlkp::all();
        return view('frontend.modul.kom.kelas.lkp.index',compact('komlkp'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $rayon = Rayon::all();
        return view('frontend.modul.kom.kelas.lkp.create',compact('rayon'));
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
        $komlkp = new Komlkp;
        $komlkp->idkelaskom=$request->id;
        $komlkp->idmateri=$request->materi;
        $komlkp->tanggal=$request->tanggal;
        $komlkp->usercreated = $request->created;
        $komlkp->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Komlkp  $komlkp
     * @return \Illuminate\Http\Response
     */
    public function show(Komlkp $komlkp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Komlkp  $komlkp
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $komlkp = Komlkp::findOrFail($id);
        $materi = Materi::all();
        return view('frontend.modul.kom.kelas.lkp.edit',compact('materi','komlkp'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Komlkp  $komlkp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
        $komlkp = Komlkp::findOrFail($id);
       $komlkp->idkelaskom=$request->id;
        $komlkp->idmateri=$request->materi;
        $komlkp->tanggal=$request->tanggal;
        $komlkp->userupdated = $request->updated;
        $komlkp->save();
        return redirect('kelaskom/detail/'.$komlkp->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Komlkp  $komlkp
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $komlkp = Komlkp::findOrFail($id);
        $komlkp->delete();
        return $komlkp;
    }
    public function detail($id)
     {
        $komlkp = Komlkp::findorFail($id);
        $kelas = Kelaskom::where('id',$komlkp->idkelaskom)->first();
        return view ('frontend.modul.kom.kelas.lkp.detail',compact('kelas','komlkp')); 
     }
    public function absensi($id)
    {
        $komlkp = Komlkp::findOrFail($id);
        $absensi = Kehadiranabsensi::where('idkehadiran',$komlkp->id)->get();
        $kelas = Kelaskom::where('id',$komlkp->idkelaskom)->first();
        return view('frontend.modul.kom.kelas.kehadiran.absensi',compact('komlkp','kelas','absensi'));
    }
}
