import './scroll.js';
document.addEventListener("DOMContentLoaded", () => {
    // === Toggle Mobile Menu ===
    const btn = document.getElementById("menu-toggle");
    const menu = document.getElementById("mobile-menu");
    const overlay = document.getElementById("overlay"); 
    const closeBtn = document.getElementById("close-menu"); // tombol X

    if (btn && menu) {
        btn.addEventListener("click", () => {
            menu.classList.toggle("translate-x-full"); 
            if (overlay) overlay.classList.toggle("hidden");
        });
    }

    // Tutup sidebar kalau klik overlay
    if (overlay) {
        overlay.addEventListener("click", () => {
            menu.classList.add("translate-x-full");
            overlay.classList.add("hidden");
        });
    }

    // Tutup sidebar kalau klik tombol X
    if (closeBtn) {
        closeBtn.addEventListener("click", () => {
            menu.classList.add("translate-x-full");
            if (overlay) overlay.classList.add("hidden");
        });
    }

    // === Tombol "Lihat Lebih Banyak" ===
    document.querySelectorAll(".month-section").forEach(section => {
        const initialVisible = parseInt(section.dataset.initialVisible, 10) || 0;
        const items = section.querySelectorAll(".berita-item");
        const button = section.querySelector(".lihat-lebih");

        let visibleCount = initialVisible;

        if (button) {
            button.addEventListener("click", () => {
                visibleCount += 5;
                items.forEach((item, index) => {
                    if (index < visibleCount) {
                        item.classList.remove("hidden");
                    }
                });
                if (visibleCount >= items.length) {
                    button.style.display = "none";
                }
            });
        }
    });
});

document.addEventListener("DOMContentLoaded", () => {
        const btnOpen = document.getElementById("menu-toggle");
        const btnClose = document.getElementById("menu-close");
        const menu = document.getElementById("mobile-menu");

        if (btnOpen && btnClose && menu) {
            btnOpen.addEventListener("click", () => {
                menu.classList.remove("translate-x-full");
                menu.classList.add("translate-x-0");
            });

            btnClose.addEventListener("click", () => {
                menu.classList.remove("translate-x-0");
                menu.classList.add("translate-x-full");
            });
        }
    });

    document.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll(".month-section").forEach(section => {
        const beritaItems = section.querySelectorAll(".berita-item");
        const btn = section.querySelector(".lihat-lebih");

        // Ambil limit berdasarkan ukuran layar
        const mobileLimit = parseInt(section.dataset.initialVisibleMobile) || 6;
        const desktopLimit = parseInt(section.dataset.initialVisibleDesktop) || 5;
        const isMobile = window.innerWidth < 768; // Tailwind md breakpoint
        const limit = isMobile ? mobileLimit : desktopLimit;

        // Sembunyikan berita di atas limit
        beritaItems.forEach((item, index) => {
            if (index >= limit) item.classList.add("hidden");
        });

        // Tombol "Lihat Lebih Banyak"
        if (btn) {
            btn.addEventListener("click", () => {
                beritaItems.forEach(item => item.classList.remove("hidden"));
                btn.style.display = "none"; // Hilangkan tombol setelah klik
            });
        }
    });
});
// Import JS lain kalau ada
import './berita';
