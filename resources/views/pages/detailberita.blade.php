@extends('layout.app')

@section('title', $news->title . ' - Berita')

@section('content')
<div class="max-w-4xl mx-auto mt-8 px-6">

  <div class="flex flex-col md:flex-row items-start gap-6 mb-6">
    <div class="w-full md:w-1/3 flex-shrink-0">
      @if($news->cover_path)
        <img src="{{ asset('storage/'.$news->cover_path) }}"
             alt="{{ $news->title }}"
             class="w-full h-48 md:h-52 object-cover rounded-xl shadow-md">
      @endif
    </div>
    <div class="flex-1">
      <h1 class="text-4xl font-bold text-[#3C3C3C] mb-2">{{ $news->title }}</h1>
      <div class="text-gray-500 text-sm">
        <i class="fa-solid fa-calendar"></i>
        {{ $news->published_at?->translatedFormat('d F Y') }}
        &nbsp;•&nbsp; <i class="fa-solid fa-user"></i> Admin
      </div>
    </div>
  </div>

  <div class="mt-10 mb-10 border-t-2 border-[#3C3C3C]"></div>

  <div class="prose max-w-none text-gray-700 leading-relaxed mt-6">
    {!! nl2br(e($news->content)) !!}
  </div>

  <div class="mt-5 mb-16">
    <a href="{{ route('news.index') }}"
       class="inline-block bg-[#4AA29D] text-white font-medium px-6 py-2 rounded-lg hover:bg-[#3a817d] transition">
      ← Kembali ke Berita
    </a>
  </div>

  @if($otherNews->isNotEmpty())
    <h2 class="text-3xl font-bold text-[#3C3C3C] mb-6">Berita Lainnya</h2>
    <div class="space-y-6 mb-10">
      @foreach ($otherNews as $item)
        <div class="bg-white shadow-lg rounded-xl overflow-hidden flex flex-col md:flex-row">
          <a href="{{ route('news.show', ['slug' => $item->slug]) }}" class="md:w-1/3 w-full">
            @if($item->cover_path)
              <img src="{{ asset('storage/'.$item->cover_path) }}" alt="{{ $item->title }}"
                   class="w-full h-full object-cover md:h-40">
            @endif
          </a>
          <div class="p-4 flex-1">
            <a href="{{ route('news.show', ['slug' => $item->slug]) }}">
              <h3 class="font-bold text-lg mb-2 hover:text-[#4AA29D] transition">{{ $item->title }}</h3>
            </a>
            <div class="text-sm text-gray-500 mb-2">
              {{ $item->published_at?->translatedFormat('d F Y') }}
            </div>
            <p class="text-gray-600 text-sm">
              {{ \Illuminate\Support\Str::limit(strip_tags($item->content), 120) }}
            </p>
          </div>
        </div>
      @endforeach
    </div>
  @endif

</div>
@endsection
