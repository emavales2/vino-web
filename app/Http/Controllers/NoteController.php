<?php

namespace App\Http\Controllers;

use App\Http\resources\WineResource;
use App\Models\Note;
use App\Models\Wine;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Inertia\Inertia;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function wineIndex(Wine $wine)
    {
        $notes = Note::where('user_id', Auth::id())
            ->where('wine_id', $wine->id)
            ->get();
        return Inertia::render('Note/WineIndexView', compact('notes', 'wine'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Wine $wine)
    {
        return Inertia::render('Note/CreateView', compact('wine'));
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
            'note' => 'min:10 | max:600'
        ]);
        $note = Note::create([
            'note' => $request->note,
            'wine_id' => $request->wine_id,
            'user_id' => Auth::id()
        ]);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Note $note
     * @return \Illuminate\Http\Response
     */
    public function show(Note $note)
    {
        if($note->user != Auth::user()) return 'nooo';
        $wine = new WineResource($note->wine);
        $wine = $wine->resolve();
        return Inertia::render('Note/ShowView', compact('note', 'wine'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function edit(Note $note)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Note $note)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function destroy(Note $note)
    {
        Note::destroy($note->id);
    }
}
