<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Buku</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-gray-100 py-10">
    <main class="mx-auto w-full max-w-6xl px-4">
        <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Sistem Manajemen Buku | Inka Ananda</h1>
                <p class="text-sm text-gray-600">Kelola data buku perpustakaan atau toko buku.</p>
            </div>
            <a href="{{ route('books.create') }}" class="inline-flex items-center justify-center rounded-lg bg-sky-600 px-4 py-2 text-sm font-semibold text-white hover:bg-sky-700">
                Tambah Buku
            </a>
        </div>

        @if (session('success'))
            <div class="mb-4 rounded-lg border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-700">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="mb-4 rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">
                {{ session('error') }}
            </div>
        @endif

        <section class="overflow-hidden rounded-xl bg-white shadow-sm">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 text-sm">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-4 py-3 text-left font-semibold text-gray-700">Judul</th>
                            <th class="px-4 py-3 text-left font-semibold text-gray-700">Penulis</th>
                            <th class="px-4 py-3 text-left font-semibold text-gray-700">Penerbit</th>
                            <th class="px-4 py-3 text-left font-semibold text-gray-700">Tahun</th>
                            <th class="px-4 py-3 text-left font-semibold text-gray-700">Stok</th>
                            <th class="px-4 py-3 text-left font-semibold text-gray-700">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse ($books as $book)
                            <tr>
                                <td class="px-4 py-3 text-gray-900">{{ $book->title }}</td>
                                <td class="px-4 py-3 text-gray-700">{{ $book->author }}</td>
                                <td class="px-4 py-3 text-gray-700">{{ $book->publisher }}</td>
                                <td class="px-4 py-3 text-gray-700">{{ $book->publication_year }}</td>
                                <td class="px-4 py-3 text-gray-700">{{ $book->stock }}</td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center gap-2">
                                        <a href="{{ route('books.edit', $book) }}" class="rounded-md bg-amber-500 px-3 py-1.5 text-xs font-semibold text-white hover:bg-amber-600">
                                            Ubah
                                        </a>
                                        <form action="{{ route('books.destroy', $book) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus buku ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="rounded-md bg-red-600 px-3 py-1.5 text-xs font-semibold text-white hover:bg-red-700">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-4 py-8 text-center text-gray-500">
                                    Belum ada data buku.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="border-t border-gray-100 px-4 py-3">
                {{ $books->links() }}
            </div>
        </section>
    </main>
</body>
</html>
