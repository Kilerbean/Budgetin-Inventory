<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\QCSession;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\Auth\LoginRequest;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $user= User::where('email',strtolower($request->email))->first();
        $sessions = QCSession::where('user_id', $user->id)->get();
        foreach($sessions as $session){
            $session->delete();
        }
        //dd($sessions->count());
        if($sessions->count()>0){
            return back()->with('error','Failed...You have log in on another device (IP : '.$sessions->first()->ip_address .')');
            
        }        
        
        $request->authenticate();

        $request->session()->regenerate();
        
        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
