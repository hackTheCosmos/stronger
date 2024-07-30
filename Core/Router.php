<?php

class Router {
    
    public static function route(): void {
        if (isset($_GET['page'])) {

            if($_GET['page'] ==="logout") {
                indexController::getLogout();
  
            } else if($_GET['page'] === "cgu") {
                indexController::getCgu();
            } else if ($_GET['page'] === "confidentiality") {
                indexController::getConfidentiality();
            } else {

                
                $pageName = $_GET['page'];
                $controllerName = $pageName."Controller";
                $controller = new $controllerName;
                $functionStaticName = "get".ucfirst($pageName);
                
                $controller::$functionStaticName();
            }

            

        } else {
            // Défaut
            indexController::getIndex();
        }
    }
}