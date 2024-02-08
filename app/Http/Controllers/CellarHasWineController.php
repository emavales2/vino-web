<?php

namespace App\Http\Controllers;

use App\Models\CellarHasWine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class CellarHasWineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * Display the specified resource.
     *
     * @param  \App\Models\CellarHasWine  $cellarHasWine
     * @return \Illuminate\Http\Response
     */
    public function show(CellarHasWine $cellarHasWine)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CellarHasWine  $cellarHasWine
     * @return \Illuminate\Http\Response
     */
    public function edit(CellarHasWine $cellarHasWine)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CellarHasWine  $cellarHasWine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CellarHasWine $cellarHasWine)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CellarHasWine  $cellarHasWine
     * @return \Illuminate\Http\Response
     */
    public function destroy(CellarHasWine $cellarHasWine)
    {
        //
    }
}
