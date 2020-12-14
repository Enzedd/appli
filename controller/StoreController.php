<?php 

    namespace App\Controller;

    class StoreController{
        private $manager;

        public function __construct(){
            $this->manager = new ProductManager();
        }

        public function indexAction(){
            $products = $this->manager->getAll();

            return [
                "view" => "list.php",
                "data" => $products
            ];
        }
        public function voirAction(){
            $product = $this->manager->getOneById($id);

            return [
                "view" => "voir.php",
                "data" => $product
            ];
        }
    }