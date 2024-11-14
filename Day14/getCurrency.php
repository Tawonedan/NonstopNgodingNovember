<?php
session_start();
header('Content-Type: application/json');

// Buat koneksi ke database
$conn = new mysqli("localhost", "root", "", "nnn");

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Pastikan user sudah login dan session user_id ada
if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];
    // Ambil nilai currency terbaru dari database berdasarkan user_id
    $sql = "SELECT bpoint FROM users WHERE id = $userId";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $currency = $row['bpoint'];
        echo json_encode(['currency' => $currency]);
    } else {
        echo json_encode(['currency' => 0]); // Jika user tidak ditemukan
    }
} else {
    echo json_encode(['currency' => 0]); // Jika session user_id tidak ada
}

// Tutup koneksi
$conn->close();
?>
