@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    {{-- ===== HERO SECTION ===== --}}
    <section class="hero-section relative overflow-hidden pt-20 sm:pt-24 md:pt-28">
        {{-- Background Gradient --}}
        <div class="absolute inset-0 -z-10 bg-gradient-to-b from-teal-50 via-white to-teal-50/60"></div>

        <div class="container mx-auto max-w-7xl px-4 sm:px-6">
            <div class="grid grid-cols-1 md:grid-cols-[360px,1fr] gap-6 sm:gap-8 md:gap-12 items-center">
                {{-- Building Image --}}
                <div
                    class="image-container rounded-xl sm:rounded-2xl overflow-hidden shadow-sm mx-auto w-full max-w-sm md:max-w-none">
                    <img src="{{ asset('images/logosmp.png') }}"
                        onerror="this.onerror=null; this.src='{{ asset('images/placeholder-4x3.jpg') }}';"
                        alt="Gedung SMP Wahidiyah" class="w-full h-full object-cover">
                </div>

                {{-- Title --}}
                <div class="title-container text-center md:text-left">
                    <h1 class="text-3xl sm:text-4xl md:text-5xl font-extrabold leading-tight tracking-tight">
                        PROFIL SMP
                        <span class="text-teal-500">WAHIDIYAH</span>
                        <br />
                        SAMARINDA
                    </h1>
                </div>
            </div>
        </div>
    </section>

    {{-- ===== SCHOOL PROFILE SECTION ===== --}}
    <section class="profile-section">
        <div class="container mx-auto max-w-7xl px-4 sm:px-6">

            {{-- School Profile --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 sm:gap-10 md:gap-14 items-start py-8 sm:py-10">
                <div class="content-wrapper order-2 md:order-1">
                    <h2 class="text-2xl sm:text-3xl font-bold mb-4">Profil Sekolah</h2>
                    <p class="text-sm sm:text-base text-gray-700 leading-relaxed">
                        SMP Wahidiyah merupakan salah satu sekolah jenjang SMP berstatus Swasta yang berada di wilayah
                        Jl. Talangsari RT 01 Kec. Samarinda Utara, Kota Samarinda, Kalimantan Timur. Dengan adanya
                        keberadaan
                        SMP Wahidiyah Samarinda, diharapkan dapat memberikan kontribusi dalam mencerdaskan anak bangsa
                        khususnya
                        di wilayah Kec. Samarinda Utara, Kota Samarinda dan juga Kalimantan Timur.
                    </p>
                    <p class="text-sm sm:text-base text-gray-700 leading-relaxed mt-3">
                        Sekolah Wahidiyah di Samarinda selain SMP, SMA Wahidiyah juga ada Pondok Pesantren Kedunglo 7 yang
                        merupakan cabang dari Sekolah Wahidiyah dan Pondok Kedunglo pusat yaitu Kediri Jawa Timur. Untuk
                        siswa/santri dari luar Kota atau luar daerah dapat tinggal di Pondok/Pesantren.
                    </p>
                </div>

                <div
                    class="image-wrapper rounded-xl sm:rounded-2xl overflow-hidden border shadow-sm order-1 md:order-2 mx-auto w-full max-w-md md:ml-auto">
                    <img src="{{ asset('images/nantigedung.jpg') }}"
                        onerror="this.onerror=null; this.src='{{ asset('images/placeholder-4x3.jpg') }}';"
                        alt="Gedung Sekolah" class="w-full h-full object-cover">
                </div>
            </div>

            {{-- Brief History --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 sm:gap-10 md:gap-14 items-start pb-8 sm:pb-12">
                <div
                    class="image-wrapper rounded-xl sm:rounded-2xl overflow-hidden shadow-sm mx-auto w-full max-w-md md:ml-0">
                    <img src="{{ asset('images/logoyayasan.png') }}"
                        onerror="this.onerror=null; this.src='{{ asset('images/placeholder-4x3.jpg') }}';"
                        alt="Gedung Sekolah" class="w-full h-full object-cover">
                </div>

                <div class="content-wrapper">
                    <h2 class="text-2xl sm:text-3xl font-bold mb-4">Sejarah Singkat</h2>
                    <p class="text-sm sm:text-base text-gray-700 leading-relaxed">
                        SMP Wahidiyah didirikan pada tanggal 16 Juli 2016 dengan Nomor SK Pendirian 812/PW-A/SK/IX/1437
                        yang berada dibawah Naungan Yayasan Perjuangan Wahidiyah dan Pondok Pesantren Kedunglo serta berada
                        dalam lingkup Dinas Pendidikan Kota Samarinda.
                    </p>
                    <p class="text-sm sm:text-base text-gray-700 leading-relaxed mt-3">
                        Sebagai lembaga pendidikan yang terakreditasi B, SMP Wahidiyah terus berkomitmen untuk meningkatkan
                        kualitas pendidikan dan menghasilkan lulusan yang unggul dalam keimanan, ketaqwaan, ilmu pengetahuan
                        dan teknologi.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- ===== VISION & MISSION SECTION ===== --}}
    <section class="vision-mission-section py-12 sm:py-16 bg-gradient-to-b from-teal-50/30 to-white">
        <div class="container mx-auto max-w-7xl px-4 sm:px-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 sm:gap-8">
                {{-- Vision Card --}}
                <div class="vm-card bg-white rounded-xl sm:rounded-2xl p-6 sm:p-8 shadow-lg relative overflow-hidden">
                    {{-- Top gradient bar --}}
                    <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-teal-400 to-teal-600"></div>

                    <h3 class="text-xl sm:text-2xl font-bold text-center mb-4 sm:mb-6 text-gray-800">Visi</h3>
                    <p class="text-sm sm:text-base text-gray-600 leading-relaxed text-center">
                        Mencetak Wali yang Intelek dan Intelektual yang Wali
                    </p>
                </div>

                {{-- Mission Card --}}
                <div class="vm-card bg-white rounded-xl sm:rounded-2xl p-6 sm:p-8 shadow-lg relative overflow-hidden">
                    {{-- Top gradient bar --}}
                    <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-teal-400 to-teal-600"></div>

                    <h3 class="text-xl sm:text-2xl font-bold text-center mb-4 sm:mb-6 text-gray-800">Misi</h3>
                    <p class="text-sm sm:text-base text-gray-600 leading-relaxed text-center">
                        Mewujudkan Sumber Daya Insani yang berkualitas, unggul dalam keimanan, ketaqwaan, ilmu pengetahuan
                        dan Teknologi.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- Blade untuk Section Daftar Guru --}}
    <section class="teachers-section py-16 bg-white">
        <div class="container mx-auto max-w-7xl px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800">Daftar Guru</h2>
                <p class="mt-2 text-gray-600">Tim pengajar profesional dan berpengalaman</p>
            </div>

            {{-- Teachers Carousel Container --}}
            <div class="teachers-carousel-container relative">
                {{-- Navigation Buttons --}}
                <button type="button" onclick="slideTeachers('prev')"
                    class="carousel-prev-btn absolute -left-6 top-1/2 -translate-y-1/2 z-10 w-12 h-12 bg-teal-500 hover:bg-teal-600 disabled:bg-gray-300 disabled:cursor-not-allowed text-white rounded-full shadow-lg flex items-center justify-center transition-all">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                </button>

                <button type="button" onclick="slideTeachers('next')"
                    class="carousel-next-btn absolute -right-6 top-1/2 -translate-y-1/2 z-10 w-12 h-12 bg-teal-500 hover:bg-teal-600 disabled:bg-gray-300 disabled:cursor-not-allowed text-white rounded-full shadow-lg flex items-center justify-center transition-all">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </button>

                {{-- Teachers Grid Wrapper --}}
                <div class="overflow-hidden mx-8">
                    <div class="teachers-grid-wrapper flex gap-6 transition-transform duration-500 ease-in-out"
                        style="transform: translateX(0);">
                        @foreach ($teachers as $teacher)
                            <article
                                class="teacher-card flex-shrink-0 w-64 bg-white rounded-2xl shadow-lg overflow-hidden hover:-translate-y-2 transition-transform duration-300">
                                <div class="aspect-[3/4] bg-gradient-to-br from-teal-100 to-teal-200 relative">
                                    <img src="{{ asset('storage/' . $teacher->photo_path) }}"
                                        onerror="this.onerror=null; this.style.display='none'; this.nextElementSibling.style.display='flex';"
                                        alt="{{ $teacher->name }}" class="w-full h-full object-cover">
                                    {{-- Fallback icon when image not found --}}
                                    <div class="absolute inset-0 hidden items-center justify-center text-6xl">
                                        👩‍🏫
                                    </div>
                                </div>
                                <div class="p-4 text-center">
                                    <h3 class="font-semibold text-gray-800 text-lg">{{ $teacher->name }}</h3>
                                    <p class="text-sm text-teal-600 mt-1">{{ $teacher->position }}</p>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </div>
            </div>

            {{-- Carousel Indicators --}}
            <div class="flex justify-center mt-6 gap-2" id="carousel-indicators">
                {{-- Indicators will be generated by JavaScript --}}
            </div>
        </div>
    </section>

    <br>

    {{-- ===== SCHOOL DATA SECTION ===== --}}
    <section class="school-data-section py-16">
        <div class="container mx-auto max-w-7xl px-4">
            <h2 class="text-center text-3xl md:text-4xl font-bold text-gray-800 mb-12">Data Sekolah</h2>

            <div class="grid md:grid-cols-2 gap-8">

                {{-- School Info Card --}}
                <div class="info-card rounded-2xl shadow-xl bg-slate-900 text-white p-8">
                    {{-- Header --}}
                    <div class="flex items-center justify-between mb-6">
                        <div>
                            <h3 class="text-xl font-bold">SMP Wahidiyah Samarinda</h3>
                            <div class="text-sm text-gray-400 mt-1">
                                NPSN: <span class="text-teal-400 font-semibold underline">69968785</span>
                            </div>
                        </div>
                        <div class="flex gap-1">
                            <span class="w-8 h-8 bg-teal-400 rounded"></span>
                            <span class="w-8 h-8 bg-teal-400 rounded"></span>
                            <span class="w-8 h-8 bg-teal-400 rounded"></span>
                        </div>
                    </div>

                    {{-- Divider --}}
                    <div class="border-t border-gray-700 mb-6"></div>

                    {{-- School Details Table --}}
                    <div class="space-y-4">
                        {{-- Row 1 --}}
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <div class="text-gray-400 text-sm mb-1">Nama</div>
                                <div class="font-medium">SMP Wahidiyah Samarinda</div>
                            </div>
                            <div class="text-right">
                                <div class="text-gray-400 text-sm mb-1">NPSN</div>
                                <div class="font-medium">69968785</div>
                            </div>
                        </div>

                        {{-- Row 2 --}}
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <div class="text-gray-400 text-sm mb-1">Alamat</div>
                                <div class="font-medium text-sm">Jl. Talangsari RT 01 Kelurahan Tanah Merah</div>
                            </div>
                            <div class="text-right">
                                <div class="text-gray-400 text-sm mb-1">Kecamatan</div>
                                <div class="font-medium">Samarinda Utara</div>
                            </div>
                        </div>

                        {{-- Row 3 --}}
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <div class="text-gray-400 text-sm mb-1">Kota</div>
                                <div class="font-medium">Kota Samarinda</div>
                            </div>
                            <div class="text-right">
                                <div class="text-gray-400 text-sm mb-1">Provinsi</div>
                                <div class="font-medium">Kalimantan Timur</div>
                            </div>
                        </div>

                        {{-- Row 4 --}}
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <div class="text-gray-400 text-sm mb-1">Kode Pos</div>
                                <div class="font-medium">75118</div>
                            </div>
                            <div class="text-right">
                                <div class="text-gray-400 text-sm mb-1">Status</div>
                                <div class="font-medium">Swasta</div>
                            </div>
                        </div>

                        {{-- Row 5 --}}
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <div class="text-gray-400 text-sm mb-1">Akreditasi</div>
                                <div class="font-medium text-teal-400 text-lg">B</div>
                            </div>
                            <div class="text-right">
                                <div class="text-gray-400 text-sm mb-1">SK Pendirian</div>
                                <div class="font-medium text-xs">812/PW-A/SK/IX/1437</div>
                            </div>
                        </div>

                        {{-- Row 6 --}}
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <div class="text-gray-400 text-sm mb-1">Telepon</div>
                                <div class="font-medium">
                                    <a href="tel:08565412631" class="hover:text-teal-400 transition-colors">
                                        0856-5412-6313
                                    </a>
                                </div>
                            </div>
                            <div class="text-right">
                                <div class="text-gray-400 text-sm mb-1">Email</div>
                                <div class="font-medium text-sm">
                                    <a href="mailto:smpwahidiyahsmd@gmail.com"
                                        class="hover:text-teal-400 transition-colors break-all">
                                        smpwahidiyahsmd@gmail.com
                                    </a>
                                </div>
                            </div>
                        </div>

                        {{-- Row 7 --}}
                        <div class="border-t border-gray-700 pt-4">
                            <div class="text-gray-400 text-sm mb-2">Naungan</div>
                            <div class="font-medium text-sm">Yayasan Perjuangan Wahidiyah dan Pondok Pesantren Kedunglo
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Google Maps Embed --}}
                <div class="map-container rounded-2xl overflow-hidden shadow-xl">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.6896845379874!2d117.19382470000001!3d-0.4600904!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2df5d7d0c22487c3%3A0x376577eb99693b27!2sSMP-SMA%20Wahidiyah%20Samarinda!5e0!3m2!1sen!2sid!4v1756586510778!5m2!1sen!2sid"
                        width="100%" height="100%" style="border:0; min-height: 450px;" allowfullscreen=""
                        loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="w-full h-full">
                    </iframe>
                </div>
            </div>
        </div>
    </section>
