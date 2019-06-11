<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kelaskom;
use App\Rayon;
use App\Komkehadiran;
use App\Komujian;
use App\Kommagang;
use App\Komlkp;
Use App\Guru;
use App\Kkmta;
use App\Komtugas;
use App\Murid;
use App\Materi;
use App\Personal;

class KelaskomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $kelas = Kelaskom::all();
        return view('frontend.modul.kom.kelas.index',compact('kelas'));
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
        return view('frontend.modul.kom.kelas.create',compact('rayon'));
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
        $kelas = new Kelaskom;
        $kelas->idrayon=$request->rayon;
        $kelas->kom_seri=$request->kom_seri;
        $kelas->angkatan=$request->angkatan;
        $kelas->tgl_mulai=$request->tgl_mulai;
        $kelas->periode_m=$request->mulai;
        $kelas->periode=$request->akhir;
        $kelas->usercreated=$request->created;
        $kelas->save();
        return redirect()->route('kelaskom.index');
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
        $kelas = Kelaskom::findorFail($id);
        $rayon = Rayon::all();
        return view('frontend.modul.kom.kelas.edit',compact('rayon','kelas'));
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
        $kelas = Kelaskom::findorFail($id);
        $kelas->idrayon=$request->rayon;
        $kelas->kom_seri=$request->kom_seri;
        $kelas->angkatan=$request->angkatan;
        $kelas->tgl_mulai=$request->tgl_mulai;
        $kelas->periode_m=$request->mulai;
        $kelas->periode=$request->akhir;
        $kelas->userupdated=$request->updated;
        $kelas->save();
        return redirect()->route('kelaskom.index');
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
        $kelas = Kelaskom::findorFail($id);
        $kelas->delete();
        return $kelas;
    }
    public function murid($id_kelas)
    {
        $kelas = Kelaskom::findorFail($id_kelas);
        $murid = Murid::where('idkelaskom',$id_kelas)->get();
        return view('frontend.modul.kom.kelas.murid.index',compact('murid','kelas'));
    }
    public function add_murid($id)
    {
        $kelas = Kelaskom::findorFail($id);
        $personal = Personal::all();
        return view('frontend.modul.kom.kelas.murid.create',compact('personal','kelas'));
    }
    public function store_murid(Request $request)
    {
        $murid = new Murid;
        $murid->idkelaskom=$request->idkelaskom;
        $murid->idpersonal=$request->idpersonal;
        $murid->status=$request->status;
        $murid->status_baptisan=$request->status_baptisan;
        $murid->usercreated=$request->created;
        $murid->save();
        return redirect('kelaskom/murid/'.$request->idkelaskom);
    }
    public function edit_murid($id)
    {
        $murid = Murid::findorFail($id);
        $personal = Personal::all();
        return view('frontend.modul.kom.kelas.murid.edit',compact('personal','murid'));
    }
    public function update_murid(Request $request,$id)
    {
        $murid = Murid::findorFail($id);
        $murid->idkelaskom=$request->idkelaskom;
        $murid->idpersonal=$request->idpersonal;
        $murid->status=$request->status;
        $murid->status_baptisan=$request->status_baptisan;
        $murid->userupdated=$request->updated;
        $murid->save();
        return redirect('kelaskom/murid/'.$murid->idkelaskom);
    }
    public function detail($id)
     {
        $kelas = Kelaskom::findorFail($id);
        $komkehadiran = Komkehadiran::where('idkelaskom',$id)->get();
        $komlkp = Komlkp::where('idkelaskom',$id)->get();
        $komujian = Komujian::where('idkelaskom',$id)->get();
        $magang = Kommagang::where('idkelaskom',$id)->get();
        $tugas = Komtugas::where('idkelaskom',$id)->get();
        $kkmta = Kkmta::where('idkelaskom',$id)->get();
        $guru = Guru::all();
        $materi = Materi::all();
        return view ('frontend.modul.kom.kelas.detail',compact('kelas','komkehadiran','guru','materi','komlkp','komujian','magang','tugas','kkmta')); 
     }
}
