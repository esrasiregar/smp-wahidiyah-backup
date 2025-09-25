@php
  /** @var \Illuminate\Support\Collection|\Illuminate\Database\Eloquent\Collection $latestNews */
  $latestNews = $latestNews ?? collect();
@endphp

<section class="max-w-7xl mx-auto px-6 py-12">
  <h2 class="text-4xl font-extrabold text-[#101827] text-center mb-10">
    Berita Terkini
  </h2>

  @if ($latestNews->isEmpty())
    <div class="bg-yellow-50 border border-yellow-200 text-yellow-800 rounded-xl p-4">
      Belum ada berita.
    </div>
  @else
    <div class="grid gap-8 grid-cols-1 md:grid-cols-2 lg:grid-cols-4">
      @foreach ($latestNews as $item)
        <article class="bg-white rounded-3xl overflow-hidden shadow-xl ring-1 ring-black/5 hover:shadow-2xl transition-all">
          {{-- Cover --}}
          @if($item->cover_path)
            <img
              src="{{ asset('storage/'.$item->cover_path) }}"
              alt="{{ $item->title }}"
              class="w-full h-64 object-cover"
            >
          @else
            <div class="w-full h-64 bg-gray-200"></div>
          @endif

          {{-- Body --}}
          <div class="p-6">
            <div class="text-xs font-semibold tracking-widest text-gray-500 uppercase">
              {{ $item->published_at?->translatedFormat('d F Y') }}
            </div>

            <a href="{{ route('news.show', ['slug' => $item->slug]) }}">
              <h3 class="mt-2 text-xl font-extrabold text-gray-900 leading-snug line-clamp-2 hover:text-[#4AA29D] transition">
                {{ $item->title }}
              </h3>
            </a>

            <div class="mt-3">
              <a href="{{ route('news.show', ['slug' => $item->slug]) }}"
                 class="text-[#4AA29D] font-semibold hover:underline">
                Lihat Selengkapnya
              </a>
            </div>
          </div>
        </article>
      @endforeach
    </div>

    {{-- Tombol Semua Berita --}}
    <div class="mt-10 flex justify-center">
      <a href="{{ route('news.index') }}"
         class="inline-block px-8 py-3 rounded-full text-white font-semibold bg-[#4AA29D] hover:bg-[#3a817d] shadow-lg transition-colors">
        Semua Berita
      </a>
    </div>
  @endif
</section>
