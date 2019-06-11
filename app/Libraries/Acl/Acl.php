<?php
namespace App\Libraries\Acl;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use App\Libraries\Acl\Models\Url;
use App\Libraries\Acl\Models\Role;
use App\Libraries\Acl\Models\Rule;
/**
* @author Sodikin 
*/
class Acl
{
    //
    public static function updateUrl()
    {
        $routes = Route::getRoutes();
        $urls = [];

        foreach ($routes as $route) {
            $url = $route->uri;
            $url = trim(preg_replace('/\s*\{[^)]*\}/', '*', $url));
            $urls[] = $url;
        }

        foreach ($urls as $url) {
            $check = Url::where('url', $url)->count();
            if($check == 0){
                $nUrl = new Url();
                $nUrl->url = $url;
                $nUrl->save();
            }
            // echo $url.'<br>';
        }
    }

    public static function checkUrl($current = ''){
        self::updateUrl();
        $urls = Url::all();
        foreach ($urls as $url) {
            $isAllow = Request::is($url->url);
            if($isAllow){
                return $url;
            }
        }
    }
    public static function isAllowed($role_name){
        $find_url = Self::checkUrl();
        $role = Role::where('name', $role_name)->first();
        $rule = Rule::where('role_id', $role->id)->where('url_id', $find_url->id)->first();
        $access = false;
        if(!empty($rule)){
            if($rule->access == "allow"){
                $access = true;
            }else{
                $access = false;
            }
        }
        return $access;
    }

   
  
}
