<?php

    namespace App\Entity;

    use App\Entity\Product;

    class Cart{

        //modèle de ligne de panier
        private static $lineModel = [
            "product" => "",
            "quantity" => 0,
            "total" => 0
        ];

        private $lines = [];
        private $nbProducts = 0;
        private $total = 0;

        public function addProduct(Product $product){
            $line = self::$lineModel; //on crée une nouvelle ligne
            $line["product"] = $product; //on ajoute le produit dans la ligne
            $line["quantity"]++; //on incrémente la quantité de la ligne
            $line["total"] = $product->getPrice() * $line["quantity"];

            $this->lines[] = $line; //on ajoute la ligne dans la liste des lignes du panier
            $this->nbProducts+= $line["quantity"];
            $this->total+= $line["total"];
        }

        public function removeProduct($lineIndex){
            unset($this->lines[$lineIndex]);
        }

        public function getLines(){
            return $this->lines;
        }

        public function getNbProducts(){
            return $this->nbProducts;
        }

        public function isEmpty() :bool{
            return empty($this->lines);
        }

        public function getTotal($formatted = false){
            if($formatted){
                return number_format($this->price, 2, ",", "&nbsp;");
            }
            return $this->price;
        }
    }