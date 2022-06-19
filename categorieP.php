<?php

session_start();
if ($_SESSION["status"] != true){

  header("Location:login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"><!--CDN FONT AWESOME-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous"> <!-- Link Bootstrap CSS-->
    <link rel="stylesheet" href="categorie.css"> <!--Link CSS-->
    <title>Kirae.ma</title>
</head>
<body>
    <nav class="navbar">

    <div class="box">
    <a href="home.php"><img src="Images/kirae.png" alt="kiraeLogo" id="img"></a>
    </div>

    <div class="links">
      <button type="button" class="btn3"><a href="login.php">Se connecter</a></button>
      <button type="button" class="btn3">À propos</button>
    </div>
    
    <h2 class="mt-2 text-white">Hello <?php echo $_SESSION["username"] ?></h2>
    <form action="login.php" method="post">
      <input class="btn btn-primary" type="submit"  name="logout" value="Logout!">
    </form>
    
  </nav>
<?php
  if(isset($_POST["logout"])){
      header("Location:logout.php");
  }
?>
    <nav class="plus">

      <div class="menu">
        <label for="check">
          <i class="fas fa-bars fa-1x" id="btn"></i>
          <span class="cat">Catégories</span>
        </label>
      </div>
      
        <input type="text" class="form-control" name="prd" id="exampleDataList"  placeholder="Chercher ici un produit...">
        </form>
      <button type="button" class="btn4"><a href="login.php">Se connecter</a></button>

    </nav>
    <input type="checkbox" id="check">
        <div class="sidebar">
            <!-- <input type="search" name="search" id="search"> -->
            <div class="liens">
                <ul>
                  <a href="categorieB.php"><li>Bricolage ></li></a>
                  <a href="categorieJ.php"><li>Jardinage ></li></a>
                  <a href="categorieP.php"><li>Piscine ></li></a>
                </ul>
            </div>
        </div>

        <?php 
      include 'connect.php';
      $query = "SELECT 	* FROM `media` M
                INNER JOIN produit P
                WHERE P.idProduit = M.idProduit AND idCategorie=3";
      $result = mysqli_query($connect, $query);
      $sql = "SELECT * FROM `produit`";
      if(mysqli_num_rows($result) > 0){
        ?>
  <div class="container">
    <h2 class="cate">Voici les matériels de la catégorie <span class="vvs">"Piscine" .</span></h2>
     <div class="row">
      <?php

            while($row = mysqli_fetch_array($result)){


      ?>
        <div class="col-md-4 col-sm-6">
          <div class="card-group">
            <div class="card">
              <div class="box">
              <a href="detail.php?id=<?php echo $row["idProduit"];?>" >
              <img src="<?php  echo 'Images/Matériels/proPics/'. $row["urlMedia"];?>" class="card-img-top" alt="ProductImage">
              </a>
              </div>
              <div class="card-body">
                <h4 class="card-title"><?php echo $row["nomProduit"];?></h4>
                <h5 class="card-price"><?php echo $row["prixProduit"]. ' DH';?></h5>
                <p class="card-text"><?php echo $row["typeProduit"] ; ?></p>

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
        <a href="home.php"><img src="Images/kirae.png" alt="kiraeLogo" id="img"></a>
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
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script> -->
<script src="script.js"></script>
</html>