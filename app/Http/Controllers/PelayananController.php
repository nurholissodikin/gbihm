<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pelayanan;
use App\Personal;
use Carbon\Carbon;
use App\Jabatanpelayanan;

class PelayananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($idpersonal)
    {
        $pelayanan = new Pelayanan;
        $personal= Personal::findOrFail($idpersonal);
        return view('frontend.rohani.pelayanan.create',compact('pelayanan','personal'));
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
        $pelayanan = new Pelayanan;
        $pelayanan->nosertifikat=$request->nosertifikat;
        $pelayanan->sejak=$request->sejak;
        $pelayanan->jenisbadge=$request->jenis;
        $pelayanan->tanggal=$request->tanggal;
        $pelayanan->idpersonal=$request->idpersonal;
         if ($request->hasFile('dokumen')) {
            $person = $request->file('dokumen');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/rohani/pelayanan/dokumen';
                $person->move($destinationPath, $filename);
                $pelayanan->dokumen=$filename;
        }
        $pelayanan->save();
         return redirect('/personal/detail/'.$request->idpersonal);
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
        $pelayanan = Pelayanan::findOrFail($id);
        return view('frontend.rohani.pelayanan.edit',compact('pelayanan'));
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
        $pelayanan = Pelayanan::findOrFail($id);
        $pelayanan->nosertifikat=$request->nosertifikat;
        $pelayanan->sejak=$request->sejak;
        $pelayanan->jenisbadge=$request->jenis;
        $pelayanan->tanggal=$request->tanggal;
         if ($request->hasFile('dokumen')) {
            $person = $request->file('dokumen');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/rohani/pelayanan/dokumen';
                $person->move($destinationPath, $filename);
                $pelayanan->dokumen=$filename;
        }
        $pelayanan->save();
         return redirect('/personal/detail/'.$request->idpersonal);
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
    }
    public function tamukhusus()
    {
        $tamukhusus = Pelayanan::where('jenisbadge','Tamu Khusus')->get();
        return view('frontend.modul.pengkhotbah.tamukhusus.index',compact('tamukhusus'));
    }
    public function tamukhusus_create()
    {   $kadiv = Jabatanpelayanan::where('jabatan','Ka. Divisi')->get();
        $gembala = Jabatanpelayanan::where('jabatan','Staf Ahli Penggembalaan')->get();
        return view('frontend.modul.pengkhotbah.tamukhusus.create',compact('kadiv','gembala'));
    }
    public function tamukhusus_edit($id)
    {   
        $pelayanan = Pelayanan::findOrFail($id);
        $kadiv = Jabatanpelayanan::where('jabatan','Ka. Divisi')->get();
        $gembala = Jabatanpelayanan::where('jabatan','Staf Ahli Penggembalaan')->get();
        $jabpel = Jabatanpelayanan::where('idpelayanan',$id)->first();
        return view('frontend.modul.pengkhotbah.tamukhusus.edit',compact('pelayanan','kadiv','gembala','jabpel'));
    }
    public function tamukhusus_detail($id)
    {   
        $pelayanan = Pelayanan::findOrFail($id);
        $kadiv = Jabatanpelayanan::where('jabatan','Ka. Divisi')->get();
        $gembala = Jabatanpelayanan::where('jabatan','Staf Ahli Penggembalaan')->get();
        $jabpel = Jabatanpelayanan::where('idpelayanan',$id)->first();
        return view('frontend.modul.pengkhotbah.tamukhusus.detail',compact('pelayanan','kadiv','gembala','jabpel'));
    }
    public function tamukhusus_store(Request $request)
    {
        //

         $tahun = $request->input('tala');
        $pisah = explode('/', $tahun);
        $tgl = $pisah[0];
        $bln = $pisah[1];
        $thn = $pisah[2];

        $ayeuna = Carbon::now();
        $x = $ayeuna->format('Y-m-d');
        $pisaha = explode('-', $x);
        $tgla = $pisaha[2];
        // dd($tgla);
        if ($request->jk == 'P') {
            $j = 3;
        }else
        {
            $j = 1;
        }

        $b= Personal::all();
        $count=count($b);
        $idp=$count+1;
       
        $year = substr( $thn, -2);

        // // dd($year);

        $id = $tgla.$year.$j.$bln.$tgl.$idp;
      
        $this->validate($request,[
            'noktp' => 'unique:personal,ktpid,'.$request->noktp.',idpersonal|nullable'
        ]);
        $personal = new Personal;
        $personal->idpersonal = $id;
        $personal->ktpid = $request->noktp;
        $personal->passportid = $request->nopas;
        $personal->namapanggilan = $request->namapa;
        $personal->tanggallahir = $request->tala;
        $personal->namalengkap = $request->nama;
        $personal->jeniskelamin = $request->jk;
        $personal->email = $request->email;
        $personal->gerejaasal = $request->gereja;
        if ($request->hasFile('urlphoto')) {
            $person = $request->file('urlphoto');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/foto';
                $person->move($destinationPath, $filename);
                $personal->urlphoto=$filename;
        }
        $personal->save();

        $pelayanan = new Pelayanan;
        $pelayanan->jenisbadge=$request->jenis;
        $pelayanan->idpersonal=$personal->idpersonal;
        $pelayanan->mengetahui=$request->mengetahui;
        $pelayanan->menyutujui=$request->menyutujui;
        $pelayanan->save();

        $pt = new Jabatanpelayanan;
        $pt->idpersonal=$personal->idpersonal;
        $pt->tempat=$request->tempat;
        $pt->jabatan=$request->jabatan;
        $pt->status=$request->status;
        $pt->idrayon=$request->rayon;
        $pt->idsubrayon=$request->subrayon;
        $pt->idcabangranting=$request->cabang;
        $pt->idpelayanan=$pelayanan->id;
        $pt->save();

         return redirect('/modul/pengkhotbah/tamukhusus');
    }
    public function tamukhusus_update(Request $request,$id)
    {
        //

        $personal = Personal::find($request->idpersonal);
        $personal->ktpid = $request->noktp;
        $personal->passportid = $request->nopas;
        $personal->namapanggilan = $request->namapa;
        $personal->tanggallahir = $request->tala;
        $personal->namalengkap = $request->nama;
        $personal->jeniskelamin = $request->jk;
        $personal->email = $request->email;
        $personal->gerejaasal = $request->gereja;
        if ($request->hasFile('urlphoto')) {
            $person = $request->file('urlphoto');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/foto';
                $person->move($destinationPath, $filename);
                $personal->urlphoto=$filename;
        }
        $personal->save();

        $pelayanan = Pelayanan::findOrFail($id);
        $pelayanan->jenisbadge=$request->jenis;
        $pelayanan->mengetahui=$request->mengetahui;
        $pelayanan->menyutujui=$request->menyutujui;
        $pelayanan->idpersonal=$request->idpersonal;
        $pelayanan->save();

        $pt = Jabatanpelayanan::where('idpersonal',$personal->idpersonal)->first();
        $pt->idpersonal=$request->idpersonal;
        $pt->tempat=$request->tempat;
        $pt->jabatan=$request->jabatan;
        $pt->status=$request->status;
        $pt->idrayon=$request->rayon;
        $pt->idsubrayon=$request->subrayon;
        $pt->idcabangranting=$request->cabang;
        $pt->idpelayanan=$pelayanan->id;
        $pt->save();

         return redirect('/modul/pengkhotbah/tamukhusus');
    }

    
}
