<?php
include 'config.php';
$random_number = rand(1, 10);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sprei Gratis</title>
</head>
<body>
    <form action="" method="POST">
        <h3>Mana sprei gratis yang kau janjikan itu hah?</h3>
        <button name="submit" >Aku mau sprei gratis</button>
    </form>

    <div class="result">

    <?php
if (isset($_POST['submit'])) {
    $sql = "SELECT * FROM items WHERE id='$random_number'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
    ?>

    <div class="result-bind" style="padding-top: 50px; text-align:center;">
        <div class="result-img">
            <img src="./img/<?php echo $row["image"] ?>" style="width: 400px;" alt="">
        </div>
        <div class="result-text">
            <h2>Alamak! Kamu mendapatkan:</h2>
            <h3><?php echo $row["name"] ?></h3>
            <h3><?php echo $row["type"] ?></h3>
            <h3><?php echo $row["rarity"] ?></h3>
        </div>
    </div>
    <?php
        }
    } else {
        echo "tidak ada hasil";
    }
}
?>
    </div>
</body>
</html>

<?php
$conn->close();
?>