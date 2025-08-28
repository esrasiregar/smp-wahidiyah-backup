@php
$id = $id ?? 0;

// Dummy data untuk contoh
$berita = [
    'title' => "Detail Berita ke-$id",
    'date'  => '28 Agustus 2025',
    'author'=> 'Admin SMP Wahidiyah',
    'image' => 'images/beritacontoh.png',
    'content' => "
        Ini adalah detail lengkap untuk berita ke-$id. 
        Kontennya bisa diambil dari database nantinya.
    ",
];
@endphp


<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $berita['title'] }} - SMP WAHIDIYAH</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    @vite(['resources/css/app.css'])
</head>
<body class="bg-gray-100">

    {{-- Navbar --}}
    @include('layouts.navbar')

    <div class="max-w-4xl mx-auto mt-8 px-6 lg:px-6">
        {{-- Judul --}}
        <h1 class="text-4xl font-bold text-[#3C3C3C] mb-2">{{ $berita['title'] }}</h1>

        {{-- Info berita --}}
        <div class="flex items-center text-gray-500 text-sm mb-6 space-x-4">
            <span><i class="fa-solid fa-calendar"></i> {{ $berita['date'] }}</span>
            <span><i class="fa-solid fa-user"></i> {{ $berita['author'] }}</span>
        </div>

        {{-- Gambar utama --}}
        <img src="{{ asset($berita['image']) }}" 
             alt="{{ $berita['title'] }}" 
             class="w-full h-[400px] object-cover rounded-xl shadow-md mb-6">

        {{-- Isi konten --}}
        <div class="prose max-w-none text-gray-700 leading-relaxed">
            {!! $berita['content'] !!}
        </div>

        {{-- Tombol kembali --}}
        <div class="mt-10">
            <a href="{{ url('/berita') }}" 
               class="inline-block bg-[#4AA29D] text-white px-6 py-2 rounded-lg shadow-md hover:bg-[#3a817d] transition">
                ← Kembali ke Berita
            </a>
        </div>
    </div>

    {{-- Footer --}}
    @include('layouts.footer')

    {{-- JS --}}
    @vite(['resources/js/app.js'])
</body>
</html>
