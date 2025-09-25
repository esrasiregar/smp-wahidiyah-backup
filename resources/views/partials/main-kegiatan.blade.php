@extends('layout.app')

@section('title', 'Kegiatan')

@section('content')
<div class="max-w-7xl mx-auto mt-10 px-6">

  <div class="text-center mb-8">
    <h1 class="text-4xl font-bold text-[#3C3C3C]">Kegiatan</h1>
    <p class="text-lg text-gray-600">SMP Wahidiyah Samarinda</p>
  </div>

  @forelse($activitiesByMonth as $bulan => $items)
    {{-- Header Bulan --}}
    <div class="flex items-center justify-center mt-10 mb-5">
      <div class="flex-1 border-2 border-[#3C3C3C] rounded-full"></div>
      <div class="px-4 text-gray-600 text-sm font-semibold">{{ $bulan }}</div>
      <div class="flex-1 border-2 border-[#3C3C3C] rounded-full"></div>
    </div>

    {{-- Grid kegiatan --}}
    <div class="grid gap-6 mt-6 grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
      @foreach ($items as $item)
        <article class="bg-white shadow-lg rounded-xl overflow-hidden flex flex-col">
          <a href="{{ route('activities.show', ['slug' => $item->slug]) }}">
            @if($item->cover_path)
              <img src="{{ asset('storage/'.$item->cover_path) }}"
                   alt="{{ $item->title }}"
                   class="w-full h-40 object-cover">
            @endif
          </a>
          <div class="p-4 flex-1 flex flex-col">
            <a href="{{ route('activities.show', ['slug' => $item->slug]) }}">
              <h3 class="font-semibold text-lg mb-1 hover:text-[#4AA29D] transition">
                {{ $item->title }}
              </h3>
            </a>
            <div class="text-sm text-gray-500 mb-3">
              <i class="fa-solid fa-calendar"></i>
              {{ optional($item->event_date)->translatedFormat('d F Y') }}
            </div>
            <p class="text-gray-600 text-sm line-clamp-3">
              {{ \Illuminate\Support\Str::limit(strip_tags($item->content), 120) }}
            </p>
            <div class="mt-auto pt-4">
              <a href="{{ route('activities.show', ['slug' => $item->slug]) }}"
                 class="inline-block text-sm font-medium text-white bg-[#4AA29D] px-4 py-2 rounded-lg hover:bg-[#3a817d] transition">
                Lihat Detail
              </a>
            </div>
          </div>
        </article>
      @endforeach
    </div>
  @empty
    <div class="bg-yellow-50 border border-yellow-200 text-yellow-800 rounded-xl p-4">
      Belum ada kegiatan.
    </div>
  @endforelse

</div>
@endsection
