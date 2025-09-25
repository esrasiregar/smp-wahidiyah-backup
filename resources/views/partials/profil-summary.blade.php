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
            SMP Wahidiyah merupakan salah satu sekolah jenjang SMP berstatus Swasta yang berada di wilayah
            Jl. Talangsari RT 01 Kec. Samarinda Utara, Kota Samarinda, Kalimantan Timur. Dengan adanya
            keberadaan
            SMP Wahidiyah Samarinda, diharapkan dapat memberikan kontribusi dalam mencerdaskan anak bangsa
            khususnya
            di wilayah Kec. Samarinda Utara, Kota Samarinda dan juga Kalimantan Timur.
          </p>
          <a href="{{ url('/profil') }}"
            class="btn-primary inline-block mt-6 px-5 py-2 rounded-full bg-teal-500 text-white hover:bg-teal-600 transition-colors">
            Profil Lengkap
          </a>
        </div>
      </div>
    </div>
  </section>