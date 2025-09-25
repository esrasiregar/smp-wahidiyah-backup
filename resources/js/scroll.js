
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

