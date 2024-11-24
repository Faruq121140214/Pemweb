<?php
// form.php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="form-container">
        <h2>Form Pendaftaran</h2>
        <form id="registrationForm" action="process.php" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
            <label for="name">Nama</label>
            <input type="text" id="name" name="name" required minlength="3" maxlength="50">

            <label for="dob">Tanggal Lahir</label>
            <input type="date" id="dob" name="dob" required>

            <label for="gender">Jenis Kelamin</label>
            <select id="gender" name="gender" required>
                <option value="">Pilih</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>

            <label for="address">Alamat</label>
            <input type="text" id="address" name="address" required minlength="5" maxlength="100">

            <label for="file">Upload File (Teks)</label>
            <input type="file" id="file" name="file" accept=".txt" required>

            <button type="submit">Submit</button>
        </form>
    </div>

    <script src="js/scripts.js"></script>
</body>
</html>
