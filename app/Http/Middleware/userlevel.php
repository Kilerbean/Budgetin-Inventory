<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class userlevel
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next,...$leveluser): Response
    {
        $userLevel = $request->user()->leveluser;
        if (is_int($userLevel) && in_array($userLevel, $leveluser)) {
            return $next($request);
        }
        return back()->with('info','anda tidak memiliki akses untuk melanjutkan,konfirmasi ke admin');
    }
}
