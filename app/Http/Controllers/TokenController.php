<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TokenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tokens = auth()->user()->tokens()->paginate(5);

        return view('tokens.index', [
            'tokens' => $tokens,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        $attributes = request()->validate([
            'title' => 'required|min:3|max:255'
        ]);

        $token = auth()->user()->createToken($attributes['title']);

        return back()->with([
            'success' => __('Token created.'),
            'token' => $token->plainTextToken
        ]);
    }

    public function destroy($token)
    {
        auth()->user()->tokens()->where('id', $token)->delete();

        return back()->with('success', __('Token revoked.'));
    }
}
