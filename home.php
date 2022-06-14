<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"><!--CDN FONT AWESOME-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous"> <!-- Link Bootstrap CSS-->
    <link rel="stylesheet" href="home.css"> <!--Link CSS-->
    <title>Kirae.ma</title>
</head>
<body>
    <nav class="navbar">

    <div class="box">
    <img src="Images/kirae.png" alt="kiraeLogo" id="img">
    </div>
    <div class="links">
    <button type="button" class="btn3"><a href="login.php">Se connecter</a></button>
    <button type="button" class="btn3">À propos</button>
    </div>

    </nav>

    <nav class="plus">

      <div class="menu">
          <button class="navbar-toggler toggler-example" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1"
          aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation"><span class="dark-blue-text">
          <i class="fas fa-bars fa-1x"></i></span><span class="cat">Catégorie</span></button> 
      </div>
    <input class="form-control" list="datalistOptions" id="exampleDataList" placeholder="Chercher ici un produit..."> 
    <button type="button" class="btn4"><a href="login.php">Se connecter</a></button>

    </nav>
 

      <?php 
      include 'connect.php';
      $query = "SELECT * FROM `media` M, `produit` P
                WHERE typeMedia = 'proPics'
                ORDER BY P.idProduit ASC LIMIT 6";
      $result = mysqli_query($connect, $query);
      if(mysqli_num_rows($result) > 0){
        ?>
        
        <div class="container">
    <div class="row">
    <?php
        while($row = mysqli_fetch_array($result)){

    ?>

      <div class="col-md-4">
        <div class="card-group">
          <div class="card" id="card">
            <img src="
        <?php
        while($row = mysqli_fetch_array($result)){

    ?>
            <?php  
            echo 'Images/Matériels/proPics/'. $row["urlMedia"]; 
            ?>" class="card-img-top" alt="ProductImage">



            <div class="card-body">
              <h4 class="card-title"><?php echo $row["nomProduit"]; ?></h4>
              <h5 class="card-price"><?php echo $row["prixProduit"]. ' DH'; ?></h5>
              <p class="card-text"><?php echo $row["typeProduit"] ;?></p>
            </div>
          </div>
        </div>
      </div>

              <?php
        }
      }
      ?>
                    <?php
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
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script> -->
<script src="script.js"></script>
</html>