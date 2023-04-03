<?php

namespace App\Http\Controllers;

use App\Models\genres;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return genres::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }
    public function searshofgenres($text)
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
        die(var_dump($request->genres));
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
        genres::where('id', $id)->update('name', $request->name, 'description', $request->description, 'image', $request->image);
    }
    



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
