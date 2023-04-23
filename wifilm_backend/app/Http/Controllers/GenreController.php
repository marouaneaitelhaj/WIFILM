<?php

namespace App\Http\Controllers;

use App\Models\genres;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return genres::all();
    }
    public function DashboardGenres()
    {
        return genres::
            select('genres.*', DB::raw("(SELECT image FROM movies WHERE movies.id = (SELECT movies_id FROM genres_movies WHERE genres_id = genres.id ORDER BY RAND() LIMIT 1)) as movie_image"))
        ->paginate(10);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:3',
            'description' => 'required|min:3',
        ]);
        $genres = new genres();
        $genres->name = $request->name;
        $genres->description = $request->description;
        $genres->save();
    }
    public function searshforgenres($text)
    {
        return genres::where('name', 'like', '%' . $text . '%')->take(3)->get();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return genres::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
        $genres = genres::find($id);
        $genres->name = $request->name;
        $genres->description = $request->description;
        $genres->save();
    }




    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $genres = genres::find($id);
        $genres->delete();
    }
}
