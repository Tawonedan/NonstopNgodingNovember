<?php
if (isset($_GET['results'])) {
    $results = json_decode(urldecode($_GET['results']), true);

    // Tampilkan hasil
    foreach ($results as $item) {
        echo "Item ID: " . $item['item_id'] . "<br>";
        echo "Name: " . $item['name'] . "<br>";
        echo "Rarity: " . $item['rarity'] . "<br><hr>";
    }
} else {
    echo "Tidak ada hasil yang diterima.";
}
?>
