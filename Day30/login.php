<?php

include 'config.php';
session_start();

if (isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = hash('sha256', $_POST['password']);

    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    if ($result -> num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['currency'] = $row['bpoint'];
        header("Location: index.php");
        exit();
    } else {
        echo "<script>alert('Email atau password salah')</script>";
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="./asset/css/logreg.css">
</head>
<body>
    <div class="container">
        <h3 class="head-text">Login</h3>
        <form action="" method="POST" class="login-email">
            <div class="input-group">
                <input class="txt-input" type="email" name="email" placeholder="Email" required>
            </div>
            <div class="input-group">
                <input class="txt-input" type="password" name="password" placeholder="Password" required>
            </div>
            <div class="input-group">
                <button name="submit" class="btn">Login</button>
            </div>
            <p>Belum punya akun? <a href="register.php">Daftar</a></p>
        </form>
    </div>
</body>
</html>