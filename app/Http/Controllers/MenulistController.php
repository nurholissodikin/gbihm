<?php

namespace App\Http\Controllers;

use App\Menulist;
use App\Menu;
use Illuminate\Http\Request;

class MenulistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $menu = Menu::all();
        $menulist = Menulist::all();
        return view('backend.menu_list.index',compact('menu','menulist'));
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
        $menulist = new Menulist;
        $menulist->menu_id=$request->menu;
        $menulist->parent_id=$request->parent;
        $menulist->order=$request->order;
        $menulist->save();
        return redirect()->route('menulist.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Menulist  $menulist
     * @return \Illuminate\Http\Response
     */
    public function show(Menulist $menulist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Menulist  $menulist
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $menu = Menu::all();
        $menulist = Menulist::findorFail($id);
        return view('backend.menu_list.edit',compact('menu','menulist'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Menulist  $menulist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
        $menulist = Menulist::findorFail($id);
        $menulist->menu_id=$request->menu;
        $menulist->parent_id=$request->parent;
        $menulist->order=$request->order;
        $menulist->save();
        return redirect()->route('menulist.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Menulist  $menulist
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $menulist = Menulist::findorFail($id);
        $menulist->delete();
        return $menulist;
    }
}
