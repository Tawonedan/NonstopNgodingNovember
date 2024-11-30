<?php 

include 'config.php';
session_start();

if (isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = hash('sha256', $_POST['password']);
    $cpassword = hash('sha256', $_POST['cpassword']);

    if ($password == $cpassword) {
        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($conn, $sql);
        if (!$result -> num_rows > 0) {
            $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo "<script>alert('Pendaftaran berhasil')</script>";
                $username = "";
                $email = "";
                $_POST['password'] = "";
                $_POST['cpassword'] = "";
            } else {
                echo "<script>alert('Terjadi kesalahan')</script>";
            }
        } else {
            echo "<script>alert('Email sudah ada')</script>";
        }
    } else {
        echo "<script>alert('Password tidak sesuai')</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <link rel="stylesheet" href="./asset/css/logreg.css">
</head>
<body>
    <div class="container">
        <form action="" method="POST">
            <h3 class="head-text">Register</h3>
            <div class="input-group">
                <input class="txt-input" type="text" name="username" id="" placeholder="Username" required>
            </div>
            <div class="input-group">
                <input class="txt-input" type="email" name="email" id="" placeholder="Email" required>
            </div>
            <div class="input-group">
                <input class="txt-input" type="password" name="password" id="" placeholder="Password" required>
            </div>
            <div class="input-group">
                <input class="txt-input" type="password" name="cpassword" id="" placeholder="Confirm Password" required>
            </div>
            <div class="input-group">
                <button class="btn" type="submit" name="submit">Daftar</button>
            </div>
            <p>Sudah punya akun? <a href="login.php">Login</a></p>
        </form>
    </div>


</body>
</html>