<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckLoginCount
{
    public function handle($request, Closure $next)
    {
        $user = Auth::user();

        //If the user has 3 or more logins allow access
        if ($user && $user->login_count >= 3) {
            return $next($request);
        }

        return redirect('/')->with('error', 'You must have at least 3 logins to access this page.');
    }
}

