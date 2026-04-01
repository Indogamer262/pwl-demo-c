<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $validatedData = $request->validate([
            'isbn' => 'required|string|max:13|unique:book,isbn',
            'publish_year' => 'required|int',
            'title' => 'required|string|max:100',
            'author' => 'required|string|max:100',
            'category_id' => 'required|int|exists:category,id',
            'description' => 'nullable|string|max:300',
            'cover' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        if($request->hasFile('cover')) {
            $newFileName = $validatedData['isbn'] . '.' . $request->file('cover')->getClientOriginalExtension();
            $request->file('cover')->storeAs('uploads', $newFileName, 'public');
            $validatedData['cover'] = $newFileName;
        }
        // NEW WAY
        Book::create($validatedData);

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
        $validatedData = $request->validate([
            'publish_year' => 'required|int',
            'title' => 'required|string|max:100',
            'author' => 'required|string|max:100',
            'category_id' => 'required|int',
            'description' => 'nullable|string|max:300',
        ]);
        
        if($request->hasFile('cover')) {
            if ($book->cover) {
                Storage::disk('public')->delete('uploads/' . $book->cover);
            }
            $newFileName = $validatedData['isbn'] . '.' . $request->file('cover')->getClientOriginalExtension();
            $request->file('cover')->storeAs('uploads', $newFileName, 'public');
            $validatedData['cover'] = $newFileName;
        }
        else {
            unset($validatedData['cover']);
        }

        // NEW WAY
        $book->update($validatedData);
    
        return redirect()->route('book.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        if ($book->cover) {
            Storage::disk('public')->delete('uploads/' . $book->cover);
        }
        $book->delete();
        return redirect()->route('book.index');
    }
}
