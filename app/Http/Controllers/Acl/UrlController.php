<?php

namespace App\Http\Controllers\Acl;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Libraries\Acl\Models\Url;

class UrlController extends Controller
{

    public function index()
    {
        $url = Url::orderBy('url', 'Asc')->get();
        return view('backend.user.url.index',compact('url'));
    }

    public function store(Request $request)
    {
        $url = new Url();
        $url->url=$request->url;
        $url->save();
        return redirect()->back();
    }
    public function update(Request $request,$id)
    {
        $url = Url::findOrfail($id);
        $url->url=$request->url;
        $url->save();
        return redirect('acl/url');
    }
    public function destroy($id)
    {
        $url = Url::findOrfail($id);
        $url->delete();
        return redirect()->back();
    }
    
}