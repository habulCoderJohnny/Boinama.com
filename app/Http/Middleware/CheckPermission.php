<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $this->checkPermission($request);
        return $next($request);
    }
    public function checkPermission(Request $request)
    {
        if (!auth()->user()->role) {
            notify()->error("You are not authorized for this route");
            return back();
        }
        $currentRouteName = $request->route()->getName();
        $permissions = auth()->user()->role->permissions;
        $permissions = $permissions->pluck("name");
        if (!$permissions->contains($currentRouteName)) {
            return back();
        }
    }
}
