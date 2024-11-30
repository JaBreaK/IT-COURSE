document.addEventListener('DOMContentLoaded', function () {
    // Animate counters
    const counters = document.querySelectorAll('.counter');
    counters.forEach(counter => {
      let target = counter.querySelector('span').getAttribute('data-target');
      let current = 0;
      let increment = Math.ceil(target / 100);
      let interval = setInterval(function () {
        current += increment;
        if (current >= target) {
          current = target;
          clearInterval(interval);
        }
        counter.querySelector('span').textContent = current;
      }, 10);
    });

    // Add visibility on scroll
    const observer = new IntersectionObserver(entries => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('visible');
        }
      });
    });
    document.querySelectorAll('.counter, .card').forEach(card => observer.observe(card));
  });
  
  