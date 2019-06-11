<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Input;

use App\Provinces;
use App\Regencies;
use App\Districts;
use App\Villages;
use App\Rayon;
use App\Subrayon;
use App\Cabang;  

class CountryController extends Controller
{
    public function provinces(){
      $provinces = Provinces::all();
      return view('frontend/personal/create', compact('provinces'));
    }

    public function regencies(){
      $provinces_id = Input::get('province_id');
      $regencies = Regencies::where('province_id', '=', $provinces_id)->get();
      return response()->json($regencies);
    }

    public function districts(){
      $regencies_id = Input::get('regencies_id');
      $districts = Districts::where('regency_id', '=', $regencies_id)->get();
      return response()->json($districts);
    }

    public function villages(){
      $districts_id = Input::get('districts_id');
      $villages = Villages::where('district_id', '=', $districts_id)->get();
      return response()->json($villages);
    }

    public function fill_kabupaten($provinsi_id){
      $kabupaten = Regencies::where('province_id', '=', $provinsi_id)->get();
      return $kabupaten; 
    }

    public function fill_kecamatan($kabupaten_id){
      $kecamatan = Districts::where('regency_id', '=', $kabupaten_id)->get();
      return $kecamatan; 
    }

    public function fill_kelurahan($kelurahan_id){
      $kelurahan = Villages::where('district_id', '=', $kelurahan_id)->get();
      return $kelurahan; 
    }

    public function rayon(){
      $rayon = Rayon::all();
      return view('frontend/personal/create', compact('rayon'));
    }

    public function subrayon(){
      $idsubrayona = Input::get('idrayon');
      $subrayon = Subrayon::where('idrayon', '=', $idsubrayona)->get();
      return response()->json($subrayon);
    }

    public function cabang(){
      $cabanga = Input::get('idsubrayon');
      $cabang = Cabang::where('idsubrayon', '=', $cabanga)->get();
      return response()->json($cabang);
    }

     public function fill_subrayon($idrayon){
      $subrayon = Subrayon::where('idrayon', '=', $idrayon)->get();
      return $subrayon; 
    }
    public function fill_cabang($idsubrayon){
      $rayon = Cabang::where('idsubrayon', '=', $idsubrayon)->get();
      return $rayon; 
    }
     public function fill_subrayon2($idrayon){
      $subrayon2 = Subrayon::where('idrayon', '=', $idrayon)->get();
      return $subrayon2; 
    }

    public function fill_cabang2($idsubrayon){
      $cabang2 = Cabang::where('idsubrayon', '=', $idsubrayon)->get();
      return $cabang2; 
    }




}
