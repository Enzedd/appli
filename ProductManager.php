<?php
    require_once "Product.php";

    /**
     * Gestionnaire de produits en base de données
     */
    class ProductManager
    {
        private $pdo;

        public function __construct(){
            $this->pdo = new PDO(
                "mysql:host=localhost:3306;dbname=appli",
                "root",
                "",
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, //les erreurs venant de MySQL seront des Exception
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC //on récupère les données de MySQL dans un tableau associatif
                    //ex : ['name' => 'Biscuit', 'price' => 25.5]
                ]
            );
        }

        /**
         * Récupère tous les produits de la base de données
         * 
         * @return $products - tableau d'objets Product correspondants
         */
        public function getAll(){
            
            $sql = "SELECT id, name, price FROM product";//select tous les produits
            $stmt = $this->pdo->query($sql);//on prépare la requête
            $results = $stmt->fetchAll();//on récupère tous les enregistrements

            $products = [];//on initialise le tableau final qui va contenir les produits
            foreach($results as $result){//pour chaque résultat trouvé en base de données
                $products[] = new Product(//on instancie un objet Product
                    $result["id"],
                    $result["name"], 
                    $result["price"]
                );
            }
            return $products;
        }

        /**
         * Récupère un produit en fonction de l'id en paramètre
         * 
         * @param int $id - l'id du produit en base de données
         * @return Product - l'objet produit instancié depuis les données récupérées
         */
        public function getOneById($id) :Product
        {
            $sql = "SELECT id, name, price FROM product WHERE id = :id";
            $stmt = $this->pdo->prepare($sql);

            $stmt->execute([
                "id" => $id
            ]);
            $result = $stmt->fetch();
            
            return new Product(
                $result['id'], 
                $result['name'], 
                $result['price']
            );
        }

        /**
         * Insère un nouveau produit dans la base de données
         * 
         * @return bool le résultat de l'insertion en base (bon ou pas bon)
         */
        public function insert($name, $price){
            $sql = "INSERT INTO product (name, price) VALUES (:name, :price)";
            $stmt = $this->pdo->prepare($sql);
            
            return $stmt->execute([
                "name"  => $name,
                "price" => $price,
            ]);
        }

        /**
         * Supprimer un produit dans la base de données
         * 
         * @param int $id - l'id du produit
         * @return bool le résultat de la suppression en base (bon ou pas bon)
         */
        public function delete($id){
            $sql = "DELETE FROM product WHERE id = :id";
            $stmt = $this->pdo->prepare($sql);
            
            return $stmt->execute([
                "id"  => $id,
            ]);
        }
    }