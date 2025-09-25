{{-- resources/views/home.blade.php --}}
@extends('app')
@section('title', 'Beranda – SMP Wahidiyah Samarinda')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  {{-- ================= HERO SECTION ================= --}}
  <section class="hero-section relative overflow-hidden pt-24 md:pt-28">
    <div class="container mx-auto max-w-7xl px-4">
      <div class="grid md:grid-cols-2 gap-8 items-center">
        
        {{-- Left Content --}}
        <div class="content-wrapper order-2 md:order-1">
          {{-- Main Title --}}
          <h1 class="text-4xl md:text-6xl font-extrabold leading-tight tracking-tight">
            SMP <span class="text-teal-500">WAHIDIYAH</span>
            <br/>
            SAMARINDA
          </h1>

          {{-- Quick Access Cards --}}
          <div class="quick-cards mt-10 grid sm:grid-cols-2 gap-5 max-w-xl">
            {{-- News Card --}}
            <a href="{{ url('/berita') }}"
              class="card-link group flex items-start gap-4 p-5 rounded-2xl border shadow-sm hover:shadow-md transition bg-white">
              <span class="icon-wrapper rounded-xl p-3 border text-teal-600 group-hover:bg-teal-50 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" viewBox="0 0 24 24" fill="currentColor">
                  <path d="M19 3H5a2 2 0 0 0-2 2v13a3 3 0 0 0 3 3h13a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2ZM6 7h8v2H6V7Zm0 4h12v2H6v-2Zm0 4h12v2H6v-2Z"/>
                </svg>
              </span>
              <div class="card-content">
                <div class="font-semibold">Berita</div>
                <p class="text-xs text-gray-600">Berita-berita terkini SMP Wahidiyah</p>
              </div>
            </a>

            {{-- Teachers Card --}}
            <a href="{{ url('/profil') }}"
               class="card-link group flex items-start gap-4 p-5 rounded-2xl border shadow-sm hover:shadow-md transition bg-white">
              <span class="icon-wrapper rounded-xl p-3 border text-teal-600 group-hover:bg-teal-50 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" viewBox="0 0 24 24" fill="currentColor">
                  <path d="M12 12a5 5 0 1 0-5-5 5 5 0 0 0 5 5Zm6 8v-1a5 5 0 0 0-5-5H11a5 5 0 0 0-5 5v1Z"/>
                </svg>
              </span>
              <div class="card-content">
                <div class="font-semibold">Daftar Guru</div>
                <p class="text-xs text-gray-600">Daftar Guru SMP Wahidiyah</p>
              </div>
            </a>
          </div>
        </div>

        {{-- Right Image --}}
        <div class="image-wrapper order-1 md:order-2">
          <img
            src="{{ asset('images/hero-siswi.png') }}"
            onerror="this.onerror=null; this.src='{{ asset('images/2siswi.png') }}';"
            alt="SMP Wahidiyah"
            class="w-full max-w-lg md:max-w-xl mx-auto md:ml-auto object-contain select-none"
          >
        </div>
      </div>
    </div>
  </section>

  {{-- ================= BRIEF PROFILE SECTION ================= --}}
  <section class="profile-section relative py-12 md:py-16">
    {{-- Background Gradient --}}
    <div class="absolute inset-0 -z-10 bg-gradient-to-b from-teal-50 via-white to-teal-50/50"></div>

    <div class="container mx-auto max-w-7xl px-4">
      <div class="grid md:grid-cols-2 gap-10 items-center">
        {{-- School Building Image --}}
        <div class="image-container">
          <div class="aspect-[4/3] rounded-3xl overflow-hidden border shadow-sm">
            <img 
              src="{{ asset('images/nantigedung.jpg') }}"
              onerror="this.onerror=null; this.src='{{ asset('images/placeholder-4x3.jpg') }}';"
              alt="Gedung SMP Wahidiyah"
              class="w-full h-full object-cover"
            >
          </div>
        </div>

        {{-- Profile Content --}}
        <div class="content-wrapper">
          <h2 class="text-3xl md:text-4xl font-bold">Profil Singkat</h2>
          <p class="mt-4 text-gray-700 leading-relaxed">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam convallis placerat lacus,
            quis convallis nunc condimentum vel. Proin vulputate ultrices nunc sit amet vehicula.
            Suspendisse eget tempor lacus. Cras gravida gravida quam, eu facilisis elit maximus eget.
          </p>
          <a href="{{ url('/profil') }}"
            class="btn-primary inline-block mt-6 px-5 py-2 rounded-full bg-teal-500 text-white hover:bg-teal-600 transition-colors">
            Profil Lengkap
          </a>
        </div>
      </div>
    </div>
  </section>

  {{-- ================= LATEST NEWS SECTION ================= --}}
  @php
    $newsArticles = [
      [
        'date' => '15 AGUSTUS 2025',
        'title' => 'DAY 3 Semarak Kemerdekaan Indonesia',
        'image' => 'images/beritacontoh.png',
        'slug' => 'semarak-kemerdekaan-day-3'
      ],
      [
        'date' => '14 AGUSTUS 2025',
        'title' => 'Upacara Bendera 17 Agustus',
        'image' => 'images/beritacontoh.png',
        'slug' => 'upacara-bendera-17-agustus'
      ],
      [
        'date' => '13 AGUSTUS 2025',
        'title' => 'Lomba Kebersihan Antar Kelas',
        'image' => 'images/beritacontoh.png',
        'slug' => 'lomba-kebersihan-antar-kelas'
      ],
      [
        'date' => '12 AGUSTUS 2025',
        'title' => 'Prestasi Siswa di Olimpiade Sains',
        'image' => 'images/beritacontoh.png',
        'slug' => 'prestasi-olimpiade-sains'
      ],
    ];
  @endphp

  <section class="news-section py-12 md:py-16">
    <div class="container mx-auto max-w-7xl px-4">
      <h2 class="text-center text-3xl md:text-4xl font-bold">Berita Terkini</h2>

      <div class="news-grid mt-8 grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
        @foreach($newsArticles as $article)
          <article class="news-card bg-white rounded-2xl border shadow-sm hover:shadow-md transition overflow-hidden">
            {{-- News Image --}}
            <div class="aspect-[16/10]">
              <img 
                src="{{ asset($article['image']) }}"
                onerror="this.onerror=null; this.src='{{ asset('images/placeholder-16x10.jpg') }}';"
                alt="{{ $article['title'] }}"
                class="w-full h-full object-cover"
              >
            </div>
            
            {{-- News Content --}}
            <div class="p-4">
              <div class="date text-[11px] tracking-wide text-gray-500">
                {{ $article['date'] }}
              </div>
              <h3 class="title mt-1 font-semibold leading-snug">
                {{ $article['title'] }}
              </h3>
              <a href="{{ url('/berita/' . $article['slug']) }}"
                 class="read-more mt-3 inline-block text-sm text-teal-600 hover:underline">
                Lihat Selengkapnya
              </a>
            </div>
          </article>
        @endforeach
      </div>

      {{-- View All Button --}}
      <div class="text-center mt-8">
        <a href="{{ url('/berita') }}"
           class="btn-primary inline-block px-5 py-2 rounded-full bg-teal-500 text-white hover:bg-teal-600 transition-colors">
          Semua Berita
        </a>
      </div>
    </div>
  </section>

  {{-- ================= LATEST ACTIVITIES SECTION ================= --}}
  @php
    $activities = [
      [
        'date' => '3 JUNI 2025',
        'title' => 'Membuat Kerajinan Ecoprint',
        'image' => 'images/contohkegiatan.jpg',
        'slug' => 'kegiatan-ecoprint'
      ],
      [
        'date' => '5 JUNI 2025',
        'title' => 'Kunjungan ke Museum Mulawarman',
        'image' => 'images/contohkegiatan.jpg',
        'slug' => 'kunjungan-museum'
      ],
      [
        'date' => '10 JUNI 2025',
        'title' => 'Workshop Robotika untuk Siswa',
        'image' => 'images/contohkegiatan.jpg',
        'slug' => 'workshop-robotika'
      ],
    ];
  @endphp

  <section class="activities-section relative py-12 md:py-16">
    {{-- Background Gradient --}}
    <div class="absolute inset-0 -z-10 bg-gradient-to-b from-white to-teal-50"></div>
    
    <div class="container mx-auto max-w-7xl px-4">
      <h2 class="text-center text-3xl md:text-4xl font-bold">Kegiatan Terbaru</h2>

      <div class="activities-grid mt-8 grid md:grid-cols-3 gap-6">
        @foreach($activities as $activity)
          <article class="activity-card relative rounded-3xl overflow-hidden shadow-md group">
            {{-- Activity Image --}}
            <img 
              src="{{ asset($activity['image']) }}"
              onerror="this.onerror=null; this.src='{{ asset('images/placeholder-16x9.jpg') }}';"
              alt="{{ $activity['title'] }}"
              class="w-full h-[340px] object-cover group-hover:scale-105 transition-transform duration-300"
            >
            
            {{-- Gradient Overlay --}}
            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
            
            {{-- Activity Info --}}
            <div class="absolute bottom-0 p-5 text-white">
              <div class="date text-xs opacity-90">
                {{ $activity['date'] }}
              </div>
              <h3 class="title text-lg font-semibold leading-snug">
                {{ $activity['title'] }}
              </h3>
            </div>
            
            {{-- Link Overlay --}}
            <a href="{{ url('/kegiatan/' . $activity['slug']) }}" 
               class="absolute inset-0" 
               aria-label="Buka {{ $activity['title'] }}">
            </a>
          </article>
        @endforeach
      </div>

      {{-- View All Button --}}
      <div class="text-center mt-8">
        <a href="{{ url('/kegiatan') }}"
           class="btn-primary inline-block px-5 py-2 rounded-full bg-teal-500 text-white hover:bg-teal-600 transition-colors">
          Semua Kegiatan
        </a>
      </div>
    </div>
  </section>

@endsection

{{-- Optional: Additional Styles --}}
@push('styles')
<style>
  /* Smooth transitions for hover effects */
  .card-link {
    transition: all 0.3s ease;
  }
  
  /* Enhance button hover effects */
  .btn-primary {
    transition: background-color 0.3s ease, transform 0.2s ease;
  }
  
  .btn-primary:hover {
    transform: translateY(-2px);
  }
  
  /* News card hover effect */
  .news-card:hover {
    transform: translateY(-4px);
  }
  
  /* Activity card hover effect */
  .activity-card {
    transition: transform 0.3s ease;
  }
  
  .activity-card:hover {
    transform: translateY(-4px);
  }
</style>
@endpush