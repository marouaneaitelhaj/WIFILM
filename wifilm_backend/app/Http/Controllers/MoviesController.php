<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\movies;
use Illuminate\Support\Facades\DB;

class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $page = $_GET['page'];
        $allMovies = movies::all();
        $movies = movies::select('movies.*', DB::raw("(SELECT AVG(review) FROM reviews WHERE movies_id = movies.id) as avg_rating"))
            ->with('reviews')
            ->with('genres')
            ->orderByDesc('avg_rating')
            ->offset(($page - 1) * 8)
            ->limit(8)
            ->get();
        return response()->json(
            [
                'movies' => $movies,
                'all' => ceil(count($allMovies) / 8),
                'page' => $page
            ],
            200
        );
    }
    public function searshformovies($text)
    {
        return movies::where('name', 'like', '%' . $text . '%')->take(3)->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedata = $request->validate([
            'name' => 'required',
            'description' => 'required|min:10',
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
        movies::where('id', $id)->delete();
    }
    public function DashboardMovies()
    {
        return movies::with('genres')->get();
    }
}
