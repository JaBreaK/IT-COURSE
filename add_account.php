<?php
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = $_POST['password'];  // perbaiki penggunaan variabel password
    $role = $_POST['role'];
    $developer = $_POST['developer'];

    // Query untuk menambahkan akun baru ke database
    $sql = "INSERT INTO akun (nama, email, password, role, developer) 
            VALUES ('$nama', '$email', '$password', '$role', '$developer')";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['error' => 'Error adding account']);
    }

    $conn->close();
}
?>
