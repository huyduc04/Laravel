<?php
namespace App\Http\Middleware;

use Closure;
use Jenssegers\Agent\Agent;

class CheckDevice
{
    public function handle($request, Closure $next)
    {
        $agent = new Agent();


        if (!$agent->isMobile()) {
            return redirect('/');
        }

        return $next($request);
    }
}
