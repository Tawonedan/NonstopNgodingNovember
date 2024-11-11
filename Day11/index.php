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
    <style>
        
        .gallery {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            grid-template-rows: repeat(2, 1fr);
            grid-column-gap: 0px;
            grid-row-gap: 0px;
            float: left;
            width: 50%;
            padding: 0 10px;
        }

        .card {
            padding: 10px;
            background-color: #f1f1f1;
            margin-top: 15px;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            height: 250px;
        }

        .card img {
            width: 150px;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }

    </style>

</head>
<body>
    <div class="menu">
        <form action="" method="POST">
            <h3>Mana sprei gratis yang kau janjikan itu hah?</h3>
            <button name="submit" >Aku mau sprei gratis</button>
        </form>

    </div>

    <div class="result">
        <div class="gallery">
            <?php
if (isset($_POST['submit'])) {
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
                    <p><?php echo $row['rarity'];?></p>
                </div>
            </div>
        </div>
        <?php
    }
}
?>
</div>
    </div>
</body>
</html>

<?php
$conn->close();
?>