<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $dob = trim($_POST['dob']);
    $gender = trim($_POST['gender']);
    $address = trim($_POST['address']);
    $file = $_FILES['file'];

    // Validasi required fields
    if (empty($name) || empty($dob) || empty($gender) || empty($address) || empty($file['name'])) {
        die("Semua data harus diisi.");
    }

    // Validasi panjang data
    if (strlen($name) < 3 || strlen($name) > 50 || strlen($address) < 5 || strlen($address) > 100) {
        die("Panjang data tidak valid.");
    }

    // Validasi upload file
    $allowedTypes = ['text/plain'];
    if (!in_array($file['type'], $allowedTypes)) {
        die("File harus berupa teks (.txt).");
    }

    if ($file['size'] > 2 * 1024 * 1024) {  // Maksimal 2MB
        die("Ukuran file terlalu besar (maksimal 2MB).");
    }

    // Tentukan folder untuk upload file
    $uploadDir = 'uploads/';
    $uploadFile = $uploadDir . basename($file['name']);

    // Cek apakah file berhasil dipindahkan ke folder tujuan
    if (!move_uploaded_file($file['tmp_name'], $uploadFile)) {
        die("Terjadi kesalahan saat mengupload file.");
    }

    // Baca konten file yang diupload
    $fileContent = file_get_contents($uploadFile);
    $fileLines = explode("\n", $fileContent);

    // Ambil informasi User Agent
    $userAgent = $_SERVER['HTTP_USER_AGENT'];

    // Simpan hasil ke dalam session
    $_SESSION['data'] = [
        'name' => $name,
        'dob' => $dob,
        'gender' => $gender,
        'address' => $address,
        'fileLines' => $fileLines,
        'userAgent' => $userAgent
    ];

    // Redirect ke halaman result.php
    header("Location: result.php");
    exit;

} else {
    die("Metode tidak diizinkan.");
}
?>
