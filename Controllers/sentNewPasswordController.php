<?php

class sentNewPasswordController {

    public static function getSentNewPassword () {
        header( "Refresh:5; index.php?page=login");

        $pageTitle = "Mot de passe envoyé ! - Stronger";
        
        Renderer::render("Views/users/sentNewPassword.php", [
            "pageTitle" => $pageTitle
        ]);
    }
}