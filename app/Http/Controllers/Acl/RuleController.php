<?php

namespace App\Http\Controllers\Acl;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Libraries\Acl\Acl;
use App\Libraries\Acl\Models\Rule;
use App\Libraries\Acl\Models\Role;
use App\Libraries\Acl\Models\Url;

class RuleController extends Controller
{

    public function index(Request $request)
    {
    	Acl::updateUrl();
        $rule = Rule::all();
        $urls = Url::orderBy('url', 'Asc')->get();
        $role_id = $request->role_id;
        $selected_role = 0;
        if($role_id){
        	$selected_role = $request->role_id;
        	$current_rules = Rule::where('role_id',$role_id)->get();
        	// dd($current_rules);
        }
        return view('backend.user.rule.index',compact('rule','urls','role_id','selected_role','current_rules'));
    }

    public function update(Request $request,$role_id)
    {
    	$rules = [];
    	$resource_rule = $request->rules;
    	foreach ($resource_rule as $resource_id => $access) {
    		$rules[$resource_id] = ['access' => $access];
    	}
    	
    	$role = Role::findorFail($role_id);
    	$role->urls()->sync($rules);
    	return redirect()->back();
    }
    
}