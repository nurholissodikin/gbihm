<?php
namespace App\Http\Middleware;

use Closure;
use App\Libraries\Acl\Acl;
use Auth;

class AclMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = Auth::user();
        $role = 'Guest';
        if(!empty($user->role)){
            $role = $user->role->name;
        }  
        if(Acl::isAllowed($role)) return $next($request);
        abort(403, 'Forbidden');
    }
}
