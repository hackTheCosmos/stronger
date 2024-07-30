<?php

class newPasswordController {
    public static function getNewPassword() {
       
        $usersModel = new UsersModel;
        unset ($_SESSION['new__password__error']);
        unset ($_SESSION['new__password__success']);

        if(isset($_POST["new_password"])){
            unset ($_SESSION['new__password__error']);
            unset ($_SESSION['new__password__success']);
               
            if(!empty(trim($_POST["email"]))){

                if(filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {

                    $email = Form::sanitize($_POST["email"]);
                    $_SESSION['email'] = $email;
                    
                    $user = $usersModel->findUserByEmail($email);
  
                    if ($user){

                        if($user->new_password == 0 ){
                            
                            $newPass = self::getRandomPassword();
                            
                            $usersModel->updateNewPassword(password_hash($newPass, PASSWORD_DEFAULT), $email);
                            
                            $messageNewPass = "Voci votre nouveau mot de passe : $newPass , il sera disponible 15 minutes";
                            $subject = "Nouveau mot de passe Stronger";
                            $address = $email;
                        
                            $message = $messageNewPass;
                            
                            Mailer::sendMail($subject, $address, $message);
                            
                            $_SESSION['passTimer'] = time();
                            
                            header( "Location:index.php?page=sentNewPassword");
                            die;
                        } else {
                            $_SESSION["new__password__error"] = "Vous avez déjà demandé un nouveau mot de passe. Vérifiez vos emails";
                        }
                        
                    } else {
                        $_SESSION["new__password__error"] = "Aucun compte n'est associé à cette adresse email";
                    }
                } else {
                    $_SESSION["new__password__error"] = "Le format de l'addresse email n'est pas valide";
                }
            } else {
                $_SESSION["new__password__error"] = "Veuillez indiquer votre email";
            }
        }

        $pageTitle = "Nouveau mot de passe - Stronger";
        
        Renderer::render("Views/users/newPassword.php", [
            "pageTitle" => $pageTitle
        ]);
    }

    /**
    * Cette fonction génère un nouveau mot de passe robuste grâce aux expressions régulières
    *
    * @return string
    */
    public static function getRandomPassword() : string {
        //liste des caractères possibles
        $alphabet = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789$#?!@$";
        
        $pass = array();
        $alphabetLength = strlen($alphabet) - 1;
        $score=0;
        
        //tant que le mot de passe n'est pas assez robuste on relance la création
        //d'un nouveau mot de passe aléatoire
        while($score < 1){
            $pass = [];
            for ($i = 0; $i < 12 ; $i++) {
                $n = rand(0, $alphabetLength);
                $pass[] = $alphabet[$n];
            }
            //on transforme le tableau généré en chaîne de caractères
            $newPassword = implode($pass);
            
            
            //on teste la robustesse du mot de passe avec les expresssions régulières
            preg_match('/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$]).{12,}$/', $newPassword, $matches);
            if(!empty($matches)){
                $score++;
            }
        }
        
        return $newPassword;
    }


}