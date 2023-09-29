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
        $userStatus=$request->user()->Status;
        $infoMassage='you dont have access to continue,need a higher user level';
        if (is_int($userLevel) && in_array($userLevel, $leveluser)&& $userStatus==1) {
            return $next($request);
        }
        if ($userStatus == 0) {
            $infoMassage = 'User Not Active';
        }

        return back()->with('info',$infoMassage);
    }
}
