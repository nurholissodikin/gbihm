<?php

namespace App\Http\Controllers;
use App\Ptamukhusus;
use App\Jabatanpelayanan;
use Illuminate\Http\Request;
use Auth;
use Crypt;
use App\Provinces;
use App\Personal;
use App\Profesi;
use App\Rayon;
use App\Kkj;
use App\Pelayanan;
use App\Vuser;
use App\Pendidikan;

class MdpjController extends Controller
{
    //

    public function approve_gembala_rayon($id)
    {
              
        $tamu = Jabatanpelayanan::findOrFail($id);
        $tamu->approve_gembala_rayon = '1';
          $tamu->status_badge = '1';
        $tamu->save();
        return redirect()->back();
    
    }
    public function pengerja_approve_gembalacabang($id)
    {
              
        $tamu = Jabatanpelayanan::findOrFail($id);
        $tamu->approve_gembala_cabang = '1';
      
        $tamu->save();
        return redirect()->back();
    
    }
    public function pengerja_approve_admin_rayon($id)
    {
              
        $tamu = Jabatanpelayanan::findOrFail($id);
        $tamu->approve_rayon = '1';
        $tamu->save();
        return redirect()->back();
    
    }
    public function kirim_gembalarayon($id)
    {
              
        $tamu = Jabatanpelayanan::findOrFail($id);
        $tamu->approve_gembala_rayon = '0';
        $tamu->save();
        return redirect()->back();
    
    }
    
    public function kirim_adminrayon($id)
    {
        $tamu = Jabatanpelayanan::findOrFail($id);
        $tamu->approve_rayon = '0';
        $tamu->save();
        return redirect()->back();
    }
    
    public function kirim_mdpj_approve_all(Request $request)
    {
        $all = [];
        $kirim = $request->kirim;

        
        foreach ($kirim as $id_kirim => $approve) {
            $jab = Jabatanpelayanan::findOrfail($id_kirim);
            $jab->approve_gembala_cabang = $approve;

            $jab->save();

        }
     
      return redirect()->back();
       
        // return redirect()->back();
    }
    public function kirim_adminrayon_all(Request $request)
    {
        $all = [];
        $kirim = $request->kirim;

        
        foreach ($kirim as $id_kirim => $approve) {
            $jab = Jabatanpelayanan::findOrfail($id_kirim);
            $jab->approve_rayon = $approve;
            $jab->save();

        }
           
        return redirect()->back();
    }
    public function kirim_gembalarayon_all(Request $request)
    {
        
        $kirim = $request->kirima;
        
        foreach ($kirim as $approvea => $id_kirim) {

            $jab = Jabatanpelayanan::findOrfail($id_kirim);
            $jab->approve_gembala_rayon = $approvea;
            $jab->save();

        }
           
        return redirect()->back();
    }

    public function pusat($id)
    {
              
        $tamu = Jabatanpelayanan::findOrFail($id);
        $tamu->status_order = '1';
        $tamu->save();
        return redirect()->back();
    
    }
    public function admin_rayon($id)
    {
              
        $tamu = Jabatanpelayanan::findOrFail($id);
        $tamu->approve_rayon = '1';
        $tamu->save();
        return redirect()->back();
    
    }
    public function kirim_pusat($id)
    {
              
        $tamu = Jabatanpelayanan::findOrFail($id);
        $tamu->status_order = '0';
        $tamu->save();
        return redirect('mdpj/cetak_badge');
    
    }

