<?php

namespace App\Http\Controllers;

use App\Materi;
use App\Guru;
use App\Materiguru;
use App\Vmateriguru;
use Illuminate\Http\Request;

class MateriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $materi = Materi::all();
        return view('frontend.modul.kom.materi.index',compact('materi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view ('frontend.modul.kom.materi.create');
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
        $materi = new Materi;
        $materi->kode_materi=$request->kode;
        $materi->materi=$request->materi;
        $materi->kom_seri=$request->kom;
        $materi->pengajar=$request->pengajar;
        $materi->active=$request->status;
        $materi->usercreated=$request->created;
        $materi->save();
        return redirect()->route('materi.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Materi  $materi
     * @return \Illuminate\Http\Response
     */
    public function show(Materi $materi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Materi  $materi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $materi = Materi::findOrFail($id);
        return view ('frontend.modul.kom.materi.edit',compact('materi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Materi  $materi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
        $materi = Materi::findOrFail($id);
        $materi->kode_materi=$request->kode;
        $materi->materi=$request->materi;
        $materi->kom_seri=$request->kom;
        $materi->pengajar=$request->pengajar;
        $materi->active=$request->status;
        $materi->userupdated=$request->updated;

        $materi->save();
        return redirect()->route('materi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Materi  $materi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $materi = Materi::findOrFail($id);
        $materi->delete();
        return $materi;
    }
    public function guru($id)
    {
        $materi = Materi::findOrFail($id);
        $materiguru = Materiguru::where('idmateri',$id)->get();
        $guru = Guru::all();
        return view('frontend.modul.kom.materi.guru.index',compact('materi','guru','materiguru'));
    }
    public function guru_store(Request $request)
    {
        $materiguru = new Materiguru;
        $materiguru->idmateri=$request->idmateri;
        $materiguru->idguru=$request->guru;
        $materiguru->usercreated=$request->created;
        $materiguru->save();
        return redirect('materi/pengajar/'.$materiguru->idmateri);
    }

    public function guru_edit($id)
    {
      
        $materiguru = Materiguru::findOrFail($id);
        $guru = Guru::all();
        return view('frontend.modul.kom.materi.guru.edit',compact('guru','materiguru'));
    }
    public function guru_update(Request $request,$id)
    {
        $materiguru = Materiguru::findOrFail($id);
        $materiguru->idmateri=$request->idmateri;
        $materiguru->idguru=$request->guru;
        $materiguru->userupdated=$request->updated;
        $materiguru->save();
        return redirect('materi/pengajar/'.$materiguru->idmateri);
    }

    public function guru_destroy($id)
    {
        $materiguru = Materiguru::findOrFail($id);
        $materiguru->delete();
        return $materiguru;
    }
}