@endsection

{{-- Custom Styles --}}
@push('styles')
    <style>
        .no-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }

        /* Vision Mission Cards */
        .vm-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .vm-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }

        /* Teacher Card Styles */
        .teacher-card {
            transition: all 0.3s ease;
        }

        .teacher-card:hover {
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
        }

        /* Carousel Indicators */
        .carousel-indicator {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background-color: #cbd5e1;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .carousel-indicator.active {
            width: 24px;
            background-color: #14b8a6;
            border-radius: 4px;
        }
    </style>
@endpush

{{-- JavaScript for Teachers Carousel --}}
@push('scripts')
    <script>
        // Teachers carousel variables
        let currentSlide = 0;
        const cardWidth = 272; // 256px (w-64) + 24px gap (approximation)
        let cardsPerView = 4;
        let totalCards = {{ count($teachers) }};
        let maxSlide = 0;

		let currentIndex = 0;
		const wrapper = document.querySelector('.teachers-grid-wrapper');
		const cards = document.querySelectorAll('.teacher-card');
		const visibleCount = Math.floor(wrapper.parentElement.offsetWidth / 256); // jumlah yang muat

		function slideTeachers(direction) {
			const maxIndex = cards.length - visibleCount;
			if (direction === 'next') {
				currentIndex = Math.min(currentIndex + 1, maxIndex);
			} else {
				currentIndex = Math.max(currentIndex - 1, 0);
			}
			wrapper.style.transform = `translateX(-${currentIndex * 272}px)`; // 256 + gap(16)
		}

        // Initialize carousel on page load
        document.addEventListener('DOMContentLoaded', function() {
            initializeCarousel();
            window.addEventListener('resize', handleResize);
        });

        function initializeCarousel() {
            const container = document.querySelector('.teachers-carousel-container');
            const containerWidth = container ? container.offsetWidth - 64 : 1200; // subtract button widths

            // Calculate cards per view based on container width
            cardsPerView = Math.floor(containerWidth / cardWidth);
            if (cardsPerView < 1) cardsPerView = 1;

            // Calculate max slides
            maxSlide = Math.max(0, Math.ceil(totalCards / cardsPerView) - 1);

            // Create indicators
            createIndicators();

            // Update carousel position
            updateCarousel();
        }

        function createIndicators() {
            const indicatorsContainer = document.getElementById('carousel-indicators');
            if (!indicatorsContainer) return;

            indicatorsContainer.innerHTML = '';
            const totalIndicators = maxSlide + 1;

            for (let i = 0; i <= maxSlide; i++) {
                const indicator = document.createElement('span');
                indicator.className = 'carousel-indicator';
                indicator.onclick = () => goToSlide(i);
                indicatorsContainer.appendChild(indicator);
            }
        }

        function slideTeachers(direction) {
            if (direction === 'prev' && currentSlide > 0) {
                currentSlide--;
            } else if (direction === 'next' && currentSlide < maxSlide) {
                currentSlide++;
            }
            updateCarousel();
        }

        function goToSlide(slideIndex) {
            currentSlide = slideIndex;
            updateCarousel();
        }

        function updateCarousel() {
            const grid = document.querySelector('.teachers-grid-wrapper');
            const prevBtn = document.querySelector('.carousel-prev-btn');
            const nextBtn = document.querySelector('.carousel-next-btn');

            if (!grid) return;

            // Calculate translation
            const translateX = -(currentSlide * cardsPerView * cardWidth);
            grid.style.transform = `translateX(${translateX}px)`;

            // Update button states
            if (prevBtn) {
                prevBtn.disabled = currentSlide === 0;
                if (currentSlide === 0) {
                    prevBtn.classList.add('opacity-50', 'cursor-not-allowed');
                } else {
                    prevBtn.classList.remove('opacity-50', 'cursor-not-allowed');
                }
            }

            if (nextBtn) {
                nextBtn.disabled = currentSlide === maxSlide;
                if (currentSlide === maxSlide) {
                    nextBtn.classList.add('opacity-50', 'cursor-not-allowed');
                } else {
                    nextBtn.classList.remove('opacity-50', 'cursor-not-allowed');
                }
            }

            // Update indicators
            updateIndicators();
        }

        function updateIndicators() {
            const indicators = document.querySelectorAll('.carousel-indicator');
            indicators.forEach((indicator, index) => {
                if (index === currentSlide) {
                    indicator.classList.add('active');
                } else {
                    indicator.classList.remove('active');
                }
            });
        }

        function handleResize() {
            // Debounce resize
            clearTimeout(window.resizeTimer);
            window.resizeTimer = setTimeout(() => {
                initializeCarousel();
            }, 250);
        }

        // Auto-play functionality (optional)
        let autoplayInterval;

        function startAutoplay() {
            stopAutoplay();
            autoplayInterval = setInterval(() => {
                if (currentSlide < maxSlide) {
                    currentSlide++;
                } else {
                    currentSlide = 0;
                }
                updateCarousel();
            }, 5000); // Change slide every 5 seconds
        }

        function stopAutoplay() {
            if (autoplayInterval) {
                clearInterval(autoplayInterval);
            }
        }

        // Start autoplay on load (optional - uncomment if you want autoplay)
        // startAutoplay();

        // Pause autoplay on hover (if autoplay is enabled)
        const carousel = document.querySelector('.teachers-carousel-container');
        if (carousel) {
            carousel.addEventListener('mouseenter', stopAutoplay);
            // carousel.addEventListener('mouseleave', startAutoplay); // Uncomment if you want autoplay to resume
        }
    </script>
@endpush
