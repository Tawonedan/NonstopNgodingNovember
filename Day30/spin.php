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
    <title>Sprei Gratis</title>

    <link rel="stylesheet" href="./asset/css/spin.css">
    <script src="./asset/js/spin.js"></script>

    <!-- Owl Stylesheets -->
    <link rel="stylesheet" href="./asset/css/docs.theme.min.css">

    <link rel="stylesheet" href="./asset/css/owl.carousel.min.css">
    <link rel="stylesheet" href="./asset/css/owl.theme.default.min.css">

    <!-- javascript -->
    <script src="./asset/js/jquery.min.js"></script>
    <script src="./asset/js/owl.carousel.js"></script>

</head>
<body>

      <div class="container">
        <section id="demos">
            <div class="row">
              <div class="large-12 columns">
                <div class="owl-carousel owl-theme">
                  <div class="item" style="height:500px; background-image: url(./asset/img/maharani_banner.png); background-size:cover;">
                    <button onclick="pullOneTimeMaharani()" class="onetime"><b>Grant 1X</b></button> <button onclick="pullTenTimeMaharani()" class="tentime"><b>Grant 10X</b></button>
                  </div>
                  <div class="item" style="height:500px; background-image: url(./asset/img/offwhite_banner.png); background-size:cover;">
                    <button onclick="pullOneTimeOffwhite()" class="onetime"><b>Grant 1X</b></button> <button onclick="pullTenTimeOffwhite()" class="tentime"><b>Grant 10X</b></button>
                  </div>
                  <div class="item" style="height:500px; background-image: url(./asset/img/standart_banner.png); background-size:cover;">
                    <button onclick="pullOneTimeStandard()" class="onetime"><b>Grant 1X</b></button> <button onclick="pullTenTimeStandard()" class="tentime"><b>Grant 10X</b></button>
                  </div>
                </div>
              </div>
            </div>
          </section>
      </div>

            <script>
              $(document).ready(function() {
                $('.owl-carousel').owlCarousel({
                  items: 1,
                  margin: 10,
                  autoHeight: true
                });
              })
            </script>

</body>
</html>