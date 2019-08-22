<?php

namespace App\Http\Middleware;

use Closure;

class AgeMiddleware
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
        $age = 18;

        if (request()->route('post')->is_for_kids || (!request()->route('post')->is_for_kids && $age >= 18)) {
            return $next($request);
        } else {
            return redirect()->route('posts.index');
        }
    }
}
