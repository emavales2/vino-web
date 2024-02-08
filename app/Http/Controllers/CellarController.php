<?php

namespace App\Http\Controllers;

use App\Models\Cellar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class CellarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cellars = Cellar::all();
        return Inertia::render('CellarList', compact('cellars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('CellarCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'min:3|max:100'
        ]);

        $userId = Auth::id();

        $newCellar = Cellar::create([
            'name' => $request->name,
            'user_id' => $userId
        ]);

        return redirect(route('cellar.show', $newCellar->id))->withSuccess('Cellier créée avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cellar  $cellar
     * @return \Illuminate\Http\Response
     */
    public function show(Cellar $cellar)
    {
        $userId = Auth::id();

        if ($cellar->user_id != $userId) {
            return redirect(route('cellar.index'))->withErrors("Vous n'avez pas l'autorisation d'accéder à cet cellier");
        }

        return Inertia::render('CellarShow', compact('cellar'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cellar  $cellar
     * @return \Illuminate\Http\Response
     */
    public function edit(Cellar $cellar)
    {
        $userId = Auth::id();

        if ($cellar->user_id != $userId) {
            return redirect(route('cellar.index'))->withErrors("Vous n'avez pas l'autorisation d'accéder à cet cellier");
        }

        return Inertia::render('CellarEdit', compact('cellar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cellar  $cellar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cellar $cellar)
    {
        $request->validate([
            'name' => 'min:3|max:255'
        ]);

        $userId = Auth::id();

        $cellar->update([
            'name' => $request->name
        ]);

        return redirect(route('cellar.show', $cellar->id))->withSuccess('Cellier modifiée avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cellar  $cellar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cellar $cellar)
    {
        //TO DO: Vérifie s'il y a un enregistrement dans la table Cellar_has_wines avant de le supprimer.
        $cellar->delete();

        return redirect(route('cellar.index'))->withSuccess(trans('Cellier supprimé avec succès'));
    }
}
