<?php
//on récupère les données à afficher depuis la réponse du contrôleur
//$response["data"]
    $products = $response['data'];
?>
<!-- liste des produits de la boutique -->
<!-- afficher la liste de tous les produits en base (en utilisant 
    $manager->getAll()
    et permettre via un simple lien de le mettre dans le panier
    <a href="traitement.php?action=incart&id=?">Ajouter au panier</a>
    ou ? est égal à l'id du produit dans la bdd -->
    <h1>Liste des produits</h1>
    <section id="products-list">
    <?php
        foreach($products as $prod){
            echo "<article class='product-item'>",
                    "<h3>", 
                        "<a href='?ctrl=store&action=voir&id=",$prod->getId(),"'>",
                            $prod->getName(), 
                        "</a>",
                    "</h3>",
                    "<p>", $prod->getPrice(true), "&nbsp;€</p>",
                    "<p>", 
                        "<a href='traitement.php?action=incart&id=",$prod->getId(),"'>",
                            "Ajouter au panier",
                        "</a>",
                    "</p>",
                "</article>";
        }
    ?>
    </section>