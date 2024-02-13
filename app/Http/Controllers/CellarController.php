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
        //this
/*         $userId = Auth::id();
        $cellars = Cellar::where('user_id', $userId)->get(); */
        //could be
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

        return redirect(route('cellar.show', $newCellar->id))->withSuccess('Cellar successfully created');
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
        
        $collection = [];
        foreach($cellar->cellarHasWines as $wine) {
            $collection[] = ['wine' => $wine->wine, 'qty' => $wine->quantity];
        }

        return Inertia::render('Cellar/ShowView', compact('cellar','collection'));
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

        if ($cellar->user_id != $userId) {
            return redirect(route('cellar.index'))->withErrors("You do not have authorization to access this cellar");
        }
        
        $hasWines = $cellar->cellarHasWines()->exists();

        if ($hasWines) {
            return redirect(route('cellar.index'))->withError('Unable to delete cellar. Wines are associated with it.');
        }

        $cellar->delete();

        return redirect(route('cellar.index'))->withSuccess('Cellar deleted successfully');
    }
}
