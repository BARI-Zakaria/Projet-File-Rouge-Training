<!-- CONNEXION AU SERVEUR -->
<?php
    $connect = new mysqli ('localhost', 'root', '', 'rentalalt');

    if(!$connect){
        // die(mysqli_error($con)); 
        echo "You're not connected !";  
    }
?>

<!-- ----------------------  -->