<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       if (Auth::user()->role->name == 'Pelayan') {
            if (Auth::user()->idpersonal == null) {
                # code...
                return redirect('/demo');
            }
            else{
                return view('backend.index');        
            }
           # code...
      
       }
       elseif (Auth::user()->role->name == 'Admin') {
        return view('backend.index');
       }
       elseif (Auth::user()->role->name == 'Admin cabang') {
        return view('backend.index');
       }
       elseif (Auth::user()->role->name == 'Gembala cabang') {
        return view('backend.index');
       }
        elseif (Auth::user()->role->name == 'Gembala Rayon') {
        return view('backend.index');
       }
        elseif (Auth::user()->role->name == 'Pusat') {
        return view('backend.index');
       }
        elseif (Auth::user()->role->name == 'Global_User') {
        return redirect('/demo');
       }
        return view('backend.index');
    }

}
