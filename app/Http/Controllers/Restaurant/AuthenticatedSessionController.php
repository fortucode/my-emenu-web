<?php

namespace App\Http\Controllers\Restaurant;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RestoLoginRequest;
//use App\Providers\RouteServiceProvider;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

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
    public function store(Request $request)//: RedirectResponse
    {
        // $request->authenticate();

        $validated = $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ]);
 
        // dd(Auth::guard('restaurant')->attempt($validated));

        // Vérification pour le guard restaurant
        if (Auth::guard('restaurant')->attempt($validated)) {
            $request->session()->regenerate();
            return redirect()->intended(route('dashboard')); // Redirection après connexion
            

        }

        // Par défaut, essaye avec le guard "web"
        // if (Auth::attempt($credentials)) {
        //     $request->session()->regenerate();
        //     return redirect()->intended(); // Redirection après connexion normale
        // }

        // $request->session()->regenerate();

        // return redirect()->intended(RouteServiceProvider::HOME);

    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('restaurant')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->intended('/');
    }
}
