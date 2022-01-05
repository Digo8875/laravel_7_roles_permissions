<?php

namespace App\Http\Middleware;

use Closure;

class PermissionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $permission)
    {
        $user = auth()->user();

        if(is_null($user)) {
            return redirect()->route('login');
        }

        if($user->can($permission))
            return $next($request);

        return abort(403, 'Acesso não autorizado'.'.');
    }
}
