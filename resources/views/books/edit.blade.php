<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Buku</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-gray-100 py-10">
    <main class="mx-auto w-full max-w-3xl px-4">
        <div class="mb-6 flex items-center justify-between">
            <h1 class="text-2xl font-bold text-gray-900">Ubah Data Buku</h1>
            <a href="{{ route('books.index') }}" class="rounded-lg border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">Kembali</a>
        </div>

        @if (session('error'))
            <div class="mb-6 rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">
                {{ session('error') }}
            </div>
        @endif

        <section class="rounded-xl bg-white p-6 shadow-sm">
            <form action="{{ route('books.update', $book) }}" method="POST">
                @csrf
                @method('PUT')
                @include('books.form', ['buttonLabel' => 'Perbarui Buku'])
            </form>
        </section>
    </main>
</body>
</html>
