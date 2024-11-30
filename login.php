<?php
// Koneksi ke database
$host = "sql200.infinityfree.com";
$user = "if0_37823201";
$password = "GodingGacor2024";
$database = "if0_37823201_godingacademy";

$conn = new mysqli($host, $user, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Tangkap data dari form
$email = $_POST['email'];
$password = $_POST['password'];

// Cek apakah email dan password sesuai
$sql_check = "SELECT * FROM akun WHERE email='$email' AND password='$password'";
$result = $conn->query($sql_check);

if ($result->num_rows > 0) {
    // Login berhasil
    $row = $result->fetch_assoc();
    session_start();
    $_SESSION['email'] = $email;

    // Redirect sesuai role
    if ($row['role'] == 'admin') {
        header("Location: admin.html");
    } else {
        header("Location: index.html");
    }
} else {
    // Login gagal
    echo "<script>alert('Email atau password salah.'); window.location.href='login.html';</script>";
}

$conn->close();
?>
