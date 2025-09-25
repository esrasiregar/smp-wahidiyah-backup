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
        <div class="image-wrapper order-1 md:order-2 pb-8">
          <img
            src="{{ asset('images/Heroimages.png') }}"
            onerror="this.onerror=null; this.src='{{ asset('images/Heroimages.png') }}';"
            alt="SMP Wahidiyah"
            class="w-90 max-w-lg md:max-w-xl mx-auto md:ml-auto object-contain select-none"
          >
        
        </div>
      </div>
    </div>
  </section>