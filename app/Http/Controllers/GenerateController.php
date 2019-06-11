<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Personal;
use Mail;
use Auth;
use Hash;
use App\Vuser;
use App\Mail\PengerjaEmail;
use Illuminate\Support\Facades\Crypt;

class GenerateController extends Controller
{
    //

	public function index(){
		$user = User::where('name','!=','Admin')->get();
		$personal = Personal::all();
		
		return view('frontend.generate.index',compact('user','personal'));
	}

    public function randomString($length = 6) {
	    
	    $str = "";
	    $stra = "";
	    $characters = array_merge(range('A','Z'), range('a','z'), range('0','9'));
	    $max = count($characters) - 1;
	    	for ($i = 0; $i < $length; $i++) {
	        	$rand = mt_rand(0, $max);
	        	$str .= $characters[$rand];
	    	}	    
	    $charactersa = array_merge(range('0','9'));
	    $maxa = count($charactersa) - 1;
	    	for ($ia = 0; $ia < $length; $ia++) {
	        	$ranad = mt_rand(0, $maxa);
	        	$stra .= $charactersa[$ranad];
	    	}
	    $auto = [];
        $auto['rtr'] = $str;
        $auto['pw'] = $stra;
        

        return $auto;
	}

	public function generate(Request $request){
		
		$usera = Auth::user();
        $vuser = Vuser::where('idpersonal',$usera->idpersonal)->first();
		$user = new User;
		$user->name='Pelayan';
		$user->username=$request->username;
		$user->password = bcrypt($request->pw);
		$user->form=$request->form;
		$user->cabang_id = $vuser->jab_cabang;
		$user->role_id = '4';
		$user->pw_text = $request->pw;
		$user->save();
		return redirect()->back();
	}
	public function pelayan_verif(Request $request)
	{
		$last_per = Personal::orderBy('idpersonal','DESC')->first();
        $idper = ($last_per != null) ? $last_per->idpersonal+1: '1';
        
        $personal = new Personal;
        $personal->idpersonal=$idper;
        $personal->namalengkap=$request->namalengkap;
        $personal->email=$request->email;
        $personal->nohp=$request->nohp;
        $personal->save();
        
        Mail::to($personal->email)->send(new PengerjaEmail($personal));

        $user = new User;
		$user->username=$personal->idpersonal;
		$user->name=$personal->namalengkap;
		$user->idpersonal = $personal->idpersonal;
		$user->password = bcrypt('rahasia');
		$user->form=$request->form;
		$user->role_id = '4';
		$user->save();
		
		// $user = User::find($request->user);
		// $user->username=$personal->idpersonal;
		// $user->name=$personal->namalengkap;
		// $user->idpersonal = $personal->idpersonal;
		// $user->save();
 		Auth::logout();
		return view('mails.lanjutan',compact('personal'));
	}
	public function user_delete($id)
	{
		$user = User::findOrfail($id);
		$user->delete();
		return $user;
	}
	public function change_pw(Request $request )
    {

        $user = User::where('idpersonal',$request->id)->first();

        $user->password=bcrypt($request->password);
        $user->save();

        $personal = Personal::find($user->idpersonal);
        $personal->verifikasi = '1';
        $personal->save();
        $this->validate($request, [
            'email' => 'email|exists:users,email',
            'password' => 'required',
        ]);
        $attempts = [
            'email' => $request->email,
            'password' => $user->password,
        ];
        if (Auth::attempt($attempts, (bool) $request->remember)) {
            $role = Auth::user()->role_id;

        return redirect('/daftarsendiri');
        }
        
    }


	
		
}
