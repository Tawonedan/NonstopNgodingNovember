<?php
session_start();
header('Content-Type: application/json');


$conn = new mysqli("localhost", "root", "", "nnn");


if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];

    $sql = "SELECT * FROM users JOIN items ON users.hold = items.id WHERE users.id = $userId;";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $chosen = $row['name'];
        echo json_encode(['chosen' => $chosen]);
    } else {
        echo "Tidak ada sprei yang dipilih";
    }
} else {
    echo "Tidak ada sprei yang dipilih";
}


$conn->close();
