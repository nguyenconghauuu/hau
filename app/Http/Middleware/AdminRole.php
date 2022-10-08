<?php

namespace App\Http\Middleware;

use App\Http\Utils\AppUtils;
use Closure;
use Illuminate\Support\Facades\Auth;

class AdminRole
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
        $user = Auth::user();
        if($user->role != AppUtils::ROLE_ADMIN){
            return redirect()->route('user.index');
        }
        return $next($request);
    }
}
