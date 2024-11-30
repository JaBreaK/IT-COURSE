<?php
$servername = "sql.freedb.tech:3306";
$username = "freedb_jabreak";
$password = "J9gTE?&pgnFS7Jm"; // Default password jika pakai XAMPP
$dbname = "freedb_admin-itcourse";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
