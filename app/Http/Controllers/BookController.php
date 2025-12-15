<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\View\View;

class BookController extends Controller
{
    public function saveBook()
    {
        $attributes = request()->validate([
            'isbn' => 'required|min:3|max:255',
            'title' => 'required|min:1|max:255',
            'pages' => 'required|min:1|max:255'
        ]);
    }

    public function listBooks(): View
    {
        $books = Book::all();

        return view('list', [
            'books' => $books
        ]);
    }
}
