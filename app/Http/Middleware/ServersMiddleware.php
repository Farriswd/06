<?php

namespace App\Http\Middleware;

use App\Models\Server;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Symfony\Component\HttpFoundation\Response;

class ServersMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $globalServers = Server::all();
        if ($globalServers->count() > 0 ) View::share('globalServers', $globalServers);
        return $next($request);
    }
}
