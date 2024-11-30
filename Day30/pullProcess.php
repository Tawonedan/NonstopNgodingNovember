<?php
session_start();
include 'config.php';

header('Content-Type: application/json');

$results = [];

$currency = 0;



function getRarity() {
    $rarities = [
        'Common' => 55,   
        'Uncommon' => 35, 
        'Rare' => 8,      
        'Epic' => 2       
    ];

    $random = rand(1, 100);
    $cumulative = 0;

    foreach ($rarities as $rarity => $probability) {
        $cumulative += $probability;
        if ($random <= $cumulative) {
            return $rarity; 
        }
    }

    return 'Common';
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);
    $action = $data['action'] ?? null;
    $user_id = $_SESSION['user_id'];

    if (!$action) {
        echo json_encode(['success' => false, 'message' => 'Aksi tidak ditemukan.']);
        exit();
    }

    $conn = new mysqli('localhost', 'root', '', 'nnn');

    if ($conn->connect_error) {
        echo json_encode(['success' => false, 'message' => 'Koneksi gagal: ' . $conn->connect_error]);
        exit();
    }

    switch ($action) {
        case 'tenXMaharani':
            oneXMaharani($conn, $user_id);
            break;

        case 'pullSword':
            tenXMaharani($conn, $user_id);
            break;

        default:
            echo json_encode(['success' => false, 'message' => 'Aksi tidak valid.']);
            break;
    }

    $conn->close();
} else {
    echo json_encode(['success' => false, 'message' => 'Hanya menerima metode POST.']);
}

// Fungsi untuk shield
function oneXMaharani($conn, $user_id) {


}

// Fungsi untuk sword
function tenXMaharani($conn, $user_id) {
    // Cek poin user
    $updateQuery = "UPDATE users SET bpoint = bpoint - 1000 WHERE id = '$user_id'";
    $conn->query($updateQuery);

    for ($i = 0; $i < 10; $i++) {

        $rarity = getRarity();

        $sql = "SELECT * FROM items WHERE rarity = '$rarity' ORDER BY RAND() LIMIT 1";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $results[] = $result->fetch_assoc();
        }
    }

    foreach ($results as $item) {
        $itemId = $item['item_id'];
        $insertQuery = "INSERT INTO user_items (user_id, item_id) VALUES (?, ?)";
        $stmt = $conn->prepare($insertQuery);
        $stmt->bind_param("ii", $user_id, $itemId);
        $stmt->execute();
    }

    $encodedResults = urlencode(json_encode($results));
    header("Location: results_page.php?results=$encodedResults");
    exit();

}
