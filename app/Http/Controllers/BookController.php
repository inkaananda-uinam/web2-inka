<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Book;
use App\Services\BookService;
use Throwable;

class BookController extends Controller
{
    public function __construct(private BookService $bookService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::query()
            ->latest()
            ->paginate(10);

        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookRequest $request)
    {
        try {
            $this->bookService->createBook($request->validated());

            return redirect()
                ->route('books.index')
                ->with('success', 'Data buku berhasil ditambahkan.');
        } catch (Throwable) {
            return back()
                ->withInput()
                ->with('error', 'Data buku gagal disimpan. Silakan coba lagi.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        try {
            $this->bookService->updateBook($book, $request->validated());

            return redirect()
                ->route('books.index')
                ->with('success', 'Data buku berhasil diperbarui.');
        } catch (Throwable) {
            return back()
                ->withInput()
                ->with('error', 'Data buku gagal diperbarui. Silakan coba lagi.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()
            ->route('books.index')
            ->with('success', 'Data buku berhasil dihapus.');
    }
}
