<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleManager
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, string $scope = '')
    {
        $mem_scope = Auth::user()->role->scope;
        if ($mem_scope != $scope)
            abort(403);
        return $next($request);
    }
}
