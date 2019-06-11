<?php

namespace App\Http\Controllers;

use App\Ptamu;
use DB;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Imports\PtamuImport;
use Excel;

class PtamuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tamu = Ptamu::all();
        // dd($tamu);
        return view('frontend.modul.pengkhotbah.tamu.index',compact('tamu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('frontend.modul.pengkhotbah.tamu.create');
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

        $b= Ptamu::all();
        $count=count($b);
        $idp=$count+1;
       
        $year = substr( $thn, -2);

        // // dd($year);

        $id = $tgla.$year.$j.$bln.$tgl.$idp;
    
        $ptamu = new Ptamu;
        $ptamu->id = $id;
        $ptamu->namapanggilan = $request->namapa;
        $ptamu->tanggallahir = $request->tala;
        $ptamu->namalengkap = $request->nama;
        $ptamu->jeniskelamin = $request->jk;
        $ptamu->email = $request->email;
        $ptamu->alamat = $request->alamat;
        $ptamu->notelp = $request->notelp;
        $ptamu->demonisasi=$request->demonisasi;
        $ptamu->institusi=$request->institusi;
        $ptamu->keterangan=$request->keterangan;
        $ptamu->status=$request->status;
        if ($request->hasFile('urlphoto')) {
            $person = $request->file('urlphoto');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/modul/pengkhotbah/tamu';
                $person->move($destinationPath, $filename);
                $ptamu->foto=$filename;
        }
        $ptamu->save();

         return redirect('modul/pengkhotbah/tamu');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ptamu  $ptamu
     * @return \Illuminate\Http\Response
     */
    public function show(Ptamu $ptamu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ptamu  $ptamu
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $ptamu = Ptamu::findOrFail($id);
        return view('frontend.modul.pengkhotbah.tamu.edit',compact('ptamu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ptamu  $ptamu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $ptamu = Ptamu::findOrFail($id);
        $ptamu->namapanggilan = $request->namapa;
        $ptamu->tanggallahir = $request->tala;
        $ptamu->namalengkap = $request->nama;
        $ptamu->jeniskelamin = $request->jk;
        $ptamu->email = $request->email;
        $ptamu->alamat = $request->alamat;
        $ptamu->notelp = $request->notelp;
        $ptamu->keterangan=$request->keterangan;
        $ptamu->demonisasi=$request->demonisasi;
        $ptamu->institusi=$request->institusi;
        $ptamu->status=$request->status;
        if ($request->hasFile('urlphoto')) {
            $person = $request->file('urlphoto');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/modul/pengkhotbah/tamu';
                $person->move($destinationPath, $filename);
                $ptamu->foto=$filename;
        }
        $ptamu->save();

         return redirect('modul/pengkhotbah/tamu');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ptamu  $ptamu
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $ptamu = Ptamu::findOrFail($id);
        $ptamu->delete();
        return $ptamu;
    }
    public function tamu_detail($id)
    {
        //
        $ptamu = Ptamu::findOrFail($id);
        return view('frontend.modul.pengkhotbah.tamu.detail',compact('ptamu'));
    }
    public function storedata(Request $request)
    {
        //VALIDASI
        $this->validate($request, [
            'file' => 'required|mimes:xls,xlsx'
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file'); //GET FILE
            Excel::import(new PtamuImport, $file); //IMPORT FILE 
            return redirect()->back()->with(['success' => 'Upload success']);
        }  
        return redirect()->back()->with(['error' => 'Please choose file before']);
    }
}
