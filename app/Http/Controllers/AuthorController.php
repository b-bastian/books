<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Authors;

class AuthorController extends Controller
{
    public function listAuthors()
    {
        return view('authors', [
            'authors' => Authors::all()
        ]);
    }

    public function saveAuthor()
    {
        $attributes = request()->validate([
            'name' => 'required|min:3|max:255',
            'email' => 'required|min:1|max:255'
        ]);

        $author = Authors::create($attributes);

        return back()->with('success', 'Your author has been created.');
    }
}
