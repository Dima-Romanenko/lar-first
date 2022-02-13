<?php

namespace App\Http\Middleware;

use App;
use Closure;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $locale = session('locale');
        App::setLocale($locale);
        return $next($request);
    }
}
