<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berita - SMP WAHIDIYAH</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">

    {{-- Panggil Navbar --}}
    @include('layouts.navbar')

    <div class="container mx-auto mt-6">
        <h1 class="text-2xl font-bold">Halaman Berita</h1>
        <p>Ini adalah konten berita...</p>
    </div>

</body>
</html>
