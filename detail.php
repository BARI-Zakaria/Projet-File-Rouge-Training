<?php
include 'connect.php';


session_start();
if ($_SESSION["status"] != true){

  header("Location:login.php");
}


// GET THE PRODUCT WITH IT IMAGE AND DETAILS
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

$result1 = mysqli_query($connect, $sqlQuery1);
$result2 = mysqli_query($connect, $sqlQuery2);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"><!--CDN FONT AWESOME-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous"> <!-- Link Bootstrap CSS-->
    <link rel="stylesheet" href="detail.css"> <!--Link CSS-->
    <title>Product details</title>
<body>
    <nav class="navbar">

        <div class="box">
        <a href="home.php"><img src="Images/kirae.png" alt="kiraeLogo" id="img"></a>
        </div>
        <div class="links">
          <!-- <button type="button" class="btn3"><a href="login.php">Se connecter</a></button> -->
          <!-- <button type="button" class="btn4">À propos</button> -->
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

         
            
                <h4 class="card-title" id="h4"><span class="bold"><?php echo  $product["nomProduit"]. ' .';?></span></h4>
                <h5 class="card-price" id="h5"><span class="unique"><?php echo $product["prixProduit"]. ' DH';?></span></h5>
                <p class="card-text " id="type">Type de location : <span class="bold"><?php echo $product["typeProduit"]. ' .' ; ?></span></p>
                <p class="card-text" id="loc">Localisation : <span class="bold"><?php echo $product["locProduit"] ; ?></span></p>  
                <p class="card-text" id="garantie">Garantie : <span class="bold"><?php echo $product["garantieProduit"]. ' .' ; ?></span></p>  
                <p class="card-text" id="desc">Description du produit : <span class="bold"><?php echo $product["descProduit"] ; ?></span></p> 
        
        <?php        
        }
        ?>
        <button type="submit" name="valid" id="check">
          <a href="checkOut.php?id=<?php echo $product["idProduit"];?>" class="a">Réserver
            <i class="fa-solid fa-circle-check"></i>
          </a>
        </button>
        <button type="submit" name="valid" id="check1">
          <a href="tel:+212694167883" class="a">Call
            <i class="fa-solid fa-phone"></i>
          </a>
        </button>    
    </form>
    
</div>

<div class="line"></div>
<h3>Suggestions</h3>

<?php 
      include 'connect.php';
      $query = "SELECT * FROM `media` M
                INNER JOIN produit P
                WHERE P.idProduit = M.idProduit
                ORDER BY RAND() DESC LIMIT 3";
      $result = mysqli_query($connect, $query);
      $sql = "SELECT * FROM `produit`";
      if(mysqli_num_rows($result) > 0){
        ?>
        <div class="container">
          <div class="row">
    <?php

          while($row = mysqli_fetch_array($result)){


    ?>
      <div class="col-md-4 col-sm-6">
        <div class="card-group">
          <div class="card">
            <div class="box1">
            <a href="detail.php?id=<?php echo $row["idProduit"];?>" >
            <img src="<?php  echo 'Images/Matériels/proPics/'. $row["urlMedia"];?>" class="card-img-top" alt="ProductImage">
            </a>
            </div>
            <div class="card-body">
              <h4 class="card-title"><?php echo $row["nomProduit"];?></h4>
              <h5 class="card-price"><?php echo $row["prixProduit"]. ' DH';?></h5>
              <p class="card-text type"><?php echo $row["typeProduit"] ; ?></p>

            </div>
          </div>
        </div>
      </div>

      <?php
        }
    }
      ?>
          </div>        
  </div>
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
</body>
<script src="script.js"></script>
</html>