<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\View\View;

class BookController extends Controller
{
    public function destroyBook(Book $book)
    {
        $book->delete();

        return back()->with('success', 'The book has been deleted.');
    }

    public function editBook(Book $book)
    {
        return view('books.edit', [
            'book' => $book
        ]);
    }

    public function updateBook(Book $book)
    {
        $attributes = request()->validate([
            'isbn' => 'required|min:3|max:255',
            'title' => 'required|min:1|max:255',
            'pages' => 'required|integer'
        ]);

        $book->update($attributes);

        return back()->with('success', 'Your book has been updated.');
    }

    public function saveBook()
    {
        $attributes = request()->validate([
            'isbn' => 'required|min:3|max:255',
            'title' => 'required|min:1|max:255',
            'pages' => 'required|integer'
        ]);

        // nach validate
        // nach min:3 max:255 und so ist er sich sicher das es richtig validiert wurde
        // also kann er es speichern
        $book = Book::create($attributes);

        /**
         * dd($book);
         * zeigt voll viel informationen an über das gespeicherte buch
         * (auch das, was wir nicht eingegeben haben)
         */

        return back()->with('success', 'Your book has been created.');
    }

    public function listBooks(): View
    {
        $books = Book::all();

        return view('list', [
            'books' => $books
        ]);
    }
}
