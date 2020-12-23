<?php

    namespace App\Service;

    use App\Entity\Cart;

    abstract class CartHandlerService{
        public static function getCart() :Cart{
            if(!isset($_SESSION["cart"])){
                self::setCart(new Cart());
            }
            return $_SESSION["cart"];
        }

        public static function setCart(Cart $cart){
            $_SESSION["cart"] = $cart;
        }

        public static function eraseCart() :Cart{
            unset($_SESSION["cart"]);
            return self::getCart();
        }
    }