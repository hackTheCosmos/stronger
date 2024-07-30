<?php

class accomptController {

    public static function getAccompt() {
        if(isset($_SESSION['id'])){

            $pageTitle = "Mon compte - Stronger";
            
            Renderer::render("Views/users/accompt.php", [
                "pageTitle" => $pageTitle
            ]);
        }
    }
}