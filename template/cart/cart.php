<?php

    $cart = App\Service\CartHandlerService::getCart();
    

    if($cart->isEmpty()){
        echo "<p>Votre panier est vide.</p>";
    } 
    else {
            echo "<table id='recap'>",
            "<thead> <tr> <td> Nom </td> <td> Quantité </td> <td> Total </td> </tr> </thead>",
            "<tbody>";

        foreach($cart->getLines() as $line){

            echo "<tr>";

            echo "<td>".$line["product"]->getName()."</td> <td>".$line["quantity"]."</td> <td>".number_format($line['total'], 2, ",", "&nbsp;");

            echo "</tr>";
        }
            echo "</tbody> </table>";
    }

