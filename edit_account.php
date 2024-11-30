<?php
header('Content-Type: application/json');

// Koneksi ke database
$conn = new mysqli('sql200.infinityfree.com:3306', 'if0_37823201', 'GodingGacor2024', 'if0_37823201_godingacademy');
if ($conn->connect_error) {
    die(json_encode(["error" => "Connection failed: " . $conn->connect_error]));
}

$data = $_POST;  // Using $_POST to get data from the form

// Validasi input
if (isset($data['id'], $data['nama'], $data['email'], $data['password'], $data['role'], $data['developer'])) {
    $id = $data['id'];
    $nama = $data['nama'];
    $email = $data['email'];
    $password = $data['password'];
    $role = $data['role'];
    $developer = $data['developer'];

    // Prepare SQL statement to avoid SQL injection
    $stmt = $conn->prepare("UPDATE akun SET nama=?, email=?, password=?, role=?, developer=? WHERE id=?");
    if ($stmt === false) {
        echo json_encode(["error" => "Error preparing statement: " . $conn->error]);
        exit();
    }

    // Bind parameters
    $stmt->bind_param("sssssi", $nama, $email, $password, $role, $developer, $id);

    // Execute the query
    if ($stmt->execute()) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["error" => "Error updating account: " . $stmt->error]);
    }

    // Close statement and connection
    $stmt->close();
} else {
    echo json_encode(["error" => "Missing required fields"]);
}

$conn->close();
?>
