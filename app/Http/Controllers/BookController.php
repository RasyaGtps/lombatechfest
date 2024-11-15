<?php
namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\Author;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with(['category', 'author'])->get();
        $categories = Category::all();
        $authors = Author::all();
        return view('books.index', compact('books', 'categories', 'authors'));
    }

public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'categories_id' => 'required|exists:categories,id',
        'author_id' => 'required|exists:authors,id',
    ]);

    Book::create([
        'title' => $request->title,
        'categories_id' => $request->categories_id,
        'author_id' => $request->author_id,
    ]);

    return redirect()->route('books.index');
}

    public function edit(Book $book)
    {
        $categories = Category::all();
        $authors = Author::all();
        return view('books.edit', compact('book', 'categories', 'authors'));
    }

    public function update(Request $request, Book $book)
    {
        $book->update($request->all());
        return redirect()->route('books.index');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index');
    }
}