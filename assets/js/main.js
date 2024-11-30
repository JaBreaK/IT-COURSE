// add hovered class to selected list item
let list = document.querySelectorAll(".navigation li");

function activeLink() {
  list.forEach((item) => {
    item.classList.remove("hovered");
  });
  this.classList.add("hovered");
}

list.forEach((item) => item.addEventListener("mouseover", activeLink));

// Menu Toggle
let toggle = document.querySelector(".toggle");
let navigation = document.querySelector(".navigation");
let main = document.querySelector(".main");

toggle.onclick = function () {
  navigation.classList.toggle("active");
  main.classList.toggle("active");
};



    const darkModeSwitch = document.getElementById('darkModeSwitch');
    const body = document.body;

    // Cek apakah dark mode sudah diaktifkan sebelumnya
    if (localStorage.getItem('darkMode') === 'enabled') {
        body.classList.add('dark-mode');
        darkModeSwitch.checked = true; // Menandakan bahwa dark mode sudah aktif
    }

    // Toggle dark mode saat tombol berubah
    darkModeSwitch.addEventListener('change', () => {
        if (darkModeSwitch.checked) {
            body.classList.add('dark-mode');
            localStorage.setItem('darkMode', 'enabled'); // Simpan status dark mode
        } else {
            body.classList.remove('dark-mode');
            localStorage.setItem('darkMode', 'disabled'); // Hapus status dark mode
        }
    });


    const searchInput = document.getElementById('searchInput');
    const accountRows = document.querySelectorAll('.account-row'); // Ambil semua baris akun

    searchInput.addEventListener('input', function() {
        const searchTerm = searchInput.value.toLowerCase(); // Ambil nilai pencarian dan ubah menjadi lowercase

        accountRows.forEach(row => {
            const rowText = row.textContent.toLowerCase(); // Ambil semua teks dalam baris
            if (rowText.includes(searchTerm)) {
                row.style.display = ''; // Tampilkan baris jika cocok
            } else {
                row.style.display = 'none'; // Sembunyikan baris jika tidak cocok
            }
        });
    });




    function searchAccount() {
        const filter = document.getElementById('searchInput').value.toLowerCase();
        const rows = document.querySelectorAll('#accountList tr');

        rows.forEach(row => {
            const name = row.cells[0].textContent.toLowerCase();
            const email = row.cells[1].textContent.toLowerCase();
            row.style.display = (name.includes(filter) || email.includes(filter)) ? '' : 'none';
        });
    }
