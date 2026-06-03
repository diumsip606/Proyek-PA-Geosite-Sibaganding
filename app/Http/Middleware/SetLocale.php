<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class SetLocale
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        // ambil bahasa dari session (default: id)
        $lang = session('lang', 'id');

        // set bahasa ke Laravel
        App::setLocale($lang);

        // Track unique visitor sessions
        if (!$request->is('admin*') && !$request->is('login*') && !$request->is('logout*') && !$request->ajax()) {
            if (!session()->has('has_visited')) {
                session(['has_visited' => true]);
                \Illuminate\Support\Facades\Cache::forever(
                    'total_views',
                    (\Illuminate\Support\Facades\Cache::get('total_views', 0) + 1)
                );
            }
        }

        return $next($request);
    }
}