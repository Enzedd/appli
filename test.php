<?php
    //on ouvre un bloc où on va exécuter (dans le try) les différentes instructions
    //pouvant lever une erreur potentielle
    try{
        $pdo = new PDO(
            "mysql:host=localhost:3306;dbname=appli",
            "root",
            "",
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, //les erreurs venant de MySQL seront des Exception
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC //on récupère les données de MySQL dans un tableau associatif
                //ex : ['name' => 'Biscuit', 'price' => 25.5]
            ]
        );
        
        /*------AJOUT EN BASE------*/
        $sql = "INSERT INTO product (name, price) VALUES (:name, :price)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            "name"  => $_POST['name'],
            "price" => $_POST['price'],
        ]);
        /*-------------------------*/

        $sql = "SELECT * FROM product";//:id est un paramètre nommé
        
        //$statement = $pdo->query($sql) pour préparer une requête sans paramètres
        $statement = $pdo->query($sql);//préparation de la requête avec paramètres
        //ATTENTION : seulement si la requete est "prepare", il faut utiliser "execute"
        /*
            $statement->execute([//exécution de la requête
                //ce tableau précise les valeurs à injecter en fonction des paramètres
                //de la requête
                "id" => $id,
            ]);
        */
        $results = $statement->fetchAll();//récupération des résultats
        //fetchAll() -> récupère plusieurs enregistrements
        //fetch() -> récupère un seul enregistrement
        //fetchColumn() -> récupère une seule valeur (ex: SELECT COUNT())

        var_dump($results);
    }  
    //dans le cas où une erreur potentiellement attendue est levée par les instructions
    //dans le bloc try, le bloc catch récupère l'erreur et on en fait ce qu'on veut
    //ex : ajouter la date, afficher plus ou moins d'infos sur l'erreur
    //enregistrer l'erreur dans des fichiers (logs erreurs), etc.  
    catch(PDOException $error){
        echo $error->getMessage();
    }