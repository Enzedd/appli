<?php
    namespace App\Controller;

    use App\Manager\ProductManager;
    use App\Service\MessageService as MS;
    use App\Service\RouterService as Router;

    class AdminController 
    {
        public function indexAction(){

            $manager = new ProductManager();
            $products = $manager->getAll();

            return [
                "view" => "admin/panel.php",
                "data" => $products
            ];
        }

        public function addAction(){

            //si nous arrivons sur cette méthode en ayant validé le form
            if(isset($_POST['submit'])){
                //on filtre les champs du form
                $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING);
                $price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
                //si les filtres passent
                if($name && $price){
                    //on instancie le manager
                    $manager = new ProductManager();
                    $manager->insert($name, $price);    //ajout en base de données
                    MS::setMessage("success", "Produit ajouté avec succès !!");
                    //on redirige enfin vers le panel admin
                    return Router::redirect("admin");                        
                }
                else MS::setMessage("error", "Formulaire mal rempli, réessayez !");
            }
            //si nous arrivons sur cette méthode sans validation de form
            //alors c'est qu'on veut juste l'afficher, le formulaire, haha
            return [
                "view" => "admin/form.php"
            ];
        }

        public function deleteAction($id){
            
            $manager = new ProductManager();
            $manager->delete($id);
            MS::setMessage("success", "Produit supprimé avec succès !");
            
            return Router::redirect("admin");
        }
    }