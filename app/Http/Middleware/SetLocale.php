<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $langPrefix = ltrim($request->route()->getPrefix(),'/');

        if (session()->has('locale')) {
            App::setlocale(session()->get('locale'));
        } else {
            if($langPrefix) {
                if (!in_array($langPrefix, config('app.locales'))) {
                    App::setLocale('ru');
                    session()->put('locale', 'ru');
                } else {
                    App::setLocale($langPrefix);
                    session()->put('locale', $langPrefix);
                }
            }
        }

        return $next($request);
    }
}
