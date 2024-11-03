<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JanKenPon</title>

    <style>
        
    </style>
</head>
<body>
    <h1>Main kan gunting batu kertas!</h1>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <input type="radio" name="pilihan" value="batu" title="Batu"> Batu <br>
        <input type="radio" name="pilihan" value="gunting" title="Gunting"> Gunting<br>
        <input type="radio" name="pilihan" value="kertas" title="Kertas"> Kertas<br>
        <input type="submit" value="submit" name="form_submit"><br>
    </form>
    
</body>

<?php 

if (isset($_POST['pilihan'])) {
    $PilihanCPU = array('batu', 'gunting', 'kertas');
    shuffle($PilihanCPU);

    $CPU = $PilihanCPU[0];
    $Pemain = $_POST['pilihan'];

    echo '<br> Pemain: '.$Pemain.' <br> CPU: '.$CPU.'<br>';

    if ($Pemain === $CPU) {
        echo '<br> Hasil seri!';        
    }
    else if ($Pemain === "batu") {
        if ($CPU === "gunting"){
                echo '<br> Hasil: Pemain menang.';
            } else { 
                echo '<br> Hasil: CPU menang.';
        }
    }
    else if ($Pemain === "kertas") {
        if ($CPU === "batu"){
                echo '<br> Hasil: Pemain menang.';
            } else { 
                if ($CPU === "gunting") {
                    echo '<br> Hasil: CPU menang.';
                }
        }
    }
    else if ($Pemain === "gunting") {
        if ($CPU === "batu"){
                echo '<br> Hasil: CPU menang.';
            } else { 
                if ($CPU === "kertas") {
                    echo '<br> Hasil: Pemain menang.';
                }
        }
    }
}
?>
</html>