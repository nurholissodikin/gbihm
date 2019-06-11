<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Hash;
use App\User;
use App\Personal;
use Illuminate\Support\Facades\Input;

class ChangePasswordController extends Controller
{
    public function resetPassword(Request $request)
    {

       

        $this->validate($request, [
            //'currentPassword' => 'required|min:6',
            'password' => 'required|min:6|confirmed',
        ]);

        $input = Input::all();
        $user = User::where('idpersonal',$input['id'])->first();
        $user->password = bcrypt($input['password']);
        $user->save();
         $personal = Personal::findOrfail($user->idpersonal);
         $personal->verifikasi = '1';
         $personal->save();     
        \Auth::login($user);

       return redirect('/daftarsendiri');
    }
}
