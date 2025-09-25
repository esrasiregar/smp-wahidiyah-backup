<nav id="navbar"
    class="bg-[#4AA29D] px-6 lg:px-16 py-3 shadow-md font-sans fixed top-0 left-0 right-0 z-50 transition-transform duration-300">
    <div class="container mx-auto flex items-center justify-between">

        <!-- Logo kiri + Nama Sekolah -->
        <div class="flex items-center gap-3">
            <img src="{{ asset('images/logosmp.png') }}" alt="Logo SMP" class="h-10 w-auto">
            <span class="text-white font-semibold text-lg">SMP Wahidiyah Samarinda</span>
            <img src="{{ asset('images/logoyayasan.png') }}" alt="Logo SMP" class="h-16 w-auto">
        </div>

        <!-- Nav Links (Desktop) -->
        <ul class="hidden md:flex items-center space-x-6 text-white font-medium">
            @php
                $links = [
                    ['url' => '/', 'label' => 'Beranda'],
                    ['url' => '/profil', 'label' => 'Profile'],
                    ['url' => '/berita', 'label' => 'Berita'],
                    ['url' => '/kegiatan', 'label' => 'Kegiatan'],
                    ['url' => '/login', 'label' => 'Login'],
                ];
            @endphp

            @foreach ($links as $link)
                <li>
                    <a href="{{ url($link['url']) }}"
                        class="relative px-3 py-2 rounded-md transition-colors duration-300 ease-in-out
                        {{ request()->is(trim($link['url'], '/')) ? 'bg-white text-[#4AA29D] font-semibold shadow' : 'hover:bg-white hover:text-[#4AA29D]' }}">
                        {{ $link['label'] }}
                    </a>
                </li>
            @endforeach
        </ul>

        <!-- Hamburger (Mobile) -->
        <div class="md:hidden">
            <button id="menu-toggle" class="text-white focus:outline-none">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>
    </div>
</nav>

<!-- Sidebar (Mobile) -->
<div id="mobile-menu"
    class="fixed top-0 right-0 h-full w-64 bg-[#4AA29D] bg-opacity-95 backdrop-blur-sm text-white p-6 transform translate-x-full transition-transform duration-300 ease-in-out z-50">

    <!-- Tombol Close -->
    <button id="menu-close" class="mb-6 text-white text-2xl focus:outline-none">
        ✕
    </button>

    <!-- Isi Menu -->
    <nav class="flex flex-col space-y-4 text-lg font-medium">
        <a href="/" class="hover:underline">Beranda</a>
        <a href="/profil" class="hover:underline">Profile</a>
        <a href="/berita" class="hover:underline">Berita</a>
        <a href="/kegiatan" class="hover:underline">Kegiatan</a>
        <a href="/login" class="hover:underline">Login</a>
    </nav>
</div>

<!-- Script -->
<script>
    const menuToggle = document.getElementById("menu-toggle");
    const menuClose = document.getElementById("menu-close");
    const mobileMenu = document.getElementById("mobile-menu");
    const navbar = document.getElementById("navbar");

    // Toggle menu mobile
    menuToggle.addEventListener("click", () => {
        mobileMenu.classList.remove("translate-x-full");
    });
    menuClose.addEventListener("click", () => {
        mobileMenu.classList.add("translate-x-full");
    });

    // Navbar hide/show on scroll
    let lastScrollTop = 0;
    window.addEventListener("scroll", function() {
        let scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        if (scrollTop > lastScrollTop) {
            navbar.style.transform = "translateY(-100%)";
        } else {
            navbar.style.transform = "translateY(0)";
        }
        lastScrollTop = scrollTop <= 0 ? 0 : scrollTop;
    });
</script>
