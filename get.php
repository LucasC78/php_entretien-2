<?php
include('template.php');

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    
    $requete = $pdo->prepare("SELECT * FROM product");
    $requete->execute();

    $produits = $requete->fetchAll(PDO::FETCH_ASSOC);

  
    header('Content-Type: application/json');
    echo json_encode($produits);
}
?>