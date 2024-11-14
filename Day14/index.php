<?php
session_start();
include 'config.php';

if (!isset($_SESSION['username'])) {
    header("Location: Login.php");
    exit();
}

$randomNumbers = [];
for ($i = 0; $i < 10; $i++) {
    $randomNumbers[] = rand(1, 10);
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
                <p>Bhinneka point saat ini: <span id="displayValue"><?php echo $_SESSION['currency']; ?></span></p>

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
                foreach ($randomNumbers as $number) {
                    $sql = "SELECT * FROM items WHERE id = $number";
                    $result = $conn->query($sql);
                    
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            $results[] = $row;
                        }
                    }
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