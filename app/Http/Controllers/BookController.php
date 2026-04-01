<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::with('category')->get();
        return view('book.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('book.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'isbn' => 'required|string|max:13',
            'publish_year' => 'required|int',
            'title' => 'required|string|max:100',
            'author' => 'required|string|max:100',
            'category_id' => 'required|int',
            'description' => 'nullable|string|max:300',
        ]);

        // NEW WAY
        Book::create($request->all());

        // OLD WAY
        // $category = new Category();
        // $category->save();

        return redirect()->route('book.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        $categories = Category::all();
        return view('book.edit', compact('book', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'publish_year' => 'required|int',
            'title' => 'required|string|max:100',
            'author' => 'required|string|max:100',
            'category_id' => 'required|int',
            'description' => 'nullable|string|max:300',
        ]);

        // NEW WAY
        $book->update($request->only('title', 'author', 'publish_year', 'category_id', 'description'));
    
        return redirect()->route('book.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('book.index');
    }
}
