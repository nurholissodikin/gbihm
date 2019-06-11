<?php

namespace App\Http\Controllers\Acl;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Libraries\Acl\Models\Role;

class RoleController extends Controller
{

    public function index()
    {
        $role = Role::orderBy('name','asc')->get();
        return view('backend.user.role.index',compact('role'));
    }

    public function store(Request $request)
    {
        $role = new Role();
        $role->name=$request->name;
        $role->save();
         return redirect()->back();
    }
    public function update(Request $request,$id)
    {
        $role = Role::findOrfail($id);
        $role->name=$request->name;
        $role->save();

        return redirect('acl/role');
    }
    public function destroy($id)
    {
        $role = Role::findOrfail($id);
        $role->delete();
        return redirect()->back();
    }
    
}