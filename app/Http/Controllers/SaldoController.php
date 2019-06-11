<?php

namespace App\Http\Controllers;

use App\Saldo;
use Illuminate\Http\Request;
use App\Rayon;
use App\Bank;
use App\Divisi;
use App\Subrayon;
use App\Ptamukhusus;
use App\Vbadge;
use App\Jabatanpelayanan;
use App\Cool;
use App\Tipecool;
use App\Vsaldo;
use App\Profesi;
use Auth;

class SaldoController extends Controller
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
    public function create()
    {
        //
        $rayon= Rayon::all();
        $bank= Bank::all();
        return view('frontend.institusi.rayon.setor',compact('rayon','bank'));
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
        $saldo = new Saldo;
        $saldo->tanggal = $request->tatra;
        $saldo->rek_asal = $request->rekas;
        $saldo->rek_tujuan = $request->rektu;
        $saldo->kode_transfer = $request->kodetr;
        $saldo->jumlah = $request->jumlah;
        $saldo->berita = $request->berita;
        $saldo->bukti = $request->bukti;
        $saldo->idrayon = $request->idrayon;
        if ($request->hasFile('dokrayon')) {
            $person = $request->file('dokrayon');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/doksaldo';
                $person->move($destinationPath, $filename);
                $saldo->bukti=$filename;
        }
        $saldo->save();
        return redirect()->route('rayon.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Saldo  $saldo
     * @return \Illuminate\Http\Response
     */
    public function show(Saldo $saldo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Saldo  $saldo
     * @return \Illuminate\Http\Response
     */
    public function edit(Saldo $saldo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Saldo  $saldo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Saldo $saldo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Saldo  $saldo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Saldo $saldo)
    {
        //
    }
    public function setor_rayon(Request $request)
    {
        $saldo = new Saldo;
        $saldo->tanggal = $request->tatra;
        $saldo->rek_asal = $request->rekas;
        $saldo->rek_tujuan = $request->rektu;
        $saldo->kode_transfer = $request->kodetr;
        $saldo->jumlah = $request->jumlah;
        $saldo->berita = $request->berita;
        $saldo->jenis_transaksi = "Setor";
        $saldo->bukti = $request->bukti;
        $saldo->idrayon = $request->idrayon;
        if ($request->hasFile('dokrayon')) {
            $person = $request->file('dokrayon');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/institusi/dokraysaldo';
                $person->move($destinationPath, $filename);
                $saldo->bukti=$filename;
        }
        $saldo->save();
        return redirect()->route('rayon.show',$saldo->idrayon);
    }
    public function setor_divisi(Request $request)
    {   
        $saldo = new Saldo;
        $saldo->tanggal = $request->tatra;
        $saldo->rek_asal = $request->rekas;
        $saldo->rek_tujuan = $request->rektu;
        $saldo->kode_transfer = $request->kodetr;
        $saldo->jumlah = $request->jumlah;
        $saldo->berita = $request->berita;
        $saldo->jenis_transaksi = "Setor";
        $saldo->bukti = $request->bukti;
        $saldo->iddivisi = $request->iddivisi;
        if ($request->hasFile('dokdivisi')) {
            $person = $request->file('dokdivisi');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/institusi/dokdivsaldo';
                $person->move($destinationPath, $filename);
                $saldo->bukti=$filename;
        }
        
        $saldo->save();

        return redirect()->route('divisi.show',$saldo->iddivisi);
    }

    public function setor_subrayon(Request $request)
    {   
        $saldo = new Saldo;
        $saldo->tanggal = $request->tatra;
        $saldo->rek_asal = $request->rekas;
        $saldo->rek_tujuan = $request->rektu;
        $saldo->kode_transfer = $request->kodetr;
        $saldo->jumlah = $request->jumlah;
        $saldo->berita = $request->berita;
        $saldo->jenis_transaksi = "Setor";
        $saldo->bukti = $request->bukti;
        $saldo->idsubrayon = $request->idsubrayon;
        if ($request->hasFile('doksub')) {
            $person = $request->file('doksub');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/institusi/doksubsaldo';
                $person->move($destinationPath, $filename);
                $saldo->bukti=$filename;
        }
        $saldo->save();

        return redirect()->route('subrayon.show',$saldo->idsubrayon);
    }
    public function setor_cabang(Request $request)
    {   
        $saldo = new Saldo;
        $saldo->tanggal = $request->tatra;
        $saldo->rek_asal = $request->rekas;
        $saldo->rek_tujuan = $request->rektu;
        $saldo->kode_transfer = $request->kodetr;
        $saldo->jumlah = $request->jumlah;
        $saldo->jenis_transaksi = "Setor";
        $saldo->berita = $request->berita;
        $saldo->bukti = $request->bukti;
        $saldo->idcabangranting = $request->idcabangranting;
        if ($request->hasFile('dokcab')) {
            $person = $request->file('dokcab');
            $extension = $person->getClientOriginalExtension();
            $filename = str_random('6'). '.' .$extension;
            $destinationPath = public_path() . 
                DIRECTORY_SEPARATOR . 'assets/institusi/dokcabsaldo';
                $person->move($destinationPath, $filename);
                $saldo->bukti=$filename;
        }
        $saldo->save();
        return redirect('/cabang/saldo/'.$saldo->idcabangranting);
    }

    public function detail_salcab($idtransaksi){
        $saldo = Saldo::FindOrFail($idtransaksi);
        $bank= Bank::all();
        return view('frontend.institusi.cabang.detailsaldo',compact('saldo','bank'));
    }
    public function detail_salra($idtransaksi){
        $saldo = Saldo::FindOrFail($idtransaksi);
        $bank= Bank::all();
        return view('frontend.institusi.rayon.detailsaldo',compact('saldo','bank'));
    }
    public function detail_salsub($idtransaksi){
        $saldo = Saldo::FindOrFail($idtransaksi);
        $bank= Bank::all();
        return view('frontend.institusi.subrayon.detailsaldo',compact('saldo','bank'));
    }
    public function detail_saldiv($idtransaksi){
        $saldo = Saldo::FindOrFail($idtransaksi);
        $bank= Bank::all();
        return view('frontend.institusi.divisi.detailsaldo',compact('saldo','bank'));
    }
    public function detail_saldo_pengerja(){
        $saldo = Saldo::where('jenis_transaksi','!=','Setor');
        $bank= Bank::all();
        return view('frontend.institusi.divisi.detailsaldo',compact('saldo','bank'));
    }

    public function badge()
    {
        $saldo = Vbadge::where('jenisbadge','!=','Setor')->get();
        return view('frontend.modul.pengerja.badge.index',compact('saldo'));
    }
    public function detail_badge($id)
    {
        $badge = Vbadge::findorFail($id);
        return view('frontend.modul.pengerja.badge.detail',compact('badge'));
    }
    public function mdpj()
    {
        $user = Auth::user();
        if ($user->role_id=='6') {
            # code...
            $jabpel = Jabatanpelayanan::whereNull('jeniscool')->where('idcabangranting',$user->cabang_id)->get();
        }else{
            $jabpel = Jabatanpelayanan::whereNull('jeniscool')->get();
        }
        $tamukhusus = Ptamukhusus::all();
        $cool = Jabatanpelayanan::whereNotNull('jeniscool')->get();
       
        $prof = Profesi::all();
        return view('frontend.badge.index',compact('tamukhusus','jabpel','cool','prof'));
    }
    public function tambah_mdpj(){
        $rayon = Rayon::all();
        $tipecool = Tipecool::all();
        return view('frontend.badge.tambah.index',compact('rayon','tipecool'));
    }
    
}
