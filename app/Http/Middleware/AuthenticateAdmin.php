<?php
/**
 * Created by PhpStorm.
 * User: hungnv
 * Date: 2/13/2017
 * Time: 10:32 PM
 */

namespace App\Http\Middleware;


use Closure;
use Illuminate\Support\Facades\Auth;

class AuthenticateAdmin
{
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->guest()) {
            if ($request->ajax() || $request->wantsJson()) {
                return response('Unauthorized.', 401);
            } else {
                return abort(401);
            }
        }
        return $next($request);
    }
}