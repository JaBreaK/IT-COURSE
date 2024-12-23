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
  
  document.getElementById('whatsapp-form').addEventListener('submit', function (e) {
    e.preventDefault(); // Mencegah submit form default

    // Ambil nilai dari form input
    const name = document.getElementById('nama').value;
    const email = document.getElementById('email').value;
    const phone = document.getElementById('phone').value;
    const message = document.getElementById('message').value;

    // Format pesan yang akan dikirim ke WhatsApp
    const waMessage = `Halo, saya ${name}.%0AEmail: ${email}%0ANo HP: ${phone}%0APesan: ${message}`;

    // Redirect ke URL WhatsApp
    const waURL = `https://api.whatsapp.com/send?phone=6285811833522&text=${waMessage}`;
    window.open(waURL, '_blank'); // Membuka link di tab baru
});