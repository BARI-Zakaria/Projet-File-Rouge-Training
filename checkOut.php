<?php
include 'connect.php';

session_start();
if ($_SESSION["status"] != true){

  header("Location:login.php");
}

// GET THE PRODUCT WITH IT IMAGE AND DETAILS
$user = $_SESSION["status"];

$id = "";
if(isset($_GET["id"])){
    $id = $_GET["id"];
}

$sqlQuery1 = "SELECT * FROM `produit` P
            WHERE P.idProduit = $id";

$sqlQuery2 = "SELECT * FROM `produit` P  
            INNER JOIN `media` M 
            ON P.idProduit = M.idProduit
            WHERE P.idProduit = $id";
$sqlQuery3 = "SELECT idClient from client WHERE nomClient = '$user'";

$result1 = mysqli_query($connect, $sqlQuery1);
$result2 = mysqli_query($connect, $sqlQuery2);
$result3 = mysqli_query($connect, $sqlQuery3);


if(mysqli_num_rows($result3) > 0){
    while($item = mysqli_fetch_assoc($result3)){
        echo $row["idClient"];
    }
}



if(isset($_POST['valid'])){
$adr = $_POST['adresse'];
$dateD = $_POST['dateD'];
$dateF = $_POST['dateF'];
$phone = $_POST['phone'];
$email = $_POST['email'];    
$sql = "INSERT INTO reservation (`adresseLiv`, `idClient`, `dateCommandeD`, `dateCommandeF`, `teleReserv`, `emailReserv`) VALUES ('$adr', $user,'$dateD', '$dateF', '$phone', '$email')";
$query = mysqli_query($connect, $sql);
if($query){
    // header('location:ch.php');
    echo "COMMANDE IS INSERT";
}
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
        <?php if(isset($_SESSION["status"])){ ?>
            <div class="links">
                <h4 class="mt-2 text-white">Hello <?php echo $_SESSION["username"] ?></h4>
            </div>
        <?php } ?>
    </nav>
    <div class="container">

        <form action="" method="POST">
            <?php
                
                if(mysqli_num_rows($result2) > 0){
                    
                    ?>
                    <div class="box1">
                        <?php   
                    while($row = mysqli_fetch_assoc($result2)){
                        
                        ?>
                    <img src="<?php  echo 'Images/Matériels/proPics/'. $row["urlMedia"];?>" class="card-img-top" alt="ProductImage">
                    <?php
                                                
                                            }
                                            
                                            $product = mysqli_fetch_assoc($result1);
                                            ?>
                    </div>
            <div class="reserv">
                    <h4 class="card-title" id="h4"><span class="bold"><?php echo  $product["nomProduit"]. ' .';?></span></h4>

                    <div class="input-group mb-3">
                        <label for="staticText" class="col-sm-2 col-form-label" id="label">Date :</label>
                        <span class="text">Du</span>
                        <input type="date" class="form-control" placeholder="Username" name="dateD">
                        <span class="text">jusqu'à</span>
                        <input type="date" class="form-control" placeholder="Server" name="dateF">
                    </div>

                    <div class="mb-3 row">
                        <label for="staticText" class="col-sm-2 col-form-label">Adresse livraison</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control-plaintext" id="staticText" placeholder="Entrer une adresse de livraison" name="adresse">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="staticPhone" class="col-sm-2 col-form-label">Téléphone</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control-plaintext" id="staticPhone" placeholder="06******00" name="phone">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">E-mail</label>
                        <div class="col-sm-10">
                        <input type="text"  class="form-control-plaintext" id="staticEmail" placeholder="Entrer votre adresse E-mail" name="email">
                        </div>
                    </div>

                <?php
                }
                ?>
                <button type="submit" name="valid" id="check">
                <a href="checkOut.php?id=<?php echo $product["idProduit"];?>" id="a">Réserver
                    <i class="fa-solid fa-circle-check"></i>
                </a>
                </button>   
            </div>
        </form>
    
    </div>
</body>
<footer>
        <div class="footer">
            <img src="Images/kirae.png" alt="kiraeLogo" id="img2">
            <div class="SMedia">
                <p id="SMedia">Suivez-nous sur :</p>
                <i class="fa-brands fa-facebook-square"></i>
                <i class="fa-brands fa-instagram"></i>
                <i class="fa-brands fa-twitter"></i>
            </div>
        </div>
        <p id="copyright">Copyrights © 2022 All Rights Reserved by Kirae.ma .</p>
    </footer>
</html>