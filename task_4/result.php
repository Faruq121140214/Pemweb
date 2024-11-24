<?php
session_start();
if (!isset($_SESSION['data'])) {
    die("Data tidak ditemukan.");
}

$data = $_SESSION['data'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pendaftaran</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="result-container">
        <h2>Hasil Pendaftaran</h2>
        <table>
            <tr>
                <th>Nama</th>
                <td><?= htmlspecialchars($data['name']) ?></td>
            </tr>
            <tr>
                <th>Tanggal Lahir</th>
                <td><?= htmlspecialchars($data['dob']) ?></td>
            </tr>
            <tr>
                <th>Jenis Kelamin</th>
                <td><?= htmlspecialchars($data['gender']) ?></td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td><?= htmlspecialchars($data['address']) ?></td>
            </tr>
            <tr>
                <th>User Agent</th>
                <td><?= htmlspecialchars($data['userAgent']) ?></td>
            </tr>
        </table>

        <h3>Isi File:</h3>
        <table>
            <thead>
                <tr>
                    <th>Baris</th>
                    <th>Konten</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data['fileLines'] as $index => $line): ?>
                    <tr>
                        <td><?= $index + 1 ?></td>
                        <td><?= htmlspecialchars($line) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
