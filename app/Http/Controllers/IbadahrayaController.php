<?php

namespace App\Http\Controllers;

use App\Ibadahraya;
use App\Kegiatan;
use App\Provinces;
use App\Personal;
use App\Ibadahrayapelayan;
use App\Rayon;
use App\Ibadahrayakehadiran;
use Illuminate\Http\Request;

class IbadahrayaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $ibadahraya= Ibadahraya::all();
        return view('frontend.modul.ibadah.index',compact('ibadahraya'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $provinces= Provinces::all();
        $personal= Personal::all();
        $rayon= Rayon::all();
        return view('frontend.modul.ibadah.create',compact('provinces','personal','rayon'));
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
        $ibadahraya = new Ibadahraya;
        $ibadahraya->idrayon=$request->idrayon;
        $ibadahraya->idsubrayon=$request->idsubrayon;
        $ibadahraya->idcabangranting=$request->idcabangranting;
        $ibadahraya->kategori=$request->kategori;
        $ibadahraya->subkategori=$request->subkategori;
        $ibadahraya->nama_ibadah=$request->nama;
        $ibadahraya->tanggal=$request->tanggal;
        $ibadahraya->waktu=$request->jam;
        $ibadahraya->alamat=$request->alamat;
        $ibadahraya->rtrw=$request->rtrw;
        $ibadahraya->kecamatan=$request->kecamatan;
        $ibadahraya->kelurahan=$request->kelurahan;
        $ibadahraya->kabkota=$request->kabkota;
        $ibadahraya->provinsi=$request->provinsi;
        $ibadahraya->kodepos=$request->kodepos;
        $ibadahraya->tempat=$request->tempat;
        $ibadahraya->kordinator=$request->kordinator;
        $ibadahraya->status=$request->status;
        $ibadahraya->save();

        $kehadiran = new Ibadahrayakehadiran;
        $kehadiran->idibadahraya= $ibadahraya->id;
        $kehadiran->dewasa= 0;
        $kehadiran->diakonis= 0;
        $kehadiran->wl= 0;
        $kehadiran->pemusik= 0;
        $kehadiran->aktivis= 0;
        $kehadiran->diaken= 0;
        $kehadiran->pengerja= 0;
        $kehadiran->singer= 0;
        $kehadiran->pendoa= 0;
        $kehadiran->sm_type= '';
        $kehadiran->guru_sm= 0;
        $kehadiran->ast_gurusm= 0;
        $kehadiran->batita= 0;
        $kehadiran->balita= 0;
        $kehadiran->pratama= 0;
        $kehadiran->guru_pembina= 0;
        $kehadiran->madya= 0;
        $kehadiran->pe_anak= 0;
        $kehadiran->jemaat= 0;
        $kehadiran->catatan= '';
        $kehadiran->tema= '';
        $kehadiran->save();
        return redirect('modul/ibadahraya');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ibadahraya  $ibadahraya
     * @return \Illuminate\Http\Response
     */
    public function show(Ibadahraya $ibadahraya)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ibadahraya  $ibadahraya
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $ibadahraya= Ibadahraya::findOrFail($id);
        $provinces= Provinces::all();
        $personal= Personal::all();
        $rayon= Rayon::all();
        return view('frontend.modul.ibadah.edit',compact('provinces','personal','rayon','ibadahraya'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ibadahraya  $ibadahraya
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $ibadahraya = Ibadahraya::findOrFail($id);
        $ibadahraya->idrayon=$request->idrayon;
        $ibadahraya->idsubrayon=$request->idsubrayon;
        $ibadahraya->idcabangranting=$request->idcabangranting;
        $ibadahraya->kategori=$request->kategori;
        $ibadahraya->subkategori=$request->subkategori;
        $ibadahraya->nama_ibadah=$request->nama;
        $ibadahraya->tanggal=$request->tanggal;
        $ibadahraya->waktu=$request->jam;
        $ibadahraya->alamat=$request->alamat;
        $ibadahraya->rtrw=$request->rtrw;
        $ibadahraya->kecamatan=$request->kecamatan;
        $ibadahraya->kelurahan=$request->kelurahan;
        $ibadahraya->kabkota=$request->kabkota;
        $ibadahraya->provinsi=$request->provinsi;
        $ibadahraya->kodepos=$request->kodepos;
        $ibadahraya->tempat=$request->tempat;
        $ibadahraya->kordinator=$request->kordinator;
        $ibadahraya->status=$request->status;
        $ibadahraya->save();

        return redirect('modul/ibadahraya');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ibadahraya  $ibadahraya
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ibadahraya $ibadahraya)
    {
        //
    }
    public function kalender()
    {
        $ibadahraya= Ibadahraya::all();
        return view('frontend.modul.ibadah.kalender',compact('ibadahraya'));
    }
    public function ibadahraya_pelayan($id)
    {   
        $ibadahraya= Ibadahraya::findOrFail($id);
        $peke= Ibadahrayapelayan::where('idibadahraya',$id)->get();
        return view('frontend.modul.ibadah.pelayan.index',compact('ibadahraya','peke'));
    }
    public function ibadahraya_pelayancreate($id)
    {
         $ibadahraya= Ibadahraya::findOrFail($id);
        $personal= Personal::all();
        return view('frontend.modul.ibadah.pelayan.create',compact('ibadahraya','personal'));
    }
    public function ibadahraya_pelayandetail($id)
    {
        $peke= Ibadahrayapelayan::findOrFail($id);
        return view('frontend.modul.ibadah.pelayan.detail',compact('peke'));
    }
    public function ibadahraya_kehadiran($id)
    {   
        $ibadahraya= Ibadahraya::findOrFail($id);
        $kehadiran= Ibadahrayakehadiran::where('idibadahraya',$ibadahraya->id)->first();
        return view('frontend.modul.ibadah.kehadiran',compact('ibadahraya','kehadiran'));
    }
    public function ibadahraya_pelayan_store(Request $request)
    {
        $ibadahraya = new Ibadahrayapelayan;
        $ibadahraya->idibadahraya=$request->idibadahraya;
        $ibadahraya->idpersonal=$request->idjabpel;
        $ibadahraya->melayani=$request->melayani;
        $ibadahraya->hadir=$request->hadir;
        $ibadahraya->save();
        return redirect('modul/ibadahraya/pelayan/'.$request->idibadahraya);
    }
    public function ibadahraya_pelayan_update(Request $request,$id)
    {
        $ibadahraya = Ibadahrayapelayan::findOrFail($id);
        $ibadahraya->alasan=$request->alasan;
        $ibadahraya->hadir=$request->hadir;
        $ibadahraya->save();
        return redirect('modul/ibadahraya/pelayan/'.$ibadahraya->idibadahraya);
    }
    public function ibadahraya_pelayan_delete($id)
    {
        $ibadahraya = Ibadahrayapelayan::findOrFail($id);
        $ibadahraya->delete();
        return $ibadahraya;
    }
    public function kehadiran_update(Request $request, $id)
    {
        $kehadiran = Ibadahrayakehadiran::findOrFail($id);
        $kehadiran->idibadahraya= $request->ibadahraya;
        $kehadiran->dewasa= $request->dewasa;
        $kehadiran->diakonis= $request->diakonis;
        $kehadiran->wl= $request->wl;
        $kehadiran->pemusik= $request->pemusik;
        $kehadiran->aktivis= $request->aktivis;
        $kehadiran->diaken= $request->diaken;
        $kehadiran->pengerja= $request->pengerja;
        $kehadiran->singer= $request->singer;
        $kehadiran->pendoa= $request->pendoa;
        $kehadiran->sm_type= $request->smtype;
        $kehadiran->guru_sm= $request->gurusm;
        $kehadiran->ast_gurusm= $request->astgurusm;
        $kehadiran->batita= $request->batita;
        $kehadiran->balita= $request->balita;
        $kehadiran->pratama= $request->pratama;
        $kehadiran->guru_pembina= $request->gurupembina;
        $kehadiran->madya= $request->madya;
        $kehadiran->pe_anak= $request->penyerahan;
        $kehadiran->jemaat= $request->jemaat;
        $kehadiran->catatan= $request->catatan;
        $kehadiran->tema= $request->tema;
        $kehadiran->save();
        return redirect()->back();
    }

   
}
