<?php
include 'connect.php';

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
    <meta name="viewport" content="width=device-width, initial-scale=1.0"><!--CDN FONT AWESOME-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous"> <!-- Link Bootstrap CSS-->
    <link rel="stylesheet" href="detail.css"> <!--Link CSS-->
    <title>Product details</title>
<body>
    <nav class="navbar">

        <div class="box">
        <a href="home.php"><img src="Images/kirae.png" alt="kiraeLogo" id="img"></a>
        </div>
        <div class="links">
        <button type="button" class="btn3"><a href="login.php">Se connecter</a></button>
        <button type="button" class="btn3">À propos</button>
        </div>

    </nav>
<div class="container">

    <form action="" method="POST">
        <?php
        
        if(mysqli_num_rows($result2) > 0){

            ?>
            <div class="box">
            <?php   
            while($row = mysqli_fetch_assoc($result2)){

                ?>
                <img src="<?php  echo 'Images/Matériels/'. $row['typeMedia'] .'/'. $row["urlMedia"];?>" class="card-img-top" alt="ProductImage">



                <?php
                                        
            }

            $product = mysqli_fetch_assoc($result1);
            ?>
            </div>

         
            
                <h4 class="card-title"><span class="bold"><?php echo  $product["nomProduit"]. ' .';?></span></h4>
                <h5 class="card-price"><span class="unique"><?php echo $product["prixProduit"]. ' DH';?></span></h5>
                <p class="card-text">Type de location : <span class="bold"><?php echo $product["typeProduit"]. ' .' ; ?></span></p>
                <p class="card-text">Localisation : <span class="bold"><?php echo $product["locProduit"] ; ?></span></p>  
                <p class="card-text">Garantie : <span class="bold"><?php echo $product["garantieProduit"]. ' .' ; ?></span></p>  
                <p class="card-text">Description du produit : <span class="bold"><?php echo $product["descProduit"] ; ?></span></p> 
         
        <?php        
        }
        
        ?>
    </form>
    

</div>
</body>
<script src="script.js"></script>
</html>