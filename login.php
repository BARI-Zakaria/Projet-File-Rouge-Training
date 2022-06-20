
<!-- CONNEXION AU SERVEUR -->

<?php include 'connect.php';

session_start();

?>
    
<!-- ----------------------  -->


<?php
            // 00000000 LOGIN 00000000
        
$messageEmail = $messagePassword = "";

if(isset($_POST['submit'])){
    $user = $_POST['name'];
    $password = $_POST['password'];

    $sql = "SELECT passwordClient from `client` WHERE nomClient='$user' and passwordClient='$password'";
    $result = mysqli_query($connect, $sql);
    if($row=mysqli_fetch_assoc($result)){

        // $user = $row["nomClient"];
        $_SESSION["status"]=false;
    
        //condition for checking valid input from user
    
        if ( $user == $_POST["name"] && $password = $_POST["password"] ){
    
            $_SESSION["username"] = $user;
            $_SESSION["status"]= true;
            header('location:home.php');
            
        }
        else{
            echo "invalid credentials";
        }
              
    }else{
        $messageEmail = '<span class="error">* Votre nom d\'utilisateur est introuvable</span>';
        $messagePassword = '<span class="error">* Votre mot de pass est incorrect</span>';
    }
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
    <link rel="stylesheet" href="login.css"> <!--Link CSS-->
    <title>Authentification</title>
</head>
<body>

    <nav class="navbar">
        <div class="box">
        <a href="home.php"><img src="Images/kirae.png" alt="kiraeLogo" id="img"></a>
        </div>
        <button type="button" class="btn3">À propos</button>
    </nav>
    <div class="container">

        <form action="" method="POST">




            <div class="form-group">
              <label for="exampleInputEmail1">Nom d'utilisateur</label>
              <?php echo $messageEmail; ?>
              <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name">
            </div>
            
            <div class="form-group">
              <label for="exampleInputPassword1">Mot de pass</label>
              <?php echo $messagePassword; ?>
              <input type="password" class="form-control" id="exampleInputPassword1" name="password">
            </div>


            <button type="submit" class="btn" name="submit" id="btn">Se connecter</button>
            <p id="link"> Vous avez pas un compte ? <a href="signup.php"><u>Inscrivez-vous</u></a></p>
            <div class="line"></div>

            <button type="submit" class="btn2">
                <a href="https://www.facebook.com/">
                    <span class="uoqswv-5 uoqswv-6 fbNdWd jKeLRF"><svg class="av-icon" height="24" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-labelledby="FacebookTitleID" style="fill: currentcolor; stroke: currentcolor; stroke-width: 0;"><title id="FacebookTitleID">Facebook Icon</title><path d="M14 13.5h2.5l1-4H14v-2c0-1.03 0-2 2-2h1.5V2.14c-.326-.043-1.557-.14-2.857-.14C11.928 2 10 3.657 10 6.7v2.8H7v4h3V22h4v-8.5z"></path></svg></span>
                    CONTINUER AVEC FACEBOOK
                </a>    
            </button>

        </form>
          

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