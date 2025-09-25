@php
  // jaga-jaga kalau controller lupa ngirim variabel
  /** @var \Illuminate\Support\Collection|\Illuminate\Database\Eloquent\Collection $latestActivities */
  $latestActivities = $latestActivities ?? collect();
@endphp

<section class="max-w-7xl mx-auto px-6 py-10">
  <h2 class="text-4xl font-extrabold text-[#1f2937] text-center mb-10">
    Kegiatan Terbaru
  </h2>

  @if ($latestActivities->isEmpty())
    <div class="bg-yellow-50 border border-yellow-200 text-yellow-800 rounded-xl p-4">
      Belum ada kegiatan.
    </div>
  @else
    <div class="grid gap-8 grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
      @foreach ($latestActivities as $item)
        <a href="{{ route('activities.show', ['slug' => $item->slug]) }}"
           class="group block relative rounded-3xl shadow-xl overflow-hidden ring-1 ring-black/5 hover:shadow-2xl transition-all duration-300">

          {{-- Gambar --}}
          @if($item->cover_path)
            <img
              src="{{ asset('storage/'.$item->cover_path) }}"
              alt="{{ $item->title }}"
              class="h-[380px] w-full object-cover group-hover:scale-[1.02] transition-transform duration-500"
            >
          @else
            <div class="h-[380px] w-full bg-gray-200"></div>
          @endif

          {{-- Overlay gradien gelap di bawah --}}
          <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>

          {{-- Tanggal + Judul di bawah kiri --}}
          <div class="absolute inset-x-0 bottom-0 p-6">
            <div class="text-white/80 text-sm font-semibold tracking-wide">
              {{ optional($item->event_date)->translatedFormat('j F Y') }}
            </div>
            <h3 class="mt-2 text-white text-2xl font-extrabold leading-snug drop-shadow">
              {{ $item->title }}
            </h3>
          </div>

          {{-- Rounded corner kecil di kanan bawah seperti pada screenshot --}}
          <div class="absolute right-0 bottom-0 w-6 h-6 bg-white/20 rounded-tl-full backdrop-blur-[2px]"></div>
        </a>
      @endforeach
    </div>

    {{-- Tombol Semua Kegiatan --}}
    <div class="mt-10 flex justify-center">
      <a href="{{ route('kegiatan') }}"
         class="inline-block px-8 py-3 rounded-full text-white font-semibold bg-[#4AA29D] hover:bg-[#3a817d] shadow-lg transition-colors">
        Semua Kegiatan
      </a>
    </div>
  @endif
</section>
