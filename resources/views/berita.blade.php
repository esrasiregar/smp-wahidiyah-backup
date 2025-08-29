@php
$beritaByMonth = [
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
@endphp

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berita - SMP WAHIDIYAH</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">

    {{-- Navbar --}}
    @include('layouts.navbar')

    <div class="max-w-7xl mx-auto mt-20 px-6 lg:px-6">
        {{-- Header --}}
        <div class="text-center mb-6">
            <h1 class="text-7xl text-[#3C3C3C] font-bold">Berita</h1>
            <p class="text-5xl font-semibold mt-2">
                <span class="text-[#3C3C3C]">Smp</span>
                <span class="text-[#4AA29D]">Wahidiyah</span>
                <span class="text-[#3C3C3C]">Samarinda</span>
            </p>
        </div>

        @foreach ($beritaByMonth as $bulan => $items)
            {{-- Garis pembatas + nama bulan --}}
            <div class="flex items-center justify-center mt-10 mb-5">
                <div class="flex-1 border-2 border-[#3C3C3C] rounded-full"></div>
                <div class="px-4 flex items-center space-x-2 bg-gray-100">
                    <i class="fa-solid fa-calendar text-[#4AA29D]"></i>
                    <span class="text-gray-600 text-sm font-semibold">{{ $bulan }}</span>
                </div>
                <div class="flex-1 border-2 border-[#3C3C3C] rounded-full"></div>
            </div>

            {{-- Grid berita --}}
            <section class="month-section" 
                     data-initial-visible-mobile="6" 
                     data-initial-visible-desktop="5">
                <div class="grid gap-6 mt-6 grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5">
                    @foreach ($items as $index => $item)
                        <div class="bg-white shadow-lg rounded-xl overflow-hidden berita-item">
                            <a href="{{ url('/berita/detail/'.urlencode($bulan).'/'.($index+1)) }}">
                                <img src="{{ asset($item['image']) }}" alt="{{ $item['title'] }}" class="w-full h-40 object-cover">
                            </a>
                            <div class="p-4">
                                <a href="{{ url('/berita/detail/'.urlencode($bulan).'/'.($index+1)) }}">
                                    <h2 class="font-bold text-lg mb-2 hover:text-[#4AA29D] transition">
                                        {{ $item['title'] }}
                                    </h2>
                                </a>
                                <p class="text-gray-600 text-sm">{{ $item['desc'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>

                {{-- Tombol lihat lebih banyak --}}
                @if(count($items) > 5)
                    <div class="flex justify-center mt-8 mb-8">
                        <button class="lihat-lebih bg-[#4AA29D] text-white px-6 py-2 font-medium rounded-lg shadow-md hover:bg-[#3a817d] transition">
                            Lihat Lebih Banyak
                        </button>
                    </div>
                @endif
            </section>
        @endforeach
    </div>

    {{-- Footer --}}
    @include('layouts.footer')

</body>
</html>
