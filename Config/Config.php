<?php 
    namespace Config;

    /* estas eran las originales
        define("ROOT", dirname(__DIR__) . "/");
        //Path to your project's root folder
        define("FRONT_ROOT", "/FinalExam/");
        define("VIEWS_PATH", "Views/");
        define("CSS_PATH", FRONT_ROOT.VIEWS_PATH . "css/");
        define("JS_PATH", FRONT_ROOT.VIEWS_PATH . "js/");

        define("DB_HOST", "localhost");
        define("DB_NAME", "");
        define("DB_USER", "root");
        define("DB_PASS", "");
    */

    define("ROOT", dirname(__DIR__) . "/");
    //Path to your project's root folder
    define("FRONT_ROOT", "/Laboratorio 4 PHP/Final Ordenes - pedidos/");
    define("VIEWS_PATH", "Views/");

    
    // estas son las que me funcionan
    define("CSS_PATH", FRONT_ROOT.VIEWS_PATH . "css/");
    define("JS_PATH", FRONT_ROOT.VIEWS_PATH . "js/");

    define("DB_HOST", "localhost");
    define("DB_NAME", "Orders");
    define("DB_USER", "root");
    define("DB_PASS", "");
?>