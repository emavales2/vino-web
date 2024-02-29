<?php

namespace App\Http\Controllers;

use App\Http\resources\WineResource;
use App\Models\BuyList;
use App\Models\Wine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class BuyListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = Auth::id();
        $cellars = Auth::user()->cellar;
        $buylist = Auth::user()->buylist;
        if($buylist) {
            foreach($buylist as &$item) {
                $wine = new WineResource($item->wine[0]);
                $item->newWine = $wine->resolve();
            }
        } else $buylist = [];
        return Inertia::render('BuyList/IndexView', compact('buylist', 'cellars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($wine_id)
    {
        $wine = Wine::findOrFail($wine_id);
        $wineData = [
            'id' => $wine->id,
            'name' => $wine->name,
            'photo' => $wine->photo,
        ];
        return Inertia::render('BuyList/CreateView', compact('wineData'));
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
            'quantity' => 'numeric|min:1'
        ]);

        $userId = Auth::id();

        $newBuyList = BuyList::create([
            'wine_id' => $request->wine_id,
            'user_id' => $userId,
            'quantity'=> $request->quantity
        ]);

        return redirect(route('buylist.index', $newBuyList->id));
    }

        /**
     * Add one bottle 
     */
    public function addOne(Wine $wine) {
        $target = BuyList::find([Auth::user()->id, $wine->id]);
        $newQuantity = $target->quantity + 1;
        $target->update([
            'user_id'=> Auth::user()->id,
            'wine_id' => $wine->id,
            'quantity' => $newQuantity
        ]);
    }
    /**
     * Remove one bottle
     */
    public function removeOne(Wine $wine) {
        $target = BuyList::find([Auth::user()->id, $wine->id]);
        $newQuantity = $target->quantity -1;
        if($newQuantity >= 0) {
            $target->update([
                'user_id'=> Auth::user()->id,
                'wine_id' => $wine->id,
                'quantity' => $newQuantity
            ]);
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BuyList  $buyList
     * @return \Illuminate\Http\Response
     */
    public function show(BuyList $buyList)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BuyList  $buyList
     * @return \Illuminate\Http\Response
     */
    public function edit(BuyList $buyList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BuyList  $buyList
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BuyList $buyList)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BuyList  $buyList
     * @return \Illuminate\Http\Response
     */
    public function destroy($wine_id)
    {
        $userId = Auth::id();
        $buylist = BuyList::where('user_id', $userId)->where('wine_id', $wine_id)->first();

        if ($buylist) {
            $buylist->delete();
            return redirect(route('buylist.index'));

        } else {
            return redirect(route('buylist.index'));
        }
    }
}
