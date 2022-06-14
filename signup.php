<?php
            // FIELD VALIDATION

$regexName = "/^[a-zA-Z\s]+$/";
$regexPhone = "/^[0-9]{10}$/";
$regexCity = "/^[a-zA-Z\d\s]+$/";
$regexMail = "/^[a-zA-Z\d\._]+@[a-zA-z\d\._]+\.[a-zA-Z\d\.]{3,}+$/";
$regexPassword = "/^[a-zA-Z\d\s\._]+[0-9]+$/";
$check=0;


if(isset($_POST['submit'])){
    if(!preg_match($regexName, $_POST['name'])){
        $outputName = "<span style='color:red'>* Le nom est obligatoire !</span>";
        $check++;
    }
    
    if(!preg_match($regexPhone, $_POST['phone'])){
        $outputPhone = "<span style='color:red'>* Le numéro téléphone est obligatoire !</span>";
        $check++;
    }

    if(!preg_match($regexCity, $_POST['city'])){
        $outputCity = "<span style='color:red'>* La ville est obligatoire !</span>";
        $check++;
    }

    if(!preg_match($regexMail, $_POST['email'])){
        $outputEmail = "<span style='color:red'>* L'email est obligatoire !</span>";
        $check++;
    }

    if(!preg_match($regexPassword, $_POST['password'])){
        $outputPassword = "<span style='color:red'>* Le mot de pass est obligatoire !</span>";
        $check++;
    }
}

?>
            <!-- 000000000000000000000 -->

            <!-- DECLARE AND ADD INTO DB -->

<?php

include 'connect.php';
if($check<=0){
    if(isset($_POST['submit'])){
        $fullName=$_POST['name'];
        $phone=$_POST['phone'];
        $city=$_POST['city'];
        $email=$_POST['email'];
        $password=$_POST['password'];

        $sql="INSERT INTO `client` (`nomClient`, `telephoneClient`, `villeClient`, `emailClient`,`passwordClient`) Values ('$fullName', '$phone', '$city', '$email', '$password')";
        $result=mysqli_query($connect, $sql);
        if($result){
            header('location:login.php');
            // echo "DATA IS INSERT";
        }
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
    <link rel="stylesheet" href="signup.css"> <!--Link CSS-->
    <title>Inscription</title>
</head>
<body>

    <nav class="navbar">
    <div class="box">
    <img src="Images/kirae.png" alt="kiraeLogo" id="img">
    </div>
    <button type="button" class="btn3">À propos</button>
    </nav>
    
    <div class="container">

        <form action="" method="POST">

            <div class="form-group">
                <label for="exampleFormControlInput1">Nom complet</label>
                <?php if(isset($outputName)) {echo $outputName;} ?>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="name">
            </div>

            <div class="form-group">
                <label for="exampleFormControlInput1">Téléphone</label>
                <?php if(isset($outputPhone)) {echo $outputPhone;} ?>
                <input type="text" class="form-control" id="exampleFormControlInput2" name="phone">
            </div>

            <div class="form-group">
                <label for="exampleFormControlInput1">Ville</label>
                <?php if(isset($outputCity)) {echo $outputCity;} ?>
                <input type="text" class="form-control" id="exampleFormControlInput3" name="city">
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">E-mail</label>
              <?php if(isset($outputEmail)) {echo $outputCity;} ?>
              <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
            </div>
            
            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <?php if(isset($outputPassword)) {echo $outputPassword;} ?>
              <input type="password" class="form-control" id="exampleInputPassword1" name="password">
            </div>

            <div class="form-group form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck1" onClick="enable()">
              <label class="form-check-label" for="exampleCheck1"><span class="cond">J’ai lu et j’accepte les</span> Conditions générales</label>
            </div>

            <button type="submit" class="btn" name="submit" id="btn" disabled="true">CRÉER VOTRE COMPTE</button>
            <div class="line"></div>

            <button type="submit" class="btn2">
                <span class="uoqswv-5 uoqswv-6 fbNdWd jKeLRF"><svg class="av-icon" height="24" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-labelledby="FacebookTitleID" style="fill: currentcolor; stroke: currentcolor; stroke-width: 0;"><title id="FacebookTitleID">Facebook Icon</title><path d="M14 13.5h2.5l1-4H14v-2c0-1.03 0-2 2-2h1.5V2.14c-.326-.043-1.557-.14-2.857-.14C11.928 2 10 3.657 10 6.7v2.8H7v4h3V22h4v-8.5z"></path></svg></span>
                CONTINUER AVEC FACEBOOK
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