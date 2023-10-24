<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, $role)
    {
        $user = auth()->user();
        $roleName = $this->getRoleName($role);
        //Checks the users role
        if ($user && $user->role === (int)$role) {
            return $next($request);
        } else {
        //Dynamic error message
            abort(403, "Unauthorized action; Current Role: {$this->getRoleName($user->role)} Required Role: $roleName");
        }
    }

    protected function getRoleName($role)
    {
        //Proper name display error message
        return $role === '1' ? 'User' : ($role === '2' ? 'Admin' : 'User');
    }
}
