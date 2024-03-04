<?php

namespace App\Http\Controllers;

use App\Http\Resources\WineResource;
use App\Models\CellarHasWine;
use App\Models\Cellar;
use App\Models\Wine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB;

class CellarHasWineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function collection()
    {
        $collection = [];
        $cellars = Auth::user()->cellar;
        foreach($cellars as $cellar) {
            foreach($cellar->cellarHasWines as $cellarWine) {
                if(array_key_exists($cellarWine->wine_id, $collection)) {
                    $collection[$cellarWine->wine_id]['quantities']['totalQty'] += $cellarWine->quantity;
                    $collection[$cellarWine->wine_id]['quantities']['perCellar'][] = ['cellar' => $cellarWine->cellar, 'qty'=>$cellarWine->quantity];
                } else {
                    $wine = new WineResource($cellarWine->wine);
                    $wine = $wine->resolve();
                    $collection[$cellarWine->wine_id] = [
                        'wine'=> $wine,
                        'quantities' => [
                            'perCellar' => [['cellar' => $cellarWine->cellar, 'qty'=>$cellarWine->quantity]],
                            'totalQty' => $cellarWine->quantity,
                        ]
                    ];
                }
            }
        }
        return Inertia::render('CollectionView', compact('collection'));
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Cellar $cellar) {
        $collection = [];
        foreach($cellar->cellarHasWines as $wine) {
            $collection[] = ['wine' => $wine->wine, 'qty' => $wine->quantity];
        }
        return Inertia::render('Cellar/CellarWinesView', compact('collection'));
    }

    /**
     * Add one bottle 
     */
    public function addOne(Cellar $cellar, Wine $wine) {
        $target = CellarHasWine::find([$cellar->id, $wine->id]);
        $newQuantity = $target->quantity + 1;
        $target->update([
            'cellar_id'=> $cellar->id,
            'wine_id' => $wine->id,
            'quantity' => $newQuantity
        ]);
    }
    /**
     * Remove one bottle
     */
    public function removeOne(Cellar $cellar, Wine $wine) {
        $target = CellarHasWine::find([$cellar->id, $wine->id]);
        $newQuantity = $target->quantity -1;
        if($newQuantity >= 0) {
            $target->update([
                'cellar_id'=> $cellar->id,
                'wine_id' => $wine->id,
                'quantity' => $newQuantity
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Wine $wine)
    {   
        $cellars = Auth::user()->cellar;
        return Inertia::render('CellarWine/CreateView', compact('cellars', 'wine'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $target = CellarHasWine::find([$request->cellar_id, $request->wine_id]);
        if($target) {
            $newQuantity = $request->quantity + $target->quantity;
            $target->update([
                'cellar_id'=> $request->cellar_id,
                'wine_id' => $request->wine_id,
                'quantity'=> $newQuantity
            ]);
        } else {
            CellarHasWine::create([
                'cellar_id'=>$request->cellar_id,
                'wine_id' => $request->wine_id,
                'quantity'=> $request->quantity
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CellarHasWine  $cellarHasWine
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cellar $cellar, Wine $wine)
    {
        $cellarHasWine = new CellarHasWine;
        $cellarHasWine::where('cellar_id', $cellar->id)->where('wine_id', $wine->id)->delete();
        return redirect(route('cellar.show', $cellar))->with('timestamp', now());
    }

    public function destroyAllWine(Cellar $cellar)
    {
        try {
            DB::beginTransaction();
            CellarHasWine::where('cellar_id', $cellar->id)->delete();
            $cellar->delete();
            DB::commit();
            return redirect(route('cellar.index'));
        } catch (\Exception $e) {
            DB::rollback();
            return redirect(route('cellar.index'));
        }
    }
}
