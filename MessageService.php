<?php
    /**
     * Classe/service de gestion des messages (erreur, succès, etc.) en session
     * 
     * @author virgile.gibello@gmail.com
     */
    abstract class MessageService {

        /**
         * Récupère tous les messages d'un certain type et les supprime de la session
         * 
         * @param string $type - le type de message
         * @return mixed - le tableau des messages du type voulu, false si aucun message de ce type n'existe
         */
        public static function getMessages($type){

            if(isset($_SESSION['messages'][$type])){
                $messages = $_SESSION['messages'][$type];
                unset($_SESSION['messages'][$type]);
                return $messages;
            }
            else return false;
        }
       
        /**
         * Ajoute un message en session en précisant le type de message dont il s'agit
         * 
         * @param string $type - le type de message
         * @param string $message - le message en question
         * @return void
         */
        public static function setMessage($type, $message){

            $_SESSION['messages'][$type][] = $message;
        }
    }
