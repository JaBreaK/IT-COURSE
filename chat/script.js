// Mengirim pesan ke server PHP
document.getElementById('send-btn').addEventListener('click', () => {
    const name = document.getElementById('name-input').value.trim();
    const message = document.getElementById('message-input').value.trim();

    if (name && message) {
        const fullMessage = `${name}: ${message}`;

        fetch('save_message.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: `message=${encodeURIComponent(fullMessage)}`
        })
        .then(() => {
            document.getElementById('message-input').value = '';
            reloadChat(); // Reload chat tanpa me-refresh iframe secara penuh
        })
        .catch(err => console.error('Error:', err));
    }
});

// Fungsi untuk scroll iframe ke bawah
function scrollIframeToBottom() {
    const iframe = document.getElementById('chat-iframe');
    const iframeDoc = iframe.contentWindow.document;
    iframe.contentWindow.scrollTo(0, iframeDoc.body.scrollHeight);
}

// Fungsi untuk memuat ulang konten iframe
function reloadChat() {
    const iframe = document.getElementById('chat-iframe');
    const iframeDoc = iframe.contentWindow.document;

    // Cek perubahan di chat.txt dan muat ulang konten iframe
    iframe.contentWindow.location.reload(); // Reload iframe sepenuhnya
    scrollIframeToBottom(); // Scroll ke bagian bawah
}

// Polling untuk memeriksa apakah ada pesan baru
setInterval(reloadChat, 1009); // Periksa setiap 5 detik

function toggleMessenger() {
    var messenger = document.getElementById('floating-messenger');
    var toggleBtn = document.getElementById('toggle-btn');
    
    if (messenger.style.display === "none" || messenger.style.display === "") {
        messenger.style.display = "block";
        toggleBtn.textContent = "Sembunyikan Grup Chat";
    } else {
        messenger.style.display = "none";
        toggleBtn.textContent = "Grup Chat";
    }
}

function closeMessenger() {
    var messenger = document.getElementById('floating-messenger');
    var toggleBtn = document.getElementById('toggle-btn');
    
    messenger.style.display = "none";
    toggleBtn.textContent = "Grup Chat";
}
