<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TrackVisitor
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $ip = $request->ip();
        $date = \Carbon\Carbon::today()->toDateString();
        \App\Models\Visitor::firstOrCreate([
            'ip_address' => $ip,
            'date' => $date
        ]);

        return $next($request);
    }
}
