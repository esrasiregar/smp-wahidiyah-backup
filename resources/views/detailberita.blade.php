@php
$id = $id ?? 1;
$bulan = $bulan ?? 'Agustus 2025';

// Dummy semua berita
$allBerita = [
    'Agustus 2025' => array_map(fn($i) => [
        'title' => "Berita Agustus $i",
        'desc'  => "Deskripsi singkat berita Agustus $i.",
        'date'  => "28 Agustus 2025",
        'author'=> "Admin SMP Wahidiyah",
        'image' => 'images/beritacontoh.png',
    ], range(1,10)),
    'Juli 2025' => array_map(fn($i) => [
        'title' => "Berita Juli $i",
        'desc'  => "Deskripsi singkat berita Juli $i.",
        'date'  => "28 Juli 2025",
        'author'=> "Admin SMP Wahidiyah",
        'image' => 'images/beritacontoh.png',
    ], range(1,10)),
    'Juni 2025' => array_map(fn($i) => [
        'title' => "Berita Juni $i",
        'desc'  => "Deskripsi singkat berita Juni $i.",
        'date'  => "28 Juni 2025",
        'author'=> "Admin SMP Wahidiyah",
        'image' => 'images/beritacontoh.png',
    ], range(1,10)),
];

// Ambil berita sesuai bulan dan id
$berita = $allBerita[$bulan][$id-1] ?? null;

// Flatten semua berita untuk "Berita Lainnya"
$flatBerita = [];
foreach ($allBerita as $monthBerita) {
    $flatBerita = array_merge($flatBerita, $monthBerita);
}

// Ambil 6 berita random, kecuali yang sedang dibuka
$beritaLainnya = collect($flatBerita)
    ->reject(fn($b) => $b['title'] === $berita['title'])
    ->shuffle()
    ->take(6)
    ->all();
@endphp

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $berita['title'] ?? 'Berita Tidak Ditemukan' }} - SMP WAHIDIYAH</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    @vite(['resources/css/app.css'])
</head>
<body class="bg-gray-100">

    {{-- Navbar --}}
    @include('layouts.navbar')

    <div class="max-w-4xl mx-auto mt-8 px-6 lg:px-6">
        {{-- Gambar utama + Judul/Info di kanan --}}
        <div class="flex flex-col md:flex-row items-start gap-6 mb-6">
            {{-- Gambar utama --}}
            <div class="w-full md:w-1/3 flex-shrink-0">
                <img src="{{ asset($berita['image'] ?? 'images/beritacontoh.png') }}" 
                     alt="{{ $berita['title'] ?? 'Berita Tidak Ditemukan' }}" 
                     class="w-full h-48 md:h-52 object-cover rounded-xl shadow-md">
            </div>

            {{-- Judul + Info --}}
            <div class="flex-1">
                <h1 class="text-4xl font-bold text-[#3C3C3C] mb-2">{{ $berita['title'] ?? 'Berita Tidak Ditemukan' }}</h1>
                <div class="flex items-center text-gray-500 text-sm space-x-4">
                    <span><i class="fa-solid fa-calendar"></i> {{ $berita['date'] ?? '-' }}</span>
                    <span><i class="fa-solid fa-user"></i> {{ $berita['author'] ?? '-' }}</span>
                </div>
            </div>
        </div>

        {{-- Garis horizontal --}}
        <div class="mt-10 mb-10 border-t-2 border-[#3C3C3C]"></div>

        {{-- Isi konten --}}
        <div class="prose max-w-none text-gray-700 leading-relaxed mt-6">
            {!! $berita['content'] ?? 'Konten berita tidak tersedia' !!}
        </div>

        {{-- Tombol kembali --}}
        <div class="mt-5 mb-20">
            <a href="{{ url('/berita') }}"
               class="inline-block bg-[#4AA29D] text-white font-medium px-6 py-2 rounded-lg shadow-md hover:bg-[#3a817d] transition">
                ← Kembali ke Berita
            </a>
        </div>

        {{-- Header Berita Lainnya --}}
        <div class="mt-12 mb-6">
            <h2 class="text-3xl font-bold text-[#3C3C3C]">Berita Lainnya</h2>
        </div>

        {{-- Grid Berita Lainnya --}}
        <div class="space-y-6 mb-10">
            @foreach ($beritaLainnya as $item)
                <div class="bg-white shadow-lg rounded-xl overflow-hidden flex flex-col md:flex-row">
                    {{-- Gambar --}}
                    <a href="{{ url('/berita/detail/'.($item['bulan'] ?? 'Agustus 2025').'/'.($loop->iteration)) }}" class="md:w-1/3 w-full">
                        <img src="{{ asset($item['image']) }}" alt="{{ $item['title'] }}"
                             class="w-full h-full object-cover rounded-l-xl md:rounded-l-none md:rounded-t-xl md:h-40">
                    </a>

                    {{-- Teks --}}
                    <div class="p-4 flex-1">
                        <a href="{{ url('/berita/detail/'.($item['bulan'] ?? 'Agustus 2025').'/'.($loop->iteration)) }}">
                            <h3 class="font-bold text-lg mb-2 hover:text-[#4AA29D] transition">
                                {{ $item['title'] }}
                            </h3>
                        </a>
                        <div class="flex items-center text-gray-500 text-sm mb-2 space-x-4">
                            <span><i class="fa-solid fa-calendar"></i> {{ $item['date'] }}</span>
                            <span><i class="fa-solid fa-user"></i> {{ $item['author'] }}</span>
                        </div>
                        <p class="text-gray-600 text-sm">{{ $item['desc'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    {{-- Footer --}}
    @include('layouts.footer')

    @vite(['resources/js/app.js'])
</body>
</html>
