<?php
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $role = $_POST['role'];

    $sql = "UPDATE akun SET nama='$nama', email='$email', role='$role' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['error' => 'Error updating account']);
    }

    $conn->close();
}
?>
