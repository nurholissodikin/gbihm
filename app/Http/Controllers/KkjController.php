<?php

namespace App\Http\Controllers;

use App\Kkj;
use Illuminate\Http\Request;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;
use DB;
use App\Personal;  

class KkjController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $kkj= Kkj::all();
         $per = DB::select('SELECT * FROM personal WHERE nokkj IS NULL');
        return view('frontend.kkj.index',compact('kkj','per'));
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
         $a= Kkj::all();
        $countz=count($a);
        $idd=$countz+1;
        $rules = array(
              

        'dokumen' => 'required'       );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Response::json(array(

                    'errors' => $validator->getMessageBag()->toArray(),
            ));
        } else {
          $kkj=new Kkj;
        $kkj->id=$idd;
        $kkj->idpersonal=$request->personal;
        $kkj->telpdarurat=$request->telpdarurat;
      if ($request->hasFile('dokumen')) {
                $kk = $request->file('dokumen');
                $extension = $kk->getClientOriginalExtension();
                $filenamedo = str_random('6'). '.' .$extension;
                $destinationPath = public_path() . 
                    DIRECTORY_SEPARATOR . 'assets/file';
                    $kk->move($destinationPath, $filenamedo);
                       $kkj ->dokumen = $filenamedo;
                    }
                    $kkj->save();

           return response ()->json ( $kkj );
        }
       

        
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kkj  $kkj
     * @return \Illuminate\Http\Response
     */
    public function show(Kkj $kkj)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kkj  $kkj
     * @return \Illuminate\Http\Response
     */
    public function edit(Kkj $kkj)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kkj  $kkj
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kkj $kkj)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kkj  $kkj
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Data::find($id)->delete();

        return response()->json();
    }

    public function get_data($id_personal){
        $personal = Personal::where('idpersonal',$id_personal)->first();

        $auto = [];
        $auto['id_personal'] = $personal->idpersonal;
        $auto['nama_lengkap'] = $personal->namalengkap;
        $auto['jenis_kelamin'] = $personal->jeniskelamin;
        $auto['tanggal_lahir'] = $personal->tanggallahir;
        $auto['no_ktp'] = $personal->ktpid;

        return $auto;
    }
}
