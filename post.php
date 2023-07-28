<?php
include('template.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    if (!empty($_POST['name']) && !empty($_POST['price'])) {
       
        $name = $_POST['name'];
        $price = $_POST['price'];

        // Insérer les données dans la table "product"
        $requete = $pdo->prepare("INSERT INTO product (name, price) VALUES (:name, :price)");
        $requete->bindParam(':name', $name);
        $requete->bindParam(':price', $price);

        if ($requete->execute()) {
           
            echo "Le produit a bien été ajouté.";
        } else {
            
            echo "Une erreur s'est produite lors de l'ajout du produit.";
        }
    } else {
       
        echo "Il manque des informations pour ajouter un produit.";
    }
}
?>
