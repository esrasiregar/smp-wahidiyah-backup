<nav class="bg-[#4AA29D] px-6 py-3 shadow-md font-sans relative">
    <div class="container mx-auto flex items-center justify-between">
        
        <!-- Kiri: Logo + Nama Sekolah -->
        <div class="flex items-center space-x-3">
            <img src="{{ asset('images/logosmp.png') }}" alt="Logo SMP" class="h-10 w-auto">
            <span class="text-white font-semibold text-lg">SMP Wahidiyah Samarinda</span>
        </div>

        <!-- Tengah: Nav Links (Desktop) -->
        <ul class="hidden md:flex space-x-6 text-white font-medium absolute left-1/2 transform -translate-x-1/2">
            <li><a href="#" class="hover:underline">Beranda</a></li>
            <li><a href="#" class="hover:underline">Profile</a></li>
            <li><a href="#" class="hover:underline">Berita</a></li>
            <li><a href="#" class="hover:underline">Kegiatan</a></li>
            <li><a href="#" class="hover:underline">Login</a></li>
        </ul>

        <!-- Kanan: Hamburger (Mobile) -->
        <div class="md:hidden">
            <button id="menu-toggle" class="text-white focus:outline-none">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2" 
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" 
                          d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>
    </div>

    <!-- Dropdown Menu (Mobile) -->
    <div id="mobile-menu" class="hidden md:hidden mt-3 px-4">
        <ul class="flex flex-col space-y-3 text-white font-medium">
            <li><a href="#" class="block hover:underline">Beranda</a></li>
            <li><a href="#" class="block hover:underline">Profile</a></li>
            <li><a href="#" class="block hover:underline">Berita</a></li>
            <li><a href="#" class="block hover:underline">Kegiatan</a></li>
            <li><a href="#" class="block hover:underline">Login</a></li>
        </ul>
    </div>
</nav>
