<?php
session_start();
include 'config.php';

if (!isset($_SESSION['username'])) {
    header("Location: Login.php");
    exit();
}

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



$results = [];

$currency = 0;

$user_id = $_SESSION['user_id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sprei Gratis</title>
    <link rel="stylesheet" href="index.css">

</head>
<body>
    <div class="menu">
        <div class="main-menu">
            <form id="form" action="" method="POST">
                <h3>Mana sprei gratis yang kau janjikan itu hah?</h3>
                 <input type="hidden" name="submit-form">
            </form>

            <button onclick="submitForm()" >Aku mau sprei gratis</button>
            
            <div class="addButton">
                <br>
                <button type="button" onclick="increaseValue()">Tambah Bhinneka point</button>
                <p>Bhinneka point saat ini: <span id="displayValue">-</span></p>

                <form id="add_credit" action="" method="POST">
                     <input type="hidden" name="add">
                </form>

                <?php 
                if (isset($_POST['add'])) {
                    $sql = "UPDATE users SET bpoint = bpoint + 1000 WHERE id = '$user_id'" ;
                    $result = $conn->query($sql);
                }
                
                ?>
            </div>
        </div>

        <div class="user-menu">
        <form action="logout.php" method="POST" class="login-email">
            <h1>Selamat datang, <?php echo $_SESSION['username']; ?>!</h1>
            <div class="input-group">
                <button type="submit" class="btn">Logout</button>
            </div>
        </form>
    </div>
    </div>

    <div class="result">
        
        <div class="gallery">
            <?php
            if (isset($_POST['submit-form'])) {
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
                
                foreach ($results as $row) {
            ?>

        <div class="card-list">
            <div class="card">
                <img src="img/<?php echo $row['image'];?>" alt="">
                <div class="card-container">
                    <h4><b><?php echo $row['name'];?></b></h4>
                    <p class="rarity-<?php echo $row['rarity'];?>"><?php echo $row['rarity'];?></p>
                </div>
            </div>
        </div>
        
        <?php } } ?>
    </div>
    
    </div>
</body>
<script src="index.js"></script>
</html>

<?php
$conn->close();
?>