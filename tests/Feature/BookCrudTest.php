<?php

namespace Tests\Feature;

use App\Models\Book;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BookCrudTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->withoutVite();
    }

    public function test_books_index_page_can_be_rendered(): void
    {
        Book::create([
            'title' => 'Clean Code',
            'author' => 'Robert C. Martin',
            'publisher' => 'Prentice Hall',
            'publication_year' => 2008,
            'stock' => 7,
        ]);

        $response = $this->get(route('books.index'));

        $response->assertOk();
        $response->assertSee('Clean Code');
    }

    public function test_store_book_validates_required_fields(): void
    {
        $response = $this->post(route('books.store'), []);

        $response->assertSessionHasErrors([
            'title',
            'author',
            'publisher',
            'publication_year',
            'stock',
        ]);
    }

    public function test_can_store_new_book(): void
    {
        $payload = [
            'title' => 'Refactoring',
            'author' => 'Martin Fowler',
            'publisher' => 'Addison-Wesley',
            'publication_year' => 2018,
            'stock' => 12,
        ];

        $response = $this->post(route('books.store'), $payload);

        $response->assertRedirect(route('books.index'));
        $response->assertSessionHas('success');
        $this->assertDatabaseHas('books', $payload);
    }

    public function test_can_update_book(): void
    {
        $book = Book::create([
            'title' => 'Code Complete',
            'author' => 'Steve McConnell',
            'publisher' => 'Microsoft Press',
            'publication_year' => 2004,
            'stock' => 3,
        ]);

        $payload = [
            'title' => 'Code Complete 2nd Edition',
            'author' => 'Steve McConnell',
            'publisher' => 'Microsoft Press',
            'publication_year' => 2004,
            'stock' => 5,
        ];

        $response = $this->put(route('books.update', $book), $payload);

        $response->assertRedirect(route('books.index'));
        $response->assertSessionHas('success');
        $this->assertDatabaseHas('books', [
            'id' => $book->id,
            'title' => 'Code Complete 2nd Edition',
            'stock' => 5,
        ]);
    }

    public function test_can_delete_book(): void
    {
        $book = Book::create([
            'title' => 'Domain-Driven Design',
            'author' => 'Eric Evans',
            'publisher' => 'Addison-Wesley',
            'publication_year' => 2003,
            'stock' => 2,
        ]);

        $response = $this->delete(route('books.destroy', $book));

        $response->assertRedirect(route('books.index'));
        $response->assertSessionHas('success');
        $this->assertDatabaseMissing('books', ['id' => $book->id]);
    }
}
