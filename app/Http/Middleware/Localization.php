<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class Localization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (session()->has('locale')) {
            App::setLocale(session()->get('locale'));
        } elseif ($request->hasCookie('locale')) {
            session()->put('locale', $request->cookie('locale'));
        } else {
            session()->put('locale', App::getLocale());
        }

        return $next($request);
    }
}
