<?php

namespace App\Services;

use App\Models\Book;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use RuntimeException;
use Throwable;

class BookService
{
    /**
     * Save a new book to storage.
     *
     * @param  array<string, mixed>  $data
     */
    public function createBook(array $data): Book
    {
        try {
            return DB::transaction(fn () => Book::create($data));
        } catch (Throwable $exception) {
            Log::error('Failed to create book', [
                'payload' => $data,
                'error' => $exception->getMessage(),
            ]);

            throw new RuntimeException('Failed to save book data.', 0, $exception);
        }
    }

    /**
     * Update existing book data.
     *
     * @param  array<string, mixed>  $data
     */
    public function updateBook(Book $book, array $data): Book
    {
        try {
            return DB::transaction(function () use ($book, $data): Book {
                $book->update($data);

                return $book->refresh();
            });
        } catch (Throwable $exception) {
            Log::error('Failed to update book', [
                'book_id' => $book->id,
                'payload' => $data,
                'error' => $exception->getMessage(),
            ]);

            throw new RuntimeException('Failed to save book data.', 0, $exception);
        }
    }
}
