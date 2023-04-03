<?php

namespace App\Http\Controllers;

use App\Models\genres_movies;
use Illuminate\Http\Request;

class genres_moviesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $genres_movies = new genres_movies();
        $genres_movies->genres_id = $request->genres_id;
        $genres_movies->movies_id = $request->movies_id;
        $genres_movies->save();
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
