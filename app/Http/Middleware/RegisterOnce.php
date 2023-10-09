<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;

class RegisterOnce
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
        if (User::count() !== 0) {
            // you can redirect wherever you want
            return redirect('login');
        }

        return $next($request);
    }
}
