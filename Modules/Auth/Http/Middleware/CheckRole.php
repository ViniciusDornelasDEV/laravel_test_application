<?php

namespace Modules\Auth\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    public function handle(Request $request, Closure $next)
    {
        /*if (!auth()->check() || !in_array(auth()->user()->role, $roles)) {
            //abort(403, 'Acesso não autorizado');
        }*/
        return $next($request);
    }
}
