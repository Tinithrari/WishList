<?php
    define("BASE_PATH", $_SERVER["DOCUMENT_ROOT"] . "/");

    define("MODEL_PATH", BASE_PATH . "application/model/");
    define("CONTROLER_PATH", BASE_PATH . "application/controler/");
    define("VIEW_PATH", BASE_PATH . "application/view/");

    define("CSS_PATH", $_SERVER['DOCUMENT_ROOT']."starwish/resource/css/");
    define("BS_CSS_PATH", $_SERVER['DOCUMENT_ROOT']."starwish/resource/bootstrap/css/");
    define("JS_PATH", $_SERVER['DOCUMENT_ROOT']."starwish/resource/js/");
    define("IMAGE_PATH", $_SERVER['DOCUMENT_ROOT']."starwish/resource/img");

    define("DSN", "mysql:host=localhost;dbname=starwish");
    define("DB_NAME", "starwish");
    define("DB_USER", "netuser");
    define("DB_PASSWORD", "secure");

?>
