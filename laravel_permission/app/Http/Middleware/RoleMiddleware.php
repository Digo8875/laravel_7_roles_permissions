<?php

namespace App\Http\Middleware;

use Closure;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $filter_method, $roles)
    {
        $user = auth()->user();

        if(is_null($user)) {
            return redirect()->route('login');
        }

        switch($filter_method){
            case 'required_one_role':
                if($user->hasRole($roles))
                    return $next($request);
                break;

            case 'required_all_roles':
                if($user->hasAllRoles($roles))
                    return $next($request);
                break;

            default:
                # code...
                break;
        }

        return abort(403, 'Acesso não autorizado'.'.');
    }
}
