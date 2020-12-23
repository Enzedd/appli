<?php
    namespace App\Controller;

use App\Manager\ProductManager;
use App\Service\CartHandlerService as CHS;
use App\Service\RouterService as Router;
use App\Service\MessageService as MS;

class CartController 
    {
        public function indexAction(){
            
            return[
                "view" => "cart/cart.php"
            ];
        }

        public function incartAction($idproduct){
            $manager = new ProductManager();
            $product = $manager->getOneById($idproduct);
            
            $cart = CHS::getCart(); //on récupère le panier en session
            $cart->addProduct($product); //on lui ajoute le produit cumulé
            CHS::setCart($cart); //on met à jour le panier en session
            
            MS::setMessage("success", "Produit ajouté au panier !");
            return Router::redirect("cart");
        }

        public function removeAction($lineIndex){
            $cart = CHS::getCart();
            $cart->removeProduct($lineIndex);
            CHS::setCart($cart);

            MS::setMessage("success", "Produit supprimé du panier !");
            return Router::redirect("cart");
        }

        public function clearAction(){
            CHS::eraseCart();
            return Router::redirect("cart");
        }
    }