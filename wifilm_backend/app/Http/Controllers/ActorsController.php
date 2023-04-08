<?php

namespace App\Http\Controllers;

use App\Models\actors;
use Illuminate\Http\Request;

class ActorsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $actors = actors::with('movies')->get();
        return response()->json($actors, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:3',
            'image' => 'required',
            'description' => 'required|min:3',
        ]);
        $actors = new actors();
        $actors->name = $request->name;
        $actors->image = $request->image;
        $actors->description = $request->description;
        $actors->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return actors::find($id)->with('movies')->get();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required',
        ]);
        $actors = actors::find($id);
        $actors->name = $request->name;
        $actors->image = $request->image;
        $actors->description = $request->description;
        $actors->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $actors = actors::find($id);
        $actors->delete();
    }
}
