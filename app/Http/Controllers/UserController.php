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
        return Inertia::render(('HomeView'));
    }

    /**
     * Display the dashboard of the authentificated user.
     */ 
    public function dashboard(): Response
    {
        $user = Auth::user();
        $cellars = $user->cellar()->limit(3)->get();
        return Inertia::render('DashboardView', [
            'user' => $user,
            'cellars' => $cellars
        ]);
    }
    /**
     * Display a listing of the resource. For the admin only.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Users/UsersView', [
            'users' => User::all()
        ]);
    }

    /**
     * Display the specified resource. For the admin only.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return Inertia::render('Users/ProfileView', [
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return Inertia::render('Users/EditView', [
            'user' => $user
        ]);
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
        // Je ne recois pas la variable success !!!????
        return Inertia::render('Users/ProfileView', [
            'user' => $user,
            'success' => 'Profile updated successfully'
        ]);
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
            return Inertia::location(route('users.index', ['success' => 'User deleted successfully']));
        }
        return Inertia::location(route('home'));
    }

}
