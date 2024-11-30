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
    <title>Main Menu</title>

    <link rel="stylesheet" href="./asset/css/index.css">
</head>
<body>

  <div class="container">
    <div class="work"> 
      <h1>Station</h1>
      <a href="work.php"><button>Work</button></a>
    </div>
    <div class="inventory"> 
      <h1>Sprei</h1>
      <a href="spin.php"><button>Request</button></a>
    </div>
    <div class="bed"> 
      <h1>Bed</h1>
      <a href="inventory.php"><button>Make</button></a>
    </div>
    </div>
</body>
</html>