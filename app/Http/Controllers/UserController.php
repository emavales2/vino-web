<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Cellar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;

class UserController extends Controller
{
    /**
     * Display the welcome page for the application.
     */
    public function welcome(): Response
    {
        return Inertia::render('HomeView');
    }

    /**
     * Display the dashboard of the authentificated user.
     */ 
    public function dashboard(): Response
    {
        $user = Auth::user();
        $cellars = $user->cellar()->limit(3)->get();
        $wines = $user->wine()->limit(3)->get();
        return Inertia::render('DashboardView', compact('user', 'cellars', 'wines'));
    }
    /**
     * Display a listing of the resource. For the admin only.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Users/UsersView', compact('users'));
    }

    /**
     * Display the specified resource. For the admin only.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return Inertia::render('Users/ProfileView', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return Inertia::render('Users/EditView', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'first_name' => 'regex:/^[a-zA-Z\s]+$/u|max:100|min:2|nullable',
            'last_name' => 'regex:/^[a-zA-Z\s]+$/u|max:100|min:2|nullable',
            'email' => 'required|string|email|max:255'
        ]);
        $user = User::find($request->id);
        $user->update($request->all());
        return Inertia::render('Users/ProfileView', compact('user'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        User::destroy($user->id);
        if (Auth::check() && Auth::user()->is_admin == 1) {
            return Inertia::location(route('users.index'));
        }
        return Inertia::location(route('home'));
    }

}
