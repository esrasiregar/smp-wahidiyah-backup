@extends('layout.app')

@section('title', 'Berita')

@section('content')
<div class="max-w-7xl mx-auto mt-10 px-6">

  <div class="text-center mb-8">
    <h1 class="text-4xl font-bold text-[#3C3C3C]">Berita</h1>
    <p class="text-lg text-gray-600">SMP Wahidiyah Samarinda</p>
  </div>

  @forelse ($newsByMonth as $bulan => $items)
    {{-- Header Bulan --}}
    <div class="flex items-center justify-center mt-10 mb-5">
      <div class="flex-1 border-2 border-[#3C3C3C] rounded-full"></div>
      <div class="px-4 text-gray-600 text-sm font-semibold">{{ $bulan }}</div>
      <div class="flex-1 border-2 border-[#3C3C3C] rounded-full"></div>
    </div>

    {{-- Grid Berita --}}
    <div class="grid gap-6 mt-6 grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5">
      @foreach ($items as $item)
        <article class="bg-white shadow-lg rounded-xl overflow-hidden">
          <a href="{{ route('news.show', ['slug' => $item->slug]) }}">
            @if($item->cover_path)
              <img src="{{ asset('storage/' . $item->cover_path) }}"
                   alt="{{ $item->title }}"
                   class="w-full h-40 object-cover">
            @endif
          </a>
          <div class="p-4">
            <a href="{{ route('news.show', ['slug' => $item->slug]) }}">
              <h3 class="font-bold text-lg mb-2 hover:text-[#4AA29D] transition">
                {{ $item->title }}
              </h3>
            </a>
            <div class="text-sm text-gray-500 mb-2">
              {{ $item->published_at?->translatedFormat('d F Y') }}
            </div>
            <p class="text-gray-600 text-sm line-clamp-3">
              {{ \Illuminate\Support\Str::limit(strip_tags($item->content), 100) }}
            </p>
          </div>
        </article>
      @endforeach
    </div>
  @empty
    <div class="bg-yellow-50 border border-yellow-200 text-yellow-800 rounded-xl p-4">
      Belum ada berita.
    </div>
  @endforelse

</div>
@endsection
