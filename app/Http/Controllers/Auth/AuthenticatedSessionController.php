<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Inertia\Response
     */
    public function create()
    {
        return Inertia::render('Auth/LoginView');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();
        $request->session()->regenerate();
        // Récupérer l'utilisateur connecté, sa collection et ses celliers
        $user = Auth::user();
<<<<<<< HEAD
        $collection = [];
        $cellars = $user->cellar;
        foreach($cellars as $cellar) {
            foreach($cellar->cellarHasWines as $wine) {
                if(array_key_exists($wine->wine_id, $collection)) {
                    $collection[$wine->wine_id]['quantities']['totalQty'] += $wine->quantity;
                    $collection[$wine->wine_id]['quantities']['perCellar'][] = ['cellar' => $wine->cellar, 'qty'=>$wine->quantity];
                } else {
                    $collection[$wine->wine_id] = [
                        'wine'=> $wine->wine,
                        'quantities' => ['perCellar' => [['cellar' => $wine->cellar]],
                        'totalQty' => $wine->quantity
                    ]
                    ];
                }
            }
        }
        $collection = array_slice($collection, 0, 4);    
        if ($user->is_admin == '1') {
            return Inertia::render('Admin/DashboardView', compact('user'));
        }else{
            return Inertia::render('DashboardView', compact('user', 'cellars', 'collection'));
=======
        $cellars = $user->cellar()->limit(3)->get();    
        $wines = $user->wine()->limit(3)->get();
        // Si l'utilisateur est un admin
        if ($user->is_admin == '1') {
            return Inertia::render('Admin/DashboardView', compact('user'));
        }else{
            return redirect(route('dashboard'));
>>>>>>> 1f4a264e3c0e733eedf9fe0c283c0cb250e9077f
        }
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
