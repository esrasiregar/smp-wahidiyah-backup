document.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll(".month-section").forEach(section => {
        const visibleCount = parseInt(section.dataset.initialVisible || 5);
        const items = section.querySelectorAll(".berita-item");
        const button = section.querySelector(".lihat-lebih");

        // Pas awal → semua item dikasih hidden-fade
        items.forEach(item => item.classList.add("hidden-fade"));

        // Tampilkan hanya sesuai visibleCount dengan animasi
        items.forEach((item, index) => {
            if (index < visibleCount) {
                setTimeout(() => {
                    item.classList.remove("hidden-fade");
                    item.classList.add("animate-fade-in-left");
                }, index * 150);
            } else {
                item.style.display = "none";
            }
        });

        // Event tombol
        if (button) {
            button.addEventListener("click", () => {
                const hiddenItems = Array.from(items).filter(item => item.style.display === "none");

                if (hiddenItems.length > 0) {
                    // Tampilkan semua dengan animasi
                    hiddenItems.forEach((item, index) => {
                        item.style.display = "";
                        item.classList.add("hidden-fade");
                        setTimeout(() => {
                            item.classList.remove("hidden-fade");
                            item.classList.add("animate-fade-in-left");
                        }, index * 150);
                    });
                    button.textContent = "Lihat Lebih Sedikit";
                } else {
                    // Sembunyikan lagi
                    items.forEach((item, index) => {
                        if (index >= visibleCount) {
                            item.style.display = "none";
                        }
                    });
                    button.textContent = "Lihat Lebih Banyak";
                }
            });
        }
    });
});

document.addEventListener("DOMContentLoaded", () => {
            document.querySelectorAll(".month-section").forEach(section => {
                const initialVisible = parseInt(section.dataset.initialVisible, 10);
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

        