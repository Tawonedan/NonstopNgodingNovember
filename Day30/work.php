<?php
session_start();
include 'config.php';

if (!isset($_SESSION['username'])) {
    header("Location: Login.php");
    exit();
}

include 'navbar.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Work</title>

    <link rel="stylesheet" href="./asset/css/index.css">
    <link rel="stylesheet" href="./asset/css/work.css">
</head>
<body>

      <div class="work-station">
        <div class="sidegig">
            <div class="card">
                <div class="card-img">
                    <img src="./asset/img/sidegig.png" alt="">
                </div>
                <div class="card-container">
                    <h2><b>Side Gig</b></h2>
                    <p class="rarity">Doesn't pay well, but oh well.</p>
                </div>
                <a href="sidegig.html"><button class="onetime"><b>Work</b></button></a>
            </div>
        </div>

        <div class="freelance">
            <div class="card">
                <div class="card-img">
                    <img src="./asset/img/freelance.png" alt="">
                </div>
                <div class="card-container">
                    <h2><b>Freelance</b></h2>
                    <p class="rarity">Definitely many free time, good or bad.</p>
                </div>
                <a href="freelance.html"><button class="onetime"><b>Work</b></button></a>
            </div>
        </div>

        <div class="fulltime">
            <div class="card">
                <div class="card-img">
                    <img src="./asset/img/fulltime.png" alt="">
                </div>                <div class="card-container">
                    <h2><b>FULLTIME</b></h2>
                    <p class="rarity">WORK LIKE A DAMN HORSE</p>
                </div>
                <a href="fulltime.html"><button class="onetime"><b>Work</b></button></a>
            </div>
        </div>

        <div class="break">
            <div class="station"></div>
            <div class="bed"></div>
        </div>
      </div>
</body>
</html>