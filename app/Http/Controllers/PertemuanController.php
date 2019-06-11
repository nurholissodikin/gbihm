<?php

namespace App\Http\Controllers;

use App\Pertemuan;
use App\Subrayon;
use App\Rayon;
use App\Cabang;
use App\Jabatanpelayanan;
use App\Tipecool;
use App\Provinces;
use App\Absensipertemuan;
use App\Ptamukhusus;
use App\Profesi;
use App\Personal;
use App\Coolpengerja;
use App\Vabsensipertemuan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PertemuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pertemuan = Pertemuan::all();
        return view ('frontend.modul.pengerja.pertemuan.index',compact('pertemuan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('frontend.modul.pengerja.pertemuan.create');
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
        $ayeuna = Carbon::now();
        $x = $ayeuna->format('Y-m-d');
        $pisaha = explode('-', $x);
        $tgla = $pisaha[0];
        $tglb = $pisaha[1];
        $kode = $tgla.$tglb.'-'.$request->kode;
        $pertemuan = new Pertemuan;
        $pertemuan->kode =$kode;
        $pertemuan->tanggal =$request->tanggal;
        $pertemuan->nama =$request->nama;
        $pertemuan->tempat =$request->tempat;
        $pertemuan->save();
        return redirect()->route('pertemuan.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pertemuan  $pertemuan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $pertemuan = Pertemuan::findOrFail($id);
        return view ('frontend.modul.pengerja.pertemuan.detail',compact('pertemuan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pertemuan  $pertemuan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $pertemuan = Pertemuan::findOrFail($id);
        return view ('frontend.modul.pengerja.pertemuan.edit',compact('pertemuan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pertemuan  $pertemuan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
        $pertemuan = Pertemuan::findOrFail($id);
        $pertemuan->kode =$request->kode;
        $pertemuan->tanggal =$request->tanggal;
        $pertemuan->nama =$request->nama;
        $pertemuan->tempat =$request->tempat;
        $pertemuan->save();
        return redirect()->route('pertemuan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pertemuan  $pertemuan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $pertemuan = Pertemuan::findOrFail($id);
        $pertemuan->delete();
        return $pertemuan;
    }
    public function tambah(Request $request)
    {
        //
        $ayeuna = Carbon::now();
        $x = $ayeuna->format('Y-m-d');
        $pisaha = explode('-', $x);
        $tgla = $pisaha[0];
        $tglb = $pisaha[1];
        $kode = $tgla.$tglb.'-'.$request->kode;
        $pertemuan = new Pertemuan;
        $pertemuan->kode =$kode;
        $pertemuan->tanggal =$request->tanggal;
        $pertemuan->nama =$request->nama;
        $pertemuan->tempat =$request->tempat;
        $pertemuan->save();
        return redirect('personal/detail/'.$request->idpersonal);

    }
    public function dirisendiri()
    {
        $subrayon = Subrayon::all();
        $rayon = Rayon::all();
        $cabang = Cabang::all();
        $kadiv = Jabatanpelayanan::where('jabatan','Ka. Divisi')->get();
        $gembala = Jabatanpelayanan::where('jabatan','Staf Ahli Penggembalaan')->get();
        $tipecool = Tipecool::all();
        $provinces = Provinces::all();
        $personal = Personal::all();
        $prof = Profesi::all();
        return view('frontend.badge.tambah.index',compact('kadiv','gembala','rayon','subrayon','cabang','tipecool','provinces','prof','personal'));

    }
    public function absensi_p($id)
    {
        $pertemuan = Pertemuan::findOrFail($id);
        $absensi_tamu = Absensipertemuan::where('idpertemuan',$id)->where('jenis','Tamu')->get();
        $absensi_pengerja = Absensipertemuan::where('idpertemuan',$id)->where('jenis','Pengerja')->get();
        $absensi_cool = Absensipertemuan::where('idpertemuan',$id)->where('jenis','COOL')->get();
        $jabatan = Jabatanpelayanan::all();
        $tamu  = Ptamukhusus::all();
        $cool  = Coolpengerja::all();
        return view('frontend.modul.pengerja.absensi.index',compact('absensi_pengerja','absensi_cool','absensi_tamu','jabatan','tamu','pertemuan','cool'));
    }

     public function absensi_store(Request $request)
    {
        //
        $pertemuan = new Absensipertemuan;
        $pertemuan->idpengerja =$request->pengerja;
        $pertemuan->idtamukhusus =$request->tamu;
        $pertemuan->idpengerja_cool =$request->cool;      
        $pertemuan->idpertemuan =$request->idpertemuan;
        $pertemuan->kehadiran =$request->hadir;
        $pertemuan->alasan =$request->alasan;
        $pertemuan->usercreated = $request->created;
        $pertemuan->jenis = $request->jenis;

        $pertemuan->save();
        return redirect('pertemuan/absensi/'.$pertemuan->idpertemuan);

    }
    public function get_absensi($id){
        $absensi = Absensipertemuan::findOrFail($id);
        $auto = [];
        $auto['idpengerja'] = $absensi->idpengerja;
        $auto['idtamukhusus'] = $absensi->idtamukhusus;
        $auto['idpengerja_cool'] = $absensi->idpengerja_cool;
        $auto['idpertemuan'] = $absensi->idpertemuan;
        $auto['kehadiran'] = $absensi->kehadiran;
        $auto['alasan'] = $absensi->alasan;
        $auto['kehadiran'] = $absensi->kehadiran;
        return $auto;
    }
    public function absensi_update(Request $request,$id)
    {
        //
        $pertemuan = Absensipertemuan::findOrFail($id);
        $pertemuan->idpengerja =$request->pengerja;
        $pertemuan->idtamukhusus =$request->tamu; 
        $pertemuan->idpengerja_cool =$request->cool;   
        $pertemuan->kehadiran =$request->hadir;
        $pertemuan->alasan =$request->alasan;
        $pertemuan->userupdated = $request->updated;
        $pertemuan->save();
        return redirect('pertemuan/absensi/'.$pertemuan->idpertemuan);

    }

    public function absensi_detail_cool($id)
    {
        $absensi_cool = Absensipertemuan::findOrFail($id);
        return view('frontend.modul.pengerja.absensi.detail_cool',compact('absensi_cool'));
    }
    public function absensi_detail_tamu($id)
    {
        $absensi_tamu = Absensipertemuan::findOrFail($id);
        return view('frontend.modul.pengerja.absensi.detail_tamu',compact('absensi_tamu'));
    }
    public function absensi_detail_pengerja($id)
    {
        $absensi_pengerja = Absensipertemuan::findOrFail($id);
        return view('frontend.modul.pengerja.absensi.detail_pengerja',compact('absensi_pengerja'));
    }
    public function index_a()
    {
        //
        $pertemuan = Pertemuan::all();
        return view ('frontend.modul.pengerja.absensi.absensi',compact('pertemuan'));
    }
}
