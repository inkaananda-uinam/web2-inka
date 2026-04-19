<div class="space-y-5">
    <div>
        <label for="title" class="mb-1 block text-sm font-medium text-gray-700">Judul Buku</label>
        <input
            type="text"
            name="title"
            id="title"
            value="{{ old('title', $book->title ?? '') }}"
            class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm shadow-sm focus:border-sky-500 focus:outline-none focus:ring-2 focus:ring-sky-200"
            required
        >
        @error('title')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="author" class="mb-1 block text-sm font-medium text-gray-700">Penulis</label>
        <input
            type="text"
            name="author"
            id="author"
            value="{{ old('author', $book->author ?? '') }}"
            class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm shadow-sm focus:border-sky-500 focus:outline-none focus:ring-2 focus:ring-sky-200"
            required
        >
        @error('author')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="publisher" class="mb-1 block text-sm font-medium text-gray-700">Penerbit</label>
        <input
            type="text"
            name="publisher"
            id="publisher"
            value="{{ old('publisher', $book->publisher ?? '') }}"
            class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm shadow-sm focus:border-sky-500 focus:outline-none focus:ring-2 focus:ring-sky-200"
            required
        >
        @error('publisher')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
        <div>
            <label for="publication_year" class="mb-1 block text-sm font-medium text-gray-700">Tahun Terbit</label>
            <input
                type="number"
                name="publication_year"
                id="publication_year"
                min="1000"
                max="{{ now()->year }}"
                value="{{ old('publication_year', $book->publication_year ?? '') }}"
                class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm shadow-sm focus:border-sky-500 focus:outline-none focus:ring-2 focus:ring-sky-200"
                required
            >
            @error('publication_year')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="stock" class="mb-1 block text-sm font-medium text-gray-700">Stok Buku</label>
            <input
                type="number"
                name="stock"
                id="stock"
                min="0"
                value="{{ old('stock', $book->stock ?? 0) }}"
                class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm shadow-sm focus:border-sky-500 focus:outline-none focus:ring-2 focus:ring-sky-200"
                required
            >
            @error('stock')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="flex items-center gap-3">
        <button
            type="submit"
            class="rounded-lg bg-sky-600 px-4 py-2 text-sm font-semibold text-white hover:bg-sky-700"
        >
            {{ $buttonLabel }}
        </button>
        <a href="{{ route('books.index') }}" class="rounded-lg border border-gray-300 px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">
            Batal
        </a>
    </div>
</div>
