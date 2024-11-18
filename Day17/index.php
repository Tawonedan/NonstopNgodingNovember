<?php
session_start();
include 'config.php';


if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$result = mysqli_query($conn, "SELECT * FROM `user_items` JOIN `items` ON user_items.item_id = items.id WHERE `user_id` = '$user_id';");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berhasil Login</title>

    <style>
        
        * {
            font-family: Arial, Helvetica, sans-serif;
        }
        .column {
            float: left;
            width: 20%;
            padding: 0 10px;
        }

        .row {
            display: flex;
            clear: both;
            
        }

        .card {
            padding: 10px;
            background-color: #f1f1f1;
            margin-top: 15px;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
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

    <div class="container-logout">
        <form action="logout.php" method="POST" class="login-email">
            <h1>Selamat datang, <?php echo $_SESSION['username']; ?>!</h1>
            <div class="input-group">
                <button type="submit" class="btn">Logout</button>
            </div>
        </form>
        <?php 
        $current = $_SESSION['chosen'];
        $rresult = mysqli_query($conn, "SELECT * FROM `items` WHERE id = $current ;");
        while ($rrow = mysqli_fetch_assoc($rresult)) :?>
        <h3>Current sprei: <?php echo $rrow['name'];?></h3>
        <?php endwhile ?>
    </div>

    <div class="gallery row">

    <?php while ($row = mysqli_fetch_assoc($result)) :?>
        <div class="column">
            <div class="card">
                <img src="img/<?php echo $row['image'];?>" alt="">
                <div class="card-container">
                    <h4><b><?php echo $row['name'];?></b></h4>
                    <p><?php echo $row['rarity'];?></p>
                    <form action="" method="POST">
                        <button type="submit" name="choose">Choose</button>
                    </form>
                </div>
            </div>
        </div>
        <?php 
        $item_id = $row['id'];

        if (isset($_POST['choose'])) {
            $ssql = "UPDATE `users` SET `hold` = $item_id WHERE `users`.`id` = $user_id;";
            $rrresult = mysqli_query($conn, $ssql);
        }
        ?>
        <?php endwhile ?>

        
    </div>
</body>
</html>