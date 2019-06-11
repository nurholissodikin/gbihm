<?php

namespace App\Http\Controllers;

use App\Bpnkonseling;
use App\Bpnpeserta;
use Illuminate\Http\Request;

class BpnkonselingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $konseling = Bpnkonseling::all();
        return view('frontend.modul.bp2n.konseling.index',compact('konseling'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $peserta = Bpnpeserta::all();
        return view('frontend.modul.bp2n.konseling.create',compact('peserta'));
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
        $konseling = new Bpnkonseling;
        $konseling->idpeserta=$request->peserta;
        $konseling->tanggal=$request->tanggal;
        $konseling->tempat=$request->tempat;
        $konseling->pejabat=$request->pejabat;
        $konseling->status=$request->status;
        $konseling->save();

        return redirect()->route('bp2nkonseling.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bpnkonseling  $bpnkonseling
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $konseling = Bpnkonseling::findorFail($id); 
        $peserta = Bpnpeserta::all();
        return view('frontend.modul.bp2n.konseling.detail',compact('peserta','konseling'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bpnkonseling  $bpnkonseling
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $konseling = Bpnkonseling::findorFail($id); 
        $peserta = Bpnpeserta::all();
        return view('frontend.modul.bp2n.konseling.edit',compact('peserta','konseling'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bpnkonseling  $bpnkonseling
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $konseling = Bpnkonseling::findorFail($id);
        $konseling->idpeserta=$request->peserta;
        $konseling->tanggal=$request->tanggal;
        $konseling->tempat=$request->tempat;
        $konseling->pejabat=$request->pejabat;
        $konseling->status=$request->status;
        $konseling->save();

        return redirect()->route('bp2nkonseling.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bpnkonseling  $bpnkonseling
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bpnkonseling $bpnkonseling)
    {
        //
        $konseling = Bpnkonseling::findorFail($id);
        $konseling->delete();
        return $konseling;
    }
    public function get_peserta_konseling($id){
        $peserta = Bpnpeserta::where('id',$id)->first();
        $auto = [];
        $auto['id_pria'] = $peserta->idpria .' || '. $peserta->pria['namalengkap'];
        $auto['id_wanita'] = $peserta->idwanita .' || '. $peserta->wanita['namalengkap'];
        return $auto;
    }
    public function konseling_update(Request $request, $id)
    {
        //
        $konseling = Bpnkonseling::findorFail($id);
        $konseling->idpeserta=$request->peserta;
        $konseling->tanggal=$request->tanggal;
        $konseling->tempat=$request->tempat;
        $konseling->pejabat=$request->pejabat;
        $konseling->status=$request->status;
        $konseling->save();

        return redirect('bp2npeserta/konseling/'.$request->peserta);
    }
    public function konseling_store(Request $request)
    {
        //
        $konseling = new Bpnkonseling;
        $konseling->idpeserta=$request->peserta;
        $konseling->tanggal=$request->tanggal;
        $konseling->tempat=$request->tempat;
        $konseling->pejabat=$request->pejabat;
        $konseling->status=$request->status;
        $konseling->save();

        return redirect('bp2npeserta/konseling/'.$request->peserta);
    }
}
