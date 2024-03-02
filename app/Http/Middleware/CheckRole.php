<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): mixed  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): mixed
    {
        if (!$request->user() || !in_array($request->user()->role, $roles)) {
            return redirect()->route('login');
        }
        return $next($request);
    }
}
