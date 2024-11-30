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
$nama = $_POST['nama'];
$email = $_POST['email'];
$password = $_POST['password'];
$role = $_POST['role'];
$developer = 'no';  // Default value

// Cek apakah email sudah ada di database
$sql_check = "SELECT * FROM akun WHERE email='$email'";
$result = $conn->query($sql_check);

if ($result->num_rows > 0) {
    // Email sudah digunakan
    echo "<script>alert('Email sudah terdaftar, silakan gunakan email lain.'); window.location.href='register.html';</script>";
} else {
    // Simpan data ke database
    $sql_insert = "INSERT INTO akun (nama, email, password, role, developer) 
                   VALUES ('$nama', '$email', '$password', '$role', '$developer')";

    if ($conn->query($sql_insert) === TRUE) {
        session_start();
        $_SESSION['email'] = $email;

        // Redirect sesuai role
        if ($role == 'admin') {
            header("Location: login.html");
        } else {
            header("Location: login.html");
        }
    } else {
        echo "Error: " . $sql_insert . "<br>" . $conn->error;
    }
}

$conn->close();
?>
