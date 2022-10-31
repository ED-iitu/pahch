<?php
/**
 * Copyright 2020, shakidevcom
 */

namespace App\Http\Middleware;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfUnauthenticated
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure                 $next
     * @param  ...$guards
     *
     * @return mixed
     */
    public function handle($request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->guest()) {
                if(request()->segment(1) === "admin"){
                    if (request()->has('token')) {
                        if ($user = User::where('api_token', request()->token)->first()) {
                            Auth::guard($guard)->loginUsingId($user->id,true);
                            return redirect()->to(RouteServiceProvider::ADMIN_HOME);
                        }
                    }
                    return redirect()->route('admin.auth.signin');
                }
                return redirect()->route('login',['return' => $request->path()]);
            }
        }

        return $next($request);
    }

}
