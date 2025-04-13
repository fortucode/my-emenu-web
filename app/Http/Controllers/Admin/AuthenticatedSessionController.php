<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
//use App\Http\Requests\Auth\RestoLoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.admin-login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(Request $request): RedirectResponse
    {
        // $request->authenticate();

        $validated = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);
 
        // dd(Auth::guard('admin')->attempt([
        //     'email' => $request->email,
        //     'password' => $request->password]));

        // Vérification pour le guard admin
        if (Auth::guard('admin')->attempt($validated)) {
            $request->session()->regenerate();
            return redirect()->intended(route('admin.dashboard')); // Redirection après connexion
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
        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }

}
