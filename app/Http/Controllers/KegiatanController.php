<?php

namespace App\Http\Controllers;

use App\Kegiatan;
use App\Provinces;
use App\Personal;
use App\Rayon;
use App\Pelayanan;
use App\Pelayankegiatan;
use App\Pesertakegiatan;
use App\Jabatanpelayanan;
use App\Kegiatankehadiran;
use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $kegiatan= Kegiatan::all();
        return view('frontend.modul.kegiatan.index',compact('kegiatan'));
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
        return view('frontend.modul.kegiatan.create',compact('provinces','personal','rayon'));
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
        $kegiatan = new Kegiatan;
        $kegiatan->idrayon=$request->idrayon;
        $kegiatan->idsubrayon=$request->idsubrayon;
        $kegiatan->idcabangranting=$request->idcabangranting;
        $kegiatan->kategori=$request->kategori;
        $kegiatan->subkategori=$request->subkategori;
        $kegiatan->nama_kegiatan=$request->nama;
        $kegiatan->kategori_peserta=$request->kapes;
        $kegiatan->tgl_mulai=$request->tgl_mulai;
        $kegiatan->tgl_selesai=$request->tgl_selesai;
        $kegiatan->alamat=$request->alamat;
        $kegiatan->rtrw=$request->rtrw;
        $kegiatan->kecamatan=$request->kecamatan;
        $kegiatan->kelurahan=$request->kelurahan;
        $kegiatan->kabkota=$request->kabkota;
        $kegiatan->provinsi=$request->provinsi;
        $kegiatan->kodepos=$request->kodepos;
        $kegiatan->tempat=$request->tempat;
        $kegiatan->waktu_mulai=$request->waktu_mulai;
        $kegiatan->kordinator=$request->kordinator;
        $kegiatan->status=$request->status;
        if ($request->hasFile('template')) {
            $person = $request->file('template');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/modul/kegiatan/template';
                $person->move($destinationPath, $filename);
                $kegiatan->dokumen=$filename;
        }
        $kegiatan->save();

        $kehadiran = new kegiatankehadiran;
        $kehadiran->idkegiatan= $kegiatan->id;
        $kehadiran->dewasa= 0;
        $kehadiran->diakonis= 0;
        $kehadiran->wl= 0;
        $kehadiran->pemusik= 0;
        $kehadiran->aktivis= 0;
        $kehadiran->diaken= 0;
        $kehadiran->pengerja= 0;
        $kehadiran->singer= 0;
        $kehadiran->pendoa= 0;
        $kehadiran->catatan= '';
        $kehadiran->tema= '';
        $kehadiran->save();
        return redirect()->route('kegiatan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function show(Kegiatan $kegiatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $kegiatan= Kegiatan::findOrFail($id);
        $provinces= Provinces::all();
        $personal= Personal::all();
        $rayon= Rayon::all();
        return view('frontend.modul.kegiatan.edit',compact('provinces','personal','rayon','kegiatan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
        $kegiatan = Kegiatan::findOrFail($id);
        $kegiatan->idrayon=$request->idrayon;
        $kegiatan->idsubrayon=$request->idsubrayon;
        $kegiatan->idcabangranting=$request->idcabangranting;
        $kegiatan->kategori=$request->kategori;
        $kegiatan->subkategori=$request->subkategori;
        $kegiatan->nama_kegiatan=$request->nama;
        $kegiatan->kategori_peserta=$request->kapes;
        $kegiatan->tgl_mulai=$request->tgl_mulai;
        $kegiatan->tgl_selesai=$request->tgl_selesai;
        $kegiatan->alamat=$request->alamat;
        $kegiatan->rtrw=$request->rtrw;
        $kegiatan->kecamatan=$request->kecamatan;
        $kegiatan->kelurahan=$request->kelurahan;
        $kegiatan->kabkota=$request->kabkota;
        $kegiatan->provinsi=$request->provinsi;
        $kegiatan->kodepos=$request->kodepos;
        $kegiatan->tempat=$request->tempat;
        $kegiatan->waktu_mulai=$request->waktu_mulai;
        $kegiatan->kordinator=$request->kordinator;
        $kegiatan->status=$request->status;
        if ($request->hasFile('template')) {
            $person = $request->file('template');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/modul/kegiatan/template';
                $person->move($destinationPath, $filename);
                $kegiatan->dokumen=$filename;
        }
        $kegiatan->save();
        return redirect()->route('kegiatan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kegiatan $kegiatan)
    {
        //
    }
    public function kalender()
    {
        //
        $kegiatan= Kegiatan::all();
        return view('frontend.modul.kegiatan.kalender',compact('kegiatan'));
    }
   
     public function pelayandetailpersonal($id)
    {
        $peke= Pelayankegiatan::findOrFail($id);
        return view('frontend.kegiatan.detail',compact('peke'));
    }
     public function pelayaneditpersonal($id)
    {
        $peke= Pelayankegiatan::findOrFail($id);
        return view('frontend.kegiatan.edit',compact('peke'));
    }
     public function pelayancreatepersonal($id)
    {
        $kegiatan= Kegiatan::all();
        $personal= Personal::findOrFail($id);
        return view('frontend.kegiatan.tambahpelayan',compact('kegiatan','personal'));
    }
    public function pelayan($id)
    {   
        $kegiatan= Kegiatan::findOrFail($id);
        $peke= Pelayankegiatan::where('idkegiatan',$id)->get();
        return view('frontend.modul.kegiatan.pelayan.index',compact('kegiatan','pelayan','peke'));
    }
     public function peserta($id)
    {   
        $kegiatan= Kegiatan::findOrFail($id);
        $peserta= Pesertakegiatan::where('idkegiatan',$id)->get();
        return view('frontend.modul.kegiatan.peserta.index',compact('kegiatan','peserta'));
    }
     public function pelayancreate($id)
    {
        $kegiatan= Kegiatan::findOrFail($id);
        $personal= Personal::all();
        return view('frontend.modul.kegiatan.pelayan.create',compact('kegiatan','personal'));
    }
    public function pesertacreate($id)
    {
        $kegiatan= Kegiatan::findOrFail($id);
        $personal= Personal::all();
        return view('frontend.modul.kegiatan.peserta.create',compact('kegiatan','personal'));
    }
    public function pelayandetail($id)
    {
        $peke= Pelayankegiatan::findOrFail($id);
        return view('frontend.modul.kegiatan.pelayan.detail',compact('peke'));
    }

    public function pelayan_detail_update(Request $request, $id){
        
        $kegiatan = Pelayankegiatan::findOrFail($id);
        $kegiatan->hadir=$request->hadir;
        $kegiatan->alasan=$request->alasan;
        $kegiatan->save();
        return redirect('kegiatan/pelayan/'.$kegiatan->idkegiatan);
    }
        
    public function pesertadetail($id)
    {
        $peke= Pesertakegiatan::findOrFail($id);
        return view('frontend.modul.kegiatan.peserta.detail',compact('peke'));
    }
    public function get_data_jabpel($id_personal){
        $personal = Personal::where('idpersonal',$id_personal)->first();
        $auto = [];
        $auto['status'] = $personal->statuspersonal;
        $auto['idpersonal'] = $personal->idpersonal;
        $auto['nama_lengkap'] = $personal->namalengkap;
        $auto['nohp'] = $personal->nohp;
        return $auto;
    }
    public function get_kegiatan($id){
        $kegiatan = Kegiatan::where('id',$id)->first();
        $auto = [];
        $auto['tanggal'] = $kegiatan->tgl_mulai;
        $auto['jam'] = $kegiatan->waktu_mulai;
        $auto['tempat'] = $kegiatan->tempat;
        $auto['kordinator'] = $kegiatan->personal['namalengkap'];
        return $auto;
    }
    public function kehadiran($id)
    {
        $kegiatan= Kegiatan::findOrFail($id);
        $kehadiran= Kegiatankehadiran::where('idkegiatan',$id)->first();
        return view('frontend.modul.kegiatan.kehadiran',compact('kegiatan','kehadiran'));
    }
     public function kehadiran_update(Request $request, $id)
    {
        $kehadiran = Kegiatankehadiran::findOrFail($id);
        $kehadiran->idkegiatan= $request->kegiatan;
        $kehadiran->dewasa= $request->dewasa;
        $kehadiran->diakonis= $request->diakonis;
        $kehadiran->wl= $request->wl;
        $kehadiran->pemusik= $request->pemusik;
        $kehadiran->aktivis= $request->aktivis;
        $kehadiran->diaken= $request->diaken;
        $kehadiran->pengerja= $request->pengerja;
        $kehadiran->singer= $request->singer;
        $kehadiran->pendoa= $request->pendoa;
        $kehadiran->catatan= $request->catatan;
        $kehadiran->tema= $request->tema;
        
        $kehadiran->save();
        return redirect()->back();
    }
     
}

