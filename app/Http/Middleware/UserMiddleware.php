<?php

namespace App\Http\Middleware;

use App\Enum\RoleType;
use Closure;
use Illuminate\Support\Facades\Auth;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $role_id = Auth::user()->role_id;
        if ($role_id != RoleType::$USER) {
            abort(404);
        }
        return $next($request);
    }
}
