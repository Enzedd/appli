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
        <title>Ajout produit</title>
    </head>
    <body>
        <?php 
            include "menu.php";
            include "messages.php";
        ?>

        <h1>PANEL ADMIN</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NOM</th>
                    <th>PRIX</th>
                    <th>ACTIONS</th>
                </tr>
            </thead>
            <tbody>
            <?php
                //on récupère tous les produits
                $products = $manager->getAll();
                //on boucle dessus
                foreach($products as $prod){
                    echo "<tr>",
                            "<td>", $prod->getId(), "</td>",
                            "<td>", $prod->getName(), "</td>",
                            "<td>", $prod->getPrice(true), "&nbsp;€</td>",
                            "<td>", //lien pour supprimer le produit
                                "<a href='traitement.php?action=suppr&id=",
                                    $prod->getId(),
                                "'>Supprimer</a>",
                            "</td>",
                        "</tr>";
                }
            ?>
            </tbody>
        </table>

        <form action="traitement.php?action=add" method="post">
            <h2>Ajouter un produit</h2>
            <p>
                <label>Nom du produit&nbsp;: </label>
                <input type="text" name="name">
            </p>
            <p>
                <label>Prix du produit&nbsp;: </label>
                <input type="number" step="any" name="price">
            </p>
           
            <p class="submit-row">
                <input type="submit" name="submit" value="Ajouter le produit">
            </p>
        </form>
        
    </body>
</html>