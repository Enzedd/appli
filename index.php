<?php
    session_start();    
    require_once "MessageService.php";//j'intègre le code présent dans MessageService.php ici
    require_once "ProductManager.php";
    $manager = new ProductManager();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Oxygen&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="style.css">
        <title>Boutique</title>
    </head>
    <body>
        <?php 
            include "menu.php";
            include "messages.php";
        ?>
        <!-- afficher la liste de tous les produits en base (en utilisant 
        $manager->getAll()
        et permettre via un simple lien de le mettre dans le panier
        <a href="traitement.php?action=incart&id=?">Ajouter au panier</a>
        ou ? est égal à l'id du produit dans la bdd -->
        <h1>Liste des produits</h1>
        <section id="products-list">
        <?php
            $products = $manager->getAll();
            foreach($products as $prod){
                echo "<article class='product-item'>",
                        "<h3>", $prod->getName(), "</h3>",
                        "<p>", $prod->getPrice(true), "&nbsp;€</p>",
                        "<p>", 
                            "<a href='traitement.php?action=incart&id=",
                                $prod->getId(),
                            "'>Ajouter au panier</a>",
                        "</p>",
                    "</article>";
            }
        ?>
        </section>
        
    </body>
</html>
