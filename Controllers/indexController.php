<?php

class indexController {
    public static function getIndex() {
        $pageTitle = "Stronger";
        
        Renderer::render("Views/home.php", [
            "pageTitle" => $pageTitle
        ]);
    }

    public static function getLogout() {
        session_destroy();
        header("Location:index.php");
    }

    public static function getCgu() {
        $pageTitle = "CGU - Stronger";
        
        Renderer::render("Views/legal/cgu.php", [
            "pageTitle" => $pageTitle
        ]);
    }

    public static function getConfidentiality() {
        $pageTitle = "Confidentialité - Stronger";
        
        Renderer::render("Views/legal/confidentiality.php", [
            "pageTitle" => $pageTitle
        ]);
    }
}