<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>@yield('title', 'SMP Wahidiyah')</title>
  <link rel="icon" type="image/x-icon" href="{{ asset('images/logosmp.png') }}" />
  @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="min-h-screen flex flex-col bg-gray-100">

  {{-- NAVBAR: kalau posisinya fixed, tambahkan pt-* pada <main> --}}
  @include('partials.navbar')

  {{-- area konten mendorong footer ke bawah --}}
  <main class="flex-1 @if(isset($navbarFixed) && $navbarFixed) pt-20 @endif">
    @yield('content')
  </main>

  @include('partials.footer')
</body>
<script>
    // Sidebar toggle
    const menuToggle = document.getElementById("menu-toggle");
    const menuClose = document.getElementById("menu-close");
    const mobileMenu = document.getElementById("mobile-menu");

    menuToggle.addEventListener("click", () => {
        mobileMenu.classList.remove("translate-x-full");
    });

    menuClose.addEventListener("click", () => {
        mobileMenu.classList.add("translate-x-full");
    });

    // Navbar hide/show on scroll
    let lastScrollTop = 0;
    const navbar = document.getElementById("navbar");

    window.addEventListener("scroll", function () {
        let scrollTop = window.pageYOffset || document.documentElement.scrollTop;

        if (scrollTop > lastScrollTop) {
            // scroll ke bawah -> sembunyikan navbar
            navbar.style.transform = "translateY(-100%)";
        } else {
            // scroll ke atas -> tampilkan navbar
            navbar.style.transform = "translateY(0)";
        }
        lastScrollTop = scrollTop <= 0 ? 0 : scrollTop; // biar gak minus
    });
</script>
<script>
  const wrapper = document.querySelector('.teachers-grid-wrapper');
  const indicatorsContainer = document.getElementById('carousel-indicators');
  const cards = document.querySelectorAll('.teacher-card');
  const total = cards.length;
  const visible = 4; // jumlah kartu yg kelihatan dalam sekali tampil
  let currentIndex = 0;

  // hitung jumlah slide
  const totalSlides = Math.ceil(total / visible);

  // generate indikator
  indicatorsContainer.innerHTML = '';
  for (let i = 0; i < totalSlides; i++) {
      const dot = document.createElement('button');
      dot.className = 'w-3 h-3 rounded-full bg-gray-300';
      if (i === 0) dot.classList.add('bg-teal-500');
      dot.onclick = () => goToSlide(i);
      indicatorsContainer.appendChild(dot);
  }

  function updateIndicators() {
      [...indicatorsContainer.children].forEach((dot, i) => {
          dot.classList.toggle('bg-teal-500', i === currentIndex);
          dot.classList.toggle('bg-gray-300', i !== currentIndex);
      });
  }

  function goToSlide(index) {
      currentIndex = index;
      const offset = -(index * 100);
      wrapper.style.transform = `translateX(${offset}%)`;
      updateIndicators();
  }

  function slideTeachers(direction) {
      if (direction === 'next' && currentIndex < totalSlides - 1) {
          goToSlide(currentIndex + 1);
      } else if (direction === 'prev' && currentIndex > 0) {
          goToSlide(currentIndex - 1);
      }
  }
</script>

</html>