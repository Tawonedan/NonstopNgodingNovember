<?php
include 'config.php';

$randomNumbers = [];
for ($i = 0; $i < 10; $i++) {
    $randomNumbers[] = rand(1, 10);
}

$results = [];

$currency = 0;
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
        <form id="form" action="" method="POST">
            <h3>Mana sprei gratis yang kau janjikan itu hah?</h3>
            <!-- <button name="submit" >Aku mau sprei gratis</button> -->
             <input type="hidden" name="submit-form">
        </form>
        <button onclick="submitForm()" >Aku mau sprei gratis</button>
        
        <div class="addButton">
            <br>
            <button type="button" onclick="increaseValue()">Tambah Bhinneka point</button>
            <p>Bhinneka point saat ini: <span id="displayValue">0</span></p>
        </div>
    </div>

    <div class="result">

        <div class="gallery">
            <?php
            if (isset($_POST['submit-form'])) {
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