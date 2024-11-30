<?php
$conn = new mysqli('sql200.infinityfree.com:3306', 'if0_37823201', 'GodingGacor2024', 'if0_37823201_godingacademy');
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$action = $_POST['action'];

if ($action == 'add') {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $role = $_POST['role'];
    $sql = "INSERT INTO akun (nama, email, role) VALUES ('$nama', '$email', '$role')";
} elseif ($action == 'edit') {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $role = $_POST['role'];
    $sql = "UPDATE akun SET nama='$nama', email='$email', role='$role' WHERE id=$id";
} elseif ($action == 'delete') {
    $id = $_POST['id'];
    $sql = "DELETE FROM akun WHERE id=$id";
}

if ($conn->query($sql) === TRUE) {
    echo "Sukses";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
