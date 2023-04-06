<?php

namespace App\Http\Controllers;

use App\Models\reviews;
use Illuminate\Http\Request;

class reviewsController extends Controller
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
        $reviews = new reviews();
        $reviews->users_id = $request->users_id;
        $reviews->movies_id = $request->movies_id;
        $reviews->review = $request->review;
        $reviews->comment = $request->comment;
        $reviews->save();
    }
    public function check(Request $request)
    {
        $user_id = $request->users_id;
        $movie_id = $request->movies_id;
        $check = reviews::where('users_id', $user_id)->where('movies_id', $movie_id)->first();
        if ($check) {
            return response()->json([
                'message' => 'already',
                'data' => $check
            ], 200);
        } else {
            return response()->json([
                'message' => 'can'
            ], 200);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $Analytics = reviews::where('movies_id', $id)->get();
        $onestar = reviews::where('movies_id', $id)->where('review', 1)->get();
        $twostar = reviews::where('movies_id', $id)->where('review', 2)->get();
        $threestar = reviews::where('movies_id', $id)->where('review', 3)->get();
        $fourstar = reviews::where('movies_id', $id)->where('review', 4)->get();
        $fivestar = reviews::where('movies_id', $id)->where('review', 5)->get();
        if (count($Analytics) == 0) {
            return response()->json([
                'numberofrating' => 0,
                'onestar' => 0,
                'twostar' => 0,
                'threestar' => 0,
                'fourstar' => 0,
                'fivestar' => 0,
                'average' => 0,
                'positive' => 0,
                'negative' => 0,
            ], 200);
        } else {
            return response()->json([
                'numberofrating' => count($Analytics),
                'onestar' => (count($onestar) / count($Analytics)) * 100,
                'twostar' => (count($twostar) / count($Analytics)) * 100,
                'threestar' => (count($threestar) / count($Analytics)) * 100,
                'fourstar' => (count($fourstar) / count($Analytics)) * 100,
                'fivestar' => (count($fivestar) / count($Analytics)) * 100,
                'average' => (count($onestar) + count($twostar) * 2 + count($threestar) * 3 + count($fourstar) * 4 + count($fivestar) * 5) / count($Analytics),
                'positive' => (count($fivestar) + count($fourstar)) / count($Analytics) * 100,
                'negative' => (count($onestar) + count($twostar) + count($threestar)) / count($Analytics) * 100,
            ], 200);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        reviews::where('users_id', $request->users_id)->where('movies_id', $request->movies_id)->update([
            'review' => $request->review,
            'comment' => $request->comment
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
