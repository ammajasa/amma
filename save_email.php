<?php
// Konfigurasi koneksi database
$servername = "localhost";
$username = "root"; // Ganti dengan username MySQL Anda
$password = ""; // Ganti dengan password MySQL Anda
$dbname = "download_apk";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("<div style='font-family: Arial, sans-serif; color: red; background-color: #ffdddd; padding: 20px; border: 1px solid red; border-radius: 5px;'>Connection failed: " . $conn->connect_error . "</div>");
}

// Membaca data dari form submission
$email = $_POST['email'];
$type = $_POST['type'];

// Validasi email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("<div style='font-family: Arial, sans-serif; color: red; background-color: #ffdddd; padding: 20px; border: 1px solid red; border-radius: 5px;'>Invalid email format.</div>");
}

// Menyiapkan dan menjalankan pernyataan SQL
$stmt = $conn->prepare("INSERT INTO emails (email, type) VALUES (?, ?)");
$stmt->bind_param("ss", $email, $type);

if ($stmt->execute()) {
    echo "<div style='font-family: Arial, sans-serif; color: green; background-color: #ddffdd; padding: 20px; border: 1px solid green; border-radius: 5px;'>Email berhasil disimpan <br> kami akan kirimkan link download secepatnya setalah peluncuran aplikasi</div>";
} else {
    echo "<div style='font-family: Arial, sans-serif; color: red; background-color: #ffdddd; padding: 20px; border: 1px solid red; border-radius: 5px;'>Error: " . $stmt->error . "</div>";
}

// Menutup statement dan koneksi
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Penyimpanan Email</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .message {
            display: inline-block;
            margin-top: 20px;
        }
        .back-link {
            display: block;
            margin-top: 20px;
            text-decoration: none;
            color: #008CBA;
        }
    </style>
</head>
<body>
    <div class="message">
        <?php echo $message; ?>
    </div>
    <a href="linknya.html" class="back-link">Kembali</a>
    <a href="amma.html" class="back-link">Kembali ke menu utama</a>

</body>
</html>
