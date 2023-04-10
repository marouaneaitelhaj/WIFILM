<?php

namespace App\Http\Controllers;

use App\Models\actors;
use Illuminate\Http\Request;
use App\Models\actors_movies;

class actors_moviesController extends Controller
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
        actors_movies::where('actors_id', $request->actors_id)->delete();
        foreach ($request->movies as $movie) {
            $actor_movie = actors_movies::where('actors_id', $request->actors_id)->where('movies_id', $movie['id'])->first();
            if ($actor_movie) {
                continue;
            }
            $actors_movies = new actors_movies();
            $actors_movies->actors_id = $request->actors_id;
            $actors_movies->movies_id = $movie['id'];
            $actors_movies->save();
        }
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
