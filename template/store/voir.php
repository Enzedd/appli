<?php
    $product = $response['data'];
?>
    <p>
        <a href="?ctrl=store">&larr; Retour à la liste</a>
    </p>
    <article>
        <h1><?= $product->getName() ?></h1>
        <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. 
            Tempore hic pariatur odit corrupti reiciendis temporibus 
            totam excepturi odio. 
            Veritatis ea officiis adipisci dolor, 
            porro ipsam voluptates rerum dicta omnis commodi!
        </p>
        <p>
            <?= $product->getPrice(true) ?>&nbsp;€
        </p>
        <p>
            <a href="">Ajouter au panier</a>
        </p>
    </article>