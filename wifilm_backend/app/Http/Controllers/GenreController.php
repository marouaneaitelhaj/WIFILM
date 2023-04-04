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
        $validatedData = $request->validate([
            'name' => 'required|min:3',
            'image' => 'required',
            'description' => 'required|min:3',
        ]);
        $genres = new genres();
        $genres->name = $request->name;
        $genres->image = $request->image;
        $genres->description = $request->description;
        $genres->save();
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
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required',
        ]);
        $genres = genres::find($id);
        $genres->name = $request->name;
        $genres->image = $request->image;
        $genres->description = $request->description;
        $genres->save();
    }
    



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
