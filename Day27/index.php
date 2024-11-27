<?php
session_start();
include 'config.php';


if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$result = mysqli_query($conn, "SELECT * FROM users JOIN items ON users.hold = items.id WHERE users.id = $user_id;");

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

        /* #displayRarity {
            visibility: hidden;
        } */
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
        <h3>Current sprei: <span id="displaySprei"></span></h3>
        <?php endwhile ?>
    </div>
    
    <div class="Counter">
        
        <div class="menu">
            <h3>Work your ass off!</h3>
            <p>Bhinneka point saat ini: <span id="displayValue"><?php echo $_SESSION['currency']; ?></span></p>
            <?php while ($row = mysqli_fetch_assoc($result)) :?>
            <h3>Rarity: <span id="displayRarity"><?php echo $row['rarity']; ?></span></h3>
            <?php endwhile ?>
            <button id="start">Start</button>
        </div>
        
        <div class="count">
            <div id="time">
                <span class="digit" id="min">00</span>
                <span class="txt">:</span>
                <span class="digit" id="sec">00</span>
                <span class="txt">:</span>
                <span class="digit" id="count">00</span>
                <span class="txt">Count</span>
            </div>
        </div>
        
        <div class="smashes">
            <span id="click-count"></span>
            <br>
            <button onclick="collectBPoint()" id="collect">collect</button>
        </div>
    </div>
</body>
<script src="index.js"></script>
</html>