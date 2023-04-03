<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\movies;

class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(movies::with('genres')->get(), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedata = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required',
        ]);
        $newmovies = movies::create($validatedata);
        return response()->json($newmovies, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response()->json(movies::where('id', $id)->with('genres')->with('reviews')->first(), 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        movies::where('id', $id)->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
