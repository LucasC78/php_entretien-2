<?php
include('template.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifier si toutes les données requises sont présentes
    if (!empty($_POST['name']) && !empty($_POST['price'])) {
        // Récupérer les données du corps de la requête POST
        $name = $_POST['name'];
        $price = $_POST['price'];

        // Insérer les données dans la table "product"
        $requete = $pdo->prepare("INSERT INTO product (name, price) VALUES (:name, :price)");
        $requete->bindParam(':name', $name);
        $requete->bindParam(':price', $price);

        if ($requete->execute()) {
            // Le produit a été ajouté avec succès
            echo "Le produit a bien été ajouté.";
        } else {
            // Une erreur s'est produite lors de l'ajout du produit
            echo "Une erreur s'est produite lors de l'ajout du produit.";
        }
    } else {
        // Des informations requises sont manquantes
        echo "Il manque des informations pour ajouter un produit.";
    }
}
?>
