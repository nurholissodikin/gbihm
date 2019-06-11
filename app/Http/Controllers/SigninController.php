<?php
namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
class SigninController extends Controller
{
    public function form()
    {
        return view('auth.signin');
    }
    public function attempt(Request $request)
    {
        $this->validate($request, [
            'email' => 'email|exists:users,email',
            'password' => 'required',
        ]);
        $attempts = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if (Auth::attempt($attempts, (bool) $request->remember)) {
            return redirect()->intended('/home');
        }
        return redirect()->back();
    }
}