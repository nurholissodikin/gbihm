<?php

namespace App\Http\Controllers;

use App\Guru;
use App\Personal;
use App\Rayon;
use App\Materiguru;
use App\Materi;

use Illuminate\Http\Request;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $guru = Guru::all();
        $personal = Personal::all();
        $rayon = Rayon::all();
        return view('frontend.modul.kom.guru.index',compact('guru','personal','rayon'));
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
        return view('frontend.modul.kom.guru.create',compact('personal'));
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
        $guru = new Guru;
        if ($request->status == 'Pengerja') {
           $a = "Pengerja";
        }else{
            $a = "Personal";
        }
        $guru->idpersonal=$request->idpersonal;
        $guru->status=$a;
        $guru->idrayon=$request->idrayon;
        $guru->usercreated=$request->created;

        $guru->save();
        return redirect()->route('guru.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $guru = Guru::findOrFail($id);
        $personal = Personal::all();
        return view('frontend.modul.kom.guru.detail',compact('personal','guru'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $guru = Guru::findOrFail($id);
        $personal = Personal::all();
        $rayon = Rayon::all();
        return view('frontend.modul.kom.guru.edit',compact('personal','guru','rayon'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
       if ($request == 'Pengerja') {
        $a= "Pengerja";
           # code...
       }else {
           $a="Personal";
       }
        $guru = Guru::findOrFail($id);
        $guru->idpersonal=$request->idpersonal;
        $guru->status=$a;
        $guru->idrayon=$request->idrayon;
        $guru->userupdated=$request->updated;
        $guru->save();
        return redirect()->route('guru.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function destroy(Guru $guru)
    {
        //
    }

    public function add_materi($id)
    {
        $guru = Guru::findOrFail($id);
        $materiguru = Materiguru::where('idguru',$id)->get();
        $materi = Materi::all();
        return view('frontend.modul.kom.guru.materi.index',compact('guru','materiguru','materi'));
    }
    public function store_materi(Request $request)
    {
        $materiguru = new Materiguru;
        $materiguru->idguru=$request->idguru;
        $materiguru->idmateri=$request->materi;
        $materiguru->usercreated=$request->created;
        $materiguru->save();
        return redirect('guru/materi/'.$materiguru->idguru);
    }
    public function edit_materi($id)
    {
        $guru = Guru::all();
        $materiguru = Materiguru::findOrFail($id);
        $materi = Materi::all();
        return view('frontend.modul.kom.guru.materi.edit',compact('guru','materiguru','materi'));
    }
    public function update_materi(Request $request)
    {
        $materiguru = Materiguru::findOrFail($id);
        $materiguru->idguru=$request->idguru;
        $materiguru->idmateri=$request->materi;
        $materiguru->usercreated=$request->created;
        $materiguru->save();
        return redirect('guru/materi/'.$materiguru->idguru);
    }
}
