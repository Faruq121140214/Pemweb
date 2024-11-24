// scripts.js
document.getElementById('registrationForm').addEventListener('submit', function (event) {
    const fileInput = document.getElementById('file');
    const file = fileInput.files[0];

    if (file) {
        // Validasi ukuran file (maksimal 2 MB)
        if (file.size > 2 * 1024 * 1024) {
            alert('File terlalu besar. Maksimal 2MB.');
            event.preventDefault();
        }

        // Validasi tipe file
        const validTypes = ['text/plain'];
        if (!validTypes.includes(file.type)) {
            alert('Hanya file .txt yang diizinkan.');
            event.preventDefault();
        }

        // Validasi file kosong
        if (file.size === 0) {
            alert('File kosong. Silakan pilih file yang valid.');
            event.preventDefault();
        }
    }

    // Validasi form lainnya (contoh: nama)
    const name = document.getElementById('name').value.trim();
    if (name.length < 3) {
        alert('Nama harus lebih dari 3 karakter.');
        event.preventDefault();
    }
});
