<?php

namespace App\Http\Controllers;

use App\Rohani;
use App\Rayon;
use App\Cabang;
use App\Subrayon;
use App\Personal;
use Illuminate\Http\Request;

class RohaniController extends Controller
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Rohani  $rohani
     * @return \Illuminate\Http\Response
     */
    public function show(Rohani $rohani)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rohani  $rohani
     * @return \Illuminate\Http\Response
     */
    public function edit(Rohani $rohani)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rohani  $rohani
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rohani $rohani)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rohani  $rohani
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rohani $rohani)
    {
        //
    }
    public function mutasi($idpersonal){
        $personal= Personal::findOrFail($idpersonal);
        $rayon= Rayon::all();
        return view('frontend.rohani.mutasi',compact('rayon','personal'));
    }
    public function ajaxData(Request $request){
   
        $query = $request->get('query');
        $data['rayon'] = Rayon::where('namarayon','LIKE','%'.$query.'%')->get();
        $data['subrayon'] = Subrayon::where('namasubrayon','LIKE','%'.$query.'%')->get();
        $data['cabang'] = Cabang::where('namacabang','LIKE','%'.$query.'%')->get();
        $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
        foreach($data['rayon'] as $row)
        {
           $output .= '
           <li><a href="#" value="'.$row->idrayon.'">'.'Rayon - '.$row->namarayon.'</a></li>';
        }
        foreach($data['subrayon'] as $row)
        {
           $output .= '
           <li><a href="#" value="'.$row->idsubrayon.'">'.'Subrayon - '.$row->namasubrayon.'</a></li>';
        }
        foreach($data['cabang'] as $row)
        {
           $output .= '
           <li><a href="#" value="'.$row->idcabangranting.'">'.'Cabang - '.$row->namacabang.'</a></li>';
        }
        $output .= '</ul>';
        echo $output;

    }

}
 