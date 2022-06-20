<?php
 if(isset($_POST['search'])){
    $valueToSearch = $_POST['prd'];
    // search in all table columns
    // using concat mysql function
    $sql = "SELECT * FROM `produit` WHERE CONCAT(`nomProduit`, `prixProduit`, `typeProduit`, `garantieProduit`)LIKE'%".$valueToSearch."%'";
    $search_result = filterTable($sql);
 }else{
    $sql = "SELECT * FROM `produit`";
    $search_result = filterTable($sql);
 }

 // function to connect and execute the query
function filterTable($sql){
    include 'connect.php';
    $filter_Result = mysqli_query($connect, $sql);
    return $filter_Result;
}
$result1=mysqli_query($connect, $sql);
?>

