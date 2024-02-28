<?php

namespace App\Http\Controllers;

use App\Models\Cellar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\WineResource;
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
        $cellars = Auth::user()->cellar;

        return Inertia::render('Cellar/CellarsView', compact('cellars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Cellar/CreateView');
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

        return redirect(route('cellar.index', $newCellar->id))->withSuccess('Cellar successfully created');
    }


    public function searchAuto(Request $request)
    {
        $term = $request->input('term');
        $cellarId = $request->input('cellarId');

        $cellar = Cellar::find($cellarId);

        $collection = [];

        foreach ($cellar->cellarHasWines as $Wine) {
            $wine = $Wine->wine;
        
            if (stripos($wine->name, $term) !== false) {
                $collection[] = ['wine' => $wine, 'qty' => $Wine->quantity];
            }
        }

        return Inertia::render('Cellar/ShowView', compact('cellar','collection','term'));
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
            return redirect(route('cellar.index'))->withErrors("You do not have authorization to access this cellar");
        }
        // Vérifier le nombre de caves associées à cet utilisateur
        $numCellars = Auth::user()->cellar->count();

        $collection = [];
        foreach($cellar->cellarHasWines as $cellarWine) {
            $wine = new WineResource($cellarWine->wine);
            $wine = $wine->resolve();
            $collection[] = ['wine' => $wine, 'qty' => $cellarWine->quantity];
        }

        return Inertia::render('Cellar/ShowView', compact('cellar','collection','numCellars'));
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
            return redirect(route('cellar.index'))->withErrors("You do not have authorization to access this cellar");
        }

        return Inertia::render('Cellar/EditView', compact('cellar'));
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

        if ($cellar->user_id != $userId) {
            return redirect(route('cellar.index'))->withErrors("You do not have authorization to access this cellar");
        }        

        $cellar->update([
            'name' => $request->name
        ]);

        return redirect(route('cellar.show', $cellar->id))->withSuccess('Cellar modified successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cellar  $cellar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cellar $cellar)
    {
        $userId = Auth::id();

        // dans ma tête, ce n'était deja pas possible d'acceder ici manuellement
        if ($cellar->user_id != $userId) {
            return redirect(route('cellar.index'))->withErrors("You do not have authorization to access this cellar");
        }
        
        //to discuss
        $hasWines = $cellar->cellarHasWines()->exists();

        if ($hasWines) {
            return redirect(route('cellar.index'))->withError('Unable to delete cellar. Wines are associated with it.');
        }

        $cellar->delete();

        return redirect(route('cellar.index'))->withSuccess('Cellar deleted successfully');
    }
}
