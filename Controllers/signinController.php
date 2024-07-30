<?php

class signinController {

    public static function getSignin () {

        $pageTitle = "Inscription - Stronger";
        
        Renderer::render("Views/users/signin.php", [
            "pageTitle" => $pageTitle
        ]);
    }
}