<?php
include 'connect.php';

$id = "";
if(isset($_GET["id"])){
    $id = $_GET["id"];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"><!--CDN FONT AWESOME-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous"> <!-- Link Bootstrap CSS-->
    <link rel="stylesheet" href="checkOut.css"> <!--Link CSS-->
    <title>Check out product</title>
<body>
    <nav class="navbar">

        <div class="box">
        <a href="home.php"><img src="Images/kirae.png" alt="kiraeLogo" id="img"></a>
        </div>
        <div class="links">
        <button type="button" class="btn3"><a href="login.php">Se connecter</a></button>
        <button type="button" class="btn4">À propos</button>
        </div>

    </nav>
</body>
</html>