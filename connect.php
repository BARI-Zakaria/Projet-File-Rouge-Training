<!-- CONNEXION AU SERVEUR -->
<?php
    $connect = new mysqli ('localhost', 'root', '', 'rental');

    if(!$connect){
        // die(mysqli_error($con)); 
        echo "T'es pas connecté al3awed !";  
    }
?>
<!-- ----------------------  -->