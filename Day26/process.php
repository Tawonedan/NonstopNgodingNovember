<?php
session_start();
include 'config.php';

header('Content-Type: application/json');

$data = json_decode(file_get_contents("php://input"), true);
$userId = $_SESSION['user_id'];
$BPoint = $data['inputData'];

$conn = new mysqli("localhost", "root", "", "nnn");

$stmt = $conn->prepare("UPDATE users SET bpoint = bpoint + ? WHERE id = ?");
$stmt->bind_param("ii", $BPoint, $userId); // (s: string, i: integer)

if ($stmt->execute()) {
    echo json_encode(['message' => 'Data berhasil diupdate!']);
} else {
    echo json_encode(['message' => 'Gagal mengupdate data: ' . $stmt->error]);
}

$stmt->close();
$conn->close();
?>
