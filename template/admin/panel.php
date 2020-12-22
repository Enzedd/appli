<?php
    $products = $response["data"];
?>
    <h1>PANEL ADMIN</h1>
    <p>
        <a href="?ctrl=admin&action=add">Ajouter un produit</a>
    </p>
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
            //on boucle dessus
            foreach($products as $prod){
                echo "<tr>",
                        "<td>", $prod->getId(), "</td>",
                        "<td>", $prod->getName(), "</td>",
                        "<td>", $prod->getPrice(true), "&nbsp;€</td>",
                        "<td>", //lien pour supprimer le produit
                            "<a href='?ctrl=admin&action=delete&id=",
                                $prod->getId(),
                            "'>Supprimer</a>",
                        "</td>",
                    "</tr>";
            }
        ?>
        </tbody>
    </table>