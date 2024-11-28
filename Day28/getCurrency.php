<?php
session_start();
header('Content-Type: application/json');


$conn = new mysqli("localhost", "root", "", "nnn");


if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];

    $sql = "SELECT bpoint FROM users WHERE id = $userId";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $currency = $row['bpoint'];
        echo json_encode(['currency' => $currency]);
    } else {
        echo json_encode(['currency' => 0]);
    }
} else {
    echo json_encode(['currency' => 0]);
}

$conn->close();
