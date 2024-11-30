<?php
$servername = "sql200.infinityfree.com:3306";
$username = "if0_37823201";
$password = "GodingGacor2024"; // Default password jika pakai XAMPP
$dbname = "if0_37823201_godingacademy";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
