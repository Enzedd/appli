<?php
    namespace App\Service;

    abstract class RouterService
    {
        /**
         * prise en charge des paramètres d'une requête GET
         * 
         * @param array $params les paramètres de l'uri ($_GET)
         * @return array la réponse correspondante au return d'un contrôleur
         */
        public static function handleRequest($params) :array
        {
        /*-----APPEL DU CONTROLEUR-----*/
            $class = "Store";//contrôleur par défaut
            
            if(isset($params['ctrl'])){// ctrl = admin
                $uri_class = ucfirst($params['ctrl']);//$uri_class = "Admin"
                //on vérifie que App\Controller\AdminController existe !
                if(class_exists("App\Controller\\".$uri_class."Controller")){
                    //le contrôleur à appeler devient la classe contenue dans l'uri
                    $class = $uri_class;
                }
            } 
            
            //App\Controller\StoreController => Fully Qualified Class Name (FQCN)
            $classname = "App\Controller\\".$class."Controller";
            $controller = new $classname();//instanciation du contrôleur

        /*-----APPEL DE LA METHODE DANS LE CONTROLEUR-----*/
            $method = "indexAction";//la méthode par défaut

            if(isset($params['action'])){//action = list
                $uri_method = $params['action']."Action";//$uri_method = "listAction"
                //on vérifie si la méthode listAction est une méthode du contrôleur
                if(method_exists($controller, $uri_method)){
                    //la méthode à appeler est celle provenant de l'uri
                    $method = $uri_method;
                }
            }

        /*-----PRISE EN CHARGE DU PARAMETRE OPTIONNEL $params['id']-----*/
            $id = null;//pas d'id par défaut
            
            if(isset($params['id'])){
                $id = $params['id'];
            }
            //StoreController::listAction()
            return $controller->$method($id);//appel de la méthode du contrôleur
        }
    }