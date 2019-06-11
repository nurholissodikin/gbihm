<?php

namespace App\Http\Controllers;

use App\Rayon;
use Illuminate\Http\Request;
use App\Personal;
use App\Saldo;
use App\Bank;
use App\Keanggotaan;

class RayonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $rayon= Rayon::all();
        return view('frontend.institusi.rayon.index',compact('rayon'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $personal= Personal::all();
        return view('frontend.institusi.rayon.create',compact('personal'));
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

        $last_ra = Rayon::orderBy('idrayon','DESC')->first();
        $id = ($last_ra != null) ? $last_ra->idrayon+1: '1';
       
        $rayon = new Rayon;
        $rayon->idrayon = $id;
        $rayon->wilayah = $request->wilayahr;
        $rayon->koderayon = $request->koder;
        $rayon->namarayon = $request->namar;
        $rayon->pemimpin = $request->pemimpin;
        $rayon->wakilpemimpin = $request->wakilpemimpin;
        $rayon->noref = $request->noref;
        $rayon->keterangan = $request->ketr;
        $rayon->active = $request->statusr;
        $rayon->save();
        return redirect()->route('rayon.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Rayon  $rayon
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $rayon = Rayon::findOrFail($id);
        $saldo = Saldo::where('idrayon',$rayon->idrayon)->get();
        return view('frontend.institusi.rayon.indexsenayan',compact('rayon','saldo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rayon  $rayon
     * @return \Illuminate\Http\Response
     */
    public function edit($idrayon)
    {
        //
        $personal= Personal::all();

        $rayon= Rayon::findOrFail($idrayon);
        return view('frontend.institusi.rayon.edit',compact('rayon','personal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rayon  $rayon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idrayon)
    {
        //
        $rayon= Rayon::findOrFail($idrayon);
        $rayon->wilayah = $request->wilayahr;
        $rayon->koderayon = $request->koder;
        $rayon->namarayon = $request->namar;
        $rayon->pemimpin = $request->pemimpin;
        $rayon->wakilpemimpin = $request->wakilpemimpin;
        $rayon->noref = $request->noref;
        $rayon->keterangan = $request->ketr;
        $rayon->active = $request->statusr;
        $rayon->save();
        return redirect()->route('rayon.index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rayon  $rayon
     * @return \Illuminate\Http\Response
     */
    public function destroy( $idrayon)
    {
        //
         $rayon = Rayon::findOrFail($idrayon);
        $rayon->delete();
        return redirect()->route('rayon.index');
    }

    public function get_rayon($idrayon){

        $rayon = Rayon::findOrFail($idrayon);
        $bank = Bank::all();
        return view('frontend.institusi.rayon.setorse',compact('rayon','bank'));
    }
    public function detail_rayon($id){
         $personal= Personal::all();
        $rayon= Rayon::findOrFail($id);
        return view('frontend.institusi.rayon.detail',compact('rayon','personal'));
    }
    public function personal($idrayon){
        $anggota= Keanggotaan::where('idrayon',$idrayon)->whereNull('tglregistrasipindah')->get();
        $rayon= Rayon::findOrFail($idrayon);
        return view('frontend.institusi.rayon.personal',compact('anggota','rayon'));
    }
     public function edit_personal($idpersonal){
        $personal= Personal::findOrFail($idpersonal);
        $anggota= Keanggotaan::where('idpersonal',$personal->idpersonal)->get();
       
        return view('frontend.institusi.rayon.editpersonal',compact('personal','anggota'));
    }
    public function detail_personal($idpersonal){
        $personal= Personal::findOrFail($idpersonal);
        return view('frontend.institusi.rayon.detailpersonal',compact('personal'));
    }
    public function upd_personal(Request $request,$idpersonal){
        $personal= Personal::findOrFail($idpersonal);
        $personal->namalengkap = $request->nama;
        $personal->jeniskelamin = $request->jk;
        $personal->alamattinggal = $request->alamat;
        $personal->nohp = $request->nohp;
        $personal->email = $request->email;
        $personal->gerejaasal = $request->gereja;
        $personal->save();
        return redirect('rayon/personal/'.$request->idrayon);
    }
}
