@extends('layout.app')

@section('title', ($activity->title ?? 'Kegiatan').' - Kegiatan')

@section('content')
<div class="max-w-4xl mx-auto mt-8 px-6 lg:px-6">
  {{-- Header & Cover --}}
  <div class="flex flex-col md:flex-row items-start gap-6 mb-6">
    <div class="w-full md:w-1/3 flex-shrink-0">
      @if(!empty($activity->cover_path))
        <img src="{{ asset('storage/'.$activity->cover_path) }}"
             alt="{{ $activity->title }}"
             class="w-full h-48 md:h-52 object-cover rounded-xl shadow-md">
      @endif
    </div>
    <div class="flex-1">
      <h1 class="text-4xl font-bold text-[#3C3C3C] mb-2">{{ $activity->title }}</h1>
      <div class="flex items-center text-gray-500 text-sm space-x-4">
        <span>
          <i class="fa-solid fa-calendar"></i>
          {{ optional($activity->event_date)->translatedFormat('d F Y') }}
        </span>
        <span><i class="fa-solid fa-user"></i> Admin</span>
      </div>
    </div>
  </div>

  <div class="mt-10 mb-10 border-t-2 border-[#3C3C3C]"></div>

  {{-- Konten --}}
  <div class="prose max-w-none text-gray-700 leading-relaxed mt-6">
    {!! nl2br(e($activity->content)) !!}
  </div>

  <div class="mt-5 mb-16">
    <a href="{{ route('kegiatan') }}"
       class="inline-block bg-[#4AA29D] text-white font-medium px-6 py-2 rounded-lg shadow-md hover:bg-[#3a817d] transition">
      ← Kembali ke Kegiatan
    </a>
  </div>

  {{-- Kegiatan Lainnya --}}
  @if(!empty($otherActivities) && $otherActivities->isNotEmpty())
    <h2 class="text-3xl font-bold text-[#3C3C3C] mb-6">Kegiatan Lainnya</h2>
    <div class="space-y-6 mb-10">
      @foreach ($otherActivities as $item)
        <div class="bg-white shadow-lg rounded-xl overflow-hidden flex flex-col md:flex-row">
          <a href="{{ route('activities.show', $item->slug) }}" class="md:w-1/3 w-full">
            @if(!empty($item->cover_path))
              <img src="{{ asset('storage/'.$item->cover_path) }}"
                   alt="{{ $item->title }}"
                   class="w-full h-full object-cover md:h-40">
            @endif
          </a>
          <div class="p-4 flex-1">
            <a href="{{ route('activities.show', $item->slug) }}">
              <h3 class="font-bold text-lg mb-2 hover:text-[#4AA29D] transition">
                {{ $item->title }}
              </h3>
            </a>
            <div class="flex items-center text-gray-500 text-sm mb-2 space-x-4">
              <span>
                <i class="fa-solid fa-calendar"></i>
                {{ optional($item->event_date)->translatedFormat('d F Y') }}
              </span>
              <span><i class="fa-solid fa-user"></i> Admin</span>
            </div>
            <p class="text-gray-600 text-sm line-clamp-3">
              {{ \Illuminate\Support\Str::limit(strip_tags($item->content), 120) }}
            </p>
          </div>
        </div>
      @endforeach
    </div>
  @endif
</div>
@endsection