    public function index_gembalacabang()
    {
        $user = Auth::user();
        if ($user->role_id=='7') {
            # code...
             $jabpel = Jabatanpelayanan::whereNull('jeniscool')->where('idcabangranting',$user->cabang_id)->whereNotNull('approve_gembala_cabang')->get();
        }else{
            $jabpel = Jabatanpelayanan::whereNull('jeniscool')->whereNotNull('approve_gembala_cabang')->get();
        }
        $tamukhusus = Ptamukhusus::all();

        $cool = Jabatanpelayanan::whereNotNull('jeniscool')->whereNotNull('approve_gembala_cabang')->get();
       
        return view('frontend.badge.approve.gembalacabang.index',compact('tamukhusus','jabpel','cool'));
    }
    public function index_adminrayon()
    {
        $user = Auth::user();
        $vuser = Vuser::where('idpersonal',$user->idpersonal)->first();

        if ($vuser->role_id=='8') {
            # code...
             $jabpel = Jabatanpelayanan::whereNull('jeniscool')->where('idrayon',$vuser->jab_rayon)->whereNotNull('approve_rayon')->get();
        }else{
            $jabpel = Jabatanpelayanan::whereNull('jeniscool')->whereNotNull('approve_rayon')->get();
        }
        $tamukhusus = Ptamukhusus::all();
        $cool = Jabatanpelayanan::whereNotNull('jeniscool')->whereNotNull('approve_rayon')->get();
        return view('frontend.badge.approve.rayon.index',compact('tamukhusus','jabpel','cool'));
    }
    public function index_gembalarayon()
    {
        $tamukhusus = Ptamukhusus::all();
        $cool = Jabatanpelayanan::whereNotNull('jeniscool')->whereNotNull('approve_gembala_rayon')->get();
        $jabpel = Jabatanpelayanan::whereNull('jeniscool')->whereNotNull('approve_gembala_rayon')->get();
        return view('frontend.badge.approve.gembalarayon.index',compact('tamukhusus','jabpel','cool'));
    }
    public function index_pusat()
    {
        $tamukhusus = Ptamukhusus::all();
        $cool = Jabatanpelayanan::whereNotNull('jeniscool')->whereNotNull('approve_gembala_rayon')->get();
        $jabpel = Jabatanpelayanan::whereNull('jeniscool')->whereNotNull('status_order')->get();
        return view('frontend.badge.approve.pusat.index',compact('tamukhusus','jabpel','cool'));
    }

    public function badge()
    {
        $user = Auth::user();
    
        if($user->role->name == 'Pelayan'){
            $badge = Jabatanpelayanan::whereNotNull('status_badge')->where('idpersonal',$user->idpersonal)->get();
        }else{
    	   $badge = Jabatanpelayanan::whereNotNull('status_badge')->get();
    	}
        return view('frontend.badge.cetakbadge.cabang.index',compact('badge'));
    }
    public function badge_detail($id)
    {
    	$badge = Jabatanpelayanan::findOrfail($id);
    	return view('frontend.badge.cetakbadge.cabang.detail',compact('badge'));
    }
    public function badge_order($id)
    {
    	$badge = Jabatanpelayanan::findOrfail($id);
    	return view('frontend.badge.cetakbadge.cabang.pembayaran',compact('badge'));
    }
    public function badge_cetak($id)
    {
    	$badge = Jabatanpelayanan::findOrfail($id);
    	return view('frontend.badge.cetakbadge.cabang.cetak',compact('badge'));
    }    

    public function pengerja($id){

        $jabpel = Jabatanpelayanan::FindOrfail($id);
        $provinces = Provinces::all();
        $prof = Profesi::all();
        $personal = Personal::all();
        $rayon = Rayon::all();
        $kkj = Kkj::where('idpersonal',$jabpel->idpersonal)->first();
         $pendidikan = Pendidikan::where('idpersonal',$jabpel->idpersonal)->first();
        $pelayanan = Pelayanan::where('idpersonal',$jabpel->idpersonal)->first();
        
        $user = Auth::user();
        if($user->form == 'PENGERJA'){
             return view('frontend.badge.edit.pengerja',compact('jabpel','provinces','prof','personal','rayon','kkj','pelayanan','pendidikan'));
        }
        else if($user->form == 'COOL'){
            return view('frontend.badge.edit.cool',compact('jabpel','provinces','prof','personal','rayon','kkj','pelayanan','pendidikan'));
        }
       
        
    }
     
}