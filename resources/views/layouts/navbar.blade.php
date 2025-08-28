<nav class="bg-[#4AA29D] px-6 lg:px-16 py-3 shadow-md font-sans">
    <div class="container mx-auto flex items-center justify-between">
        
        <!-- Logo + Nama Sekolah -->
        <div class="flex items-center space-x-3">
            <img src="{{ asset('images/logosmp.png') }}" alt="Logo SMP" class="h-10 w-auto">
            <span class="text-white font-semibold text-lg">SMP Wahidiyah Samarinda</span>
        </div>

        <!-- Nav Links (Desktop) -->
        <ul class="hidden md:flex space-x-8 text-white font-medium">
            <li><a href="/" class="hover:underline">Beranda</a></li>
            <li><a href="/profile" class="hover:underline">Profile</a></li>
            <li><a href="/berita" class="hover:underline">Berita</a></li>
            <li><a href="/kegiatan" class="hover:underline">Kegiatan</a></li>
            <li><a href="/login" class="hover:underline">Login</a></li>
        </ul>

        <!-- Hamburger (Mobile) -->
        <div class="md:hidden">
            <button id="menu-toggle" class="text-white focus:outline-none">
                <!-- Icon Hamburger -->
                <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>
    </div>
</nav>

<!-- Sidebar (Mobile) -->
<div id="mobile-menu" 
    class="fixed top-0 right-0 h-full w-34 bg-[#4AA29D] bg-opacity-50 backdrop-blur-md text-white p-6 transform translate-x-full transition-transform duration-300 ease-in-out z-50">
    
    <!-- Tombol Close -->
    <button id="menu-close" class="mb-6 text-white text-2xl focus:outline-none">
        ✕
    </button>

    <!-- Isi Menu -->
    <nav class="flex flex-col space-y-4 text-lg font-medium">
        <a href="/" class="hover:underline">Beranda</a>
        <a href="/profile" class="hover:underline">Profile</a>
        <a href="/berita" class="hover:underline">Berita</a>
        <a href="/kegiatan" class="hover:underline">Kegiatan</a>
        <a href="/login" class="hover:underline">Login</a>
    </nav>
</div>

