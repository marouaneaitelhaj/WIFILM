<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class authController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return auth()->user();
    }
    public function login(Request $request)
    {
        $validation = $request->validate([
            "email" => "required|email",
            "password" => "required|min:8|max:255"
        ]);
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return response()->json([
                'message' => 'wrong email'
            ], 401);
        }
        if (Hash::check($request->password, $user->password)) {
            return response()->json([
                'token' => $user->createToken(time())->plainTextToken
            ]);
        } else {
            return response()->json([
                'message' => 'wrong password'
            ], 401);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            "email" => "required|email",
            "password" => "required|min:8|max:255",
            "name" => "required|min:3|max:255"
        ]);
        $user = User::create([
            "email" => $request->email,
            "password" => Hash::make($request->password),
            "name" => $request->name
        ]);
        return response()->json([
            'token' => $user->createToken(time())->plainTextToken
        ]);
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
