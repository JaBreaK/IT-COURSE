<?php
include 'db_connection.php'; // Ganti dengan file koneksi kamu

// Query untuk mengambil data akun
$sql = "SELECT id, nama, email, password, developer, role FROM akun";
$result = $conn->query($sql);

$accounts = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $accounts[] = $row;
    }
    echo json_encode($accounts); // Kirimkan data dalam bentuk JSON
} else {
    echo json_encode(['error' => 'No accounts found']);
}

$conn->close();
?>
