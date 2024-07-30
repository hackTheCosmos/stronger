<?php

class loginController {
    public static function getLogin() {

    //réinitialisation du timer pour demander un nouveau mot de passe
    if(isset($_SESSION['passTimer']) && isset($_SESSION['email'])) {
    
        if(time() > $_SESSION['passTimer'] + 15*60) {
            $usersModel = new UsersModel;
            $usersModel->refreshNewPassword($_SESSION['email']);
            unset($_SESSION['passTimer']);
            unset($_SESSION['email']);
        }
    }

        $pageTitle = "Connexion - Stronger";
        
        Renderer::render("Views/users/login.php", [
            "pageTitle" => $pageTitle
        ]);
    }
}