<?php
    define("DS", DIRECTORY_SEPARATOR);
    define('ROOT_DIR', '.'.DS);

    //constantes de dossiers par défaut
    define('PUBLIC_DIR', ROOT_DIR."public".DS);
    define('CSS_DIR', PUBLIC_DIR."stylesheets".DS);
    define('JS_DIR', PUBLIC_DIR."js".DS);
    define('TEMPLATE_DIR', ROOT_DIR."template".DS);

    //constantes coté contrôleur
    define('DEFAULT_CTRL', "store");
    define('DEFAULT_ACTION', "index");