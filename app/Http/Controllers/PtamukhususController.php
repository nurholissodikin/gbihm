<?php

namespace App\Http\Controllers;

use App\Jabatanpelayanan;
use Carbon\Carbon;
use App\Cabang;
use App\Rayon;
use App\Saldo;
use App\Subrayon;
use App\Ptamukhusus;
use App\Imports\PtamukhususImport;
use Excel;
use App\Mail\DemoEmail;
use Mail;
use Illuminate\Http\Request;
use Alert;
use Crypt;

class PtamukhususController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tamukhusus = Ptamukhusus::all();
        return view('frontend.modul.pengkhotbah.tamukhusus.index',compact('tamukhusus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $subrayon = Subrayon::all();
        $rayon = Rayon::all();
        $cabang = Cabang::all();
        $kadiv = Jabatanpelayanan::where('jabatan','Ka. Divisi')->get();
        $gembala = Jabatanpelayanan::where('jabatan','Staf Ahli Penggembalaan')->get();
        return view('frontend.modul.pengkhotbah.tamukhusus.create',compact('kadiv','gembala','rayon','subrayon','cabang'));
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

        $b= Ptamukhusus::all();
        $count=count($b);
        $idp=$count+1;
       
        $year = substr( $thn, -2);

        // // dd($year);

        $id = $tgla.$year.$j.$bln.$tgl.$idp;

        $tamukhusus = new Ptamukhusus;
        $tamukhusus->idtamukhusus = $id;
        $tamukhusus->namapanggilan = $request->namapa;
        $tamukhusus->tanggallahir = $request->tala;
        $tamukhusus->namalengkap = $request->nama;
        $tamukhusus->jeniskelamin = $request->jk;
        $tamukhusus->nik = $request->nik;
        $tamukhusus->jabatan = $request->jabatan;
        $tamukhusus->gereja = $request->gereja;
        $tamukhusus->jenisbadge = $request->jenis;
        $tamukhusus->status = $request->jk;
        $tamukhusus->mengetahui = $request->mengetahui;
        $tamukhusus->menyutujui = $request->menyutujui;
        $tamukhusus->email = $request->email;
        $tamukhusus->status = $request->status;
        if ($request->hasFile('urlphoto')) {
            $person = $request->file('urlphoto');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/modul/pengkhotbah/tamukhusus';
                $person->move($destinationPath, $filename);
                $tamukhusus->foto=$filename;
        }
        $tamukhusus->save();

        return redirect('/modul/pengkhotbah/tamukhusus');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ptamukhusus  $ptamukhusus
     * @return \Illuminate\Http\Response
     */
    public function show(Ptamukhusus $ptamukhusus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ptamukhusus  $ptamukhusus
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $tamukhusus = Ptamukhusus::findOrFail($id);
        $kadiv = Jabatanpelayanan::where('jabatan','Ka. Divisi')->get();
        $gembala = Jabatanpelayanan::where('jabatan','Staf Ahli Penggembalaan')->get();
        return view('frontend.modul.pengkhotbah.tamukhusus.edit',compact('kadiv','gembala','tamukhusus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ptamukhusus  $ptamukhusus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $tamukhusus = Ptamukhusus::findOrFail($id);
         $tamukhusus->namapanggilan = $request->namapa;
        $tamukhusus->tanggallahir = $request->tala;
        $tamukhusus->namalengkap = $request->nama;
        $tamukhusus->jeniskelamin = $request->jk;
        $tamukhusus->nik = $request->nik;
        $tamukhusus->jabatan = $request->jabatan;
        $tamukhusus->gereja = $request->gereja;
        $tamukhusus->jenisbadge = $request->jenis;
        $tamukhusus->status = $request->jk;
        $tamukhusus->mengetahui = $request->mengetahui;
        $tamukhusus->menyutujui = $request->menyutujui;
        $tamukhusus->email = $request->email;
        $tamukhusus->status = $request->status;
        if ($request->hasFile('urlphoto')) {
            $person = $request->file('urlphoto');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/modul/pengkhotbah/tamukhusus';
                $person->move($destinationPath, $filename);
                $tamukhusus->foto=$filename;
        }
        $tamukhusus->save();

        return redirect('/modul/pengkhotbah/tamukhusus');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ptamukhusus  $ptamukhusus
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
       $tamukhusus =  Ptamukhusus::findOrFail($id);
       $tamukhusus->delete();
       return $tamukhusus;

    }
    public function tamukhusus_detail($id)
    {
        //
        $tamukhusus = Ptamukhusus::findOrFail($id);
        $kadiv = Jabatanpelayanan::where('jabatan','Ka. Divisi')->get();
        $gembala = Jabatanpelayanan::where('jabatan','Staf Ahli Penggembalaan')->get();
        return view('frontend.modul.pengkhotbah.tamukhusus.detail',compact('kadiv','gembala','tamukhusus'));
    }


    public function store_cetak(Request $request)
    {
        //
        $tgls = Carbon::now();
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

        $b= Ptamukhusus::all();
        $count=count($b);
        $idp=$count+1;
       
        $year = substr( $thn, -2);

        // // dd($year);

        $id = $tgla.$year.$j.$bln.$tgl.$idp;

        $tamukhusus = new Ptamukhusus;
        $tamukhusus->idtamukhusus = $id;
        $tamukhusus->namapanggilan = $request->namapa;
        $tamukhusus->tanggallahir = $request->tala;
        $tamukhusus->namalengkap = $request->nama;
        $tamukhusus->jeniskelamin = $request->jk;
        $tamukhusus->nik = $request->nik;
        $tamukhusus->jabatan = $request->jabatan;
        $tamukhusus->gereja = $request->gereja;
        $tamukhusus->jenisbadge = $request->jenis;
        $tamukhusus->status = $request->jk;
        $tamukhusus->mengetahui = $request->mengetahui;
        $tamukhusus->menyutujui = $request->menyutujui;
        $tamukhusus->email = $request->email;
        $tamukhusus->status = $request->status;
        if ($request->hasFile('urlphoto')) {
            $person = $request->file('urlphoto');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/modul/pengkhotbah/tamukhusus';
                $person->move($destinationPath, $filename);
                $tamukhusus->foto=$filename;
        }
        $tamukhusus->save();

        $saldo = new Saldo;
        $saldo->idtamukhusus=$tamukhusus->idtamukhusus;
        $saldo->tanggal = $tgls;
        $saldo->jumlah = "35000";
        $saldo->jenisbadge = $request->jenis;
        $saldo->jenis_transaksi = "Renew";
        $saldo->idcabangranting = $request->cabang;
        $saldo->idsubrayon = $request->subrayon;
        $saldo->idrayon = $request->rayon;
        $saldo->save();
        return redirect('/modul/pengkhotbah/tamukhusus');
    }
    public function storedata(Request $request)
    {
        //VALIDASI
        $this->validate($request, [
            'file' => 'required|mimes:xls,xlsx'
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file'); //GET FILE
            Excel::import(new PtamukhususImport, $file); //IMPORT FILE 

            return redirect()->back()->with(['success' => 'Upload success']);
        }  
        return redirect()->back()->with(['error' => 'Please choose file before']);
    }
    public function mdpj_store(Request $request)
    {
         $user = Auth::user();
        if($user->role->name == 'Pelayan'){
            $this->validate($request,[
                'noktp' => 'unique:personal,ktpid,'.$request->noktp.',idpersonal|nullable'
            ]);
            $personal = Personal::find($request->idpersonal);
        }
        else{
            $tahun = $request->input('tala');
            $pisah = explode('-', $tahun);

            $tgl = $pisah[2];
            $bln = $pisah[1];
            $thn = $pisah[0];

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

            $b= Ptamukhusus::all();
            $count=count($b);
            $idp=$count+1;

            $year = substr( $thn, -2);

        // // dd($year);

            $id = $tgla.$year.$j.$bln.$tgl.$idp;
        // dd($id);
            $this->validate($request,[
                'noktp' => 'unique:personal,ktpid,'.$request->noktp
            ]);

            $tamukhusus = new Ptamukhusus;
            $tamukhusus->idtamukhusus = $id;

        }
        
        $tamukhusus->namapanggilan = $request->namapa;
        $tamukhusus->tanggallahir = $request->tala;
        $tamukhusus->namalengkap = $request->nama;
        $tamukhusus->jeniskelamin = $request->jk;
        $tamukhusus->nik = $request->nik;
        $tamukhusus->jabatan = $request->jabatan;
        $tamukhusus->gereja = $request->gereja;
        $tamukhusus->jenisbadge = $request->jenis;
        $tamukhusus->status = $request->jk;
        $tamukhusus->mengetahui = $request->mengetahui;
        $tamukhusus->menyutujui = $request->menyutujui;
        $tamukhusus->email = $request->email;
        $tamukhusus->status = $request->status;
        $tamukhusus->verifikasi ='0';
        $tamukhusus->approve ='0';
        $tamukhusus->jenis = $request->jenis_b;
        if ($request->hasFile('urlphoto')) {
            $person = $request->file('urlphoto');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/modul/pengkhotbah/tamukhusus';
                $person->move($destinationPath, $filename);
                $tamukhusus->foto=$filename;
        }


        $tamukhusus->save();
        // Mail::to($tamukhusus->email)->send(new DemoEmail($tamukhusus));
        if (Auth::user()->role->name == 'Pelayan') {
          return redirect('mdpj/cetak_badge');
        }
        else {
          return redirect('mdpj/badge');
        }
    }
    public function mdpj_verif()
    {           

         $decryptedEmail = Crypt::decrypt(request('token'));
        $tamu = Ptamukhusus::whereEmail($decryptedEmail)->first();
        if ($tamu->verifikasi == '1') {
            return "Email Sudah Terverifikasi";
        }
        // otherwise change tamu status to "activated"
        $tamu->verifikasi = '1';
        $tamu->save();
        // autologin
        
        return redirect('/mdpj/badge');
    }


    public function mdpj_approve($id)
    {           

        $tamu = Ptamukhusus::findOrFail($id);
        $tamu->approve = '1';
        $tamu->save();
        // autologin
        
        return redirect()->back();
    }
}
