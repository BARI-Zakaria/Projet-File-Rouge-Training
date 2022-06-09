<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"><!--CDN FONT AWESOME-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous"> <!-- Link Bootstrap CSS-->
    <link rel="stylesheet" href="home.css"> <!--Link CSS-->
    <title>Home</title>
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
        <i class="fas fa-bars fa-1x"></i></span>Catégories</button>
        
        
    </div>
    <input class="form-control" list="datalistOptions" id="exampleDataList" placeholder="Chercher ici un produit..."> 
    <button type="button" class="btn4"><a href="login.php">Se connecter</a></button>

    </nav>
    <div class="sidebar">
        <input class="form-control" list="datalistOptions" id="exampleDataList" placeholder="Chercher par catégorie..."> 
        <a class="active" href="#home">Jardinage <span style='margin: 30px; font-size: 1.2em;'>&#62;</span></a>
        <a href="#news">Plomberie <span style='margin: 30px; font-size: 1.2em;'>&#62;</span></a>
        <a href=""></a>
    </div>
    
</div>
    </body>
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script> -->
<script src="script.js"></script>
</html>