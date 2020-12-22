<?php
    namespace App\Core;

    abstract class DAO 
    {
        protected $pdo;

        public function __construct(){
            $this->pdo = new \PDO(
                "mysql:host=localhost:3306;dbname=appli",
                "root",
                "",
                [
                    \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION, //les erreurs venant de MySQL seront des Exception
                    \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC, //on récupère les données de MySQL dans un tableau associatif
                    \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
                    //ex : ['name' => 'Biscuit', 'price' => 25.5]
                ]
            );
        }
    }