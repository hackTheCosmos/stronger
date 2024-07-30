<?php

require_once "../Core/AsyncAtoloader.php";

$success = 0;
$message = "erreur (script.php)";

if(!empty($_POST['email']) && !empty($_POST['password1']) && !empty($_POST['password2'])) {

    $email = Form::sanitize($_POST['email']);
    $password1 = Form::sanitize($_POST['password1']);
    $password2 = Form::sanitize($_POST['password2']);

    $usersModel = new UsersModel;
    
    if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
       
        if(!$usersModel->userAlreadyExists($email)) {
            
            
            //on vérifie la robustesse du mot de passe (8 caractères, une minuscule, une majuscule, un chiffre, un caractère spécial parmis (#, ?, !, @, $))
            preg_match('/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$]).{12,}$/', $_POST["password1"], $matches);
            //si le mot de passe est assez robuste
            if(!empty($matches)) {
                if($password1 == $password2) {
                    $password = password_hash($password1, PASSWORD_DEFAULT);
                   
                    //ajout de l'utilisateur en base de données
                    
                    $usersModel->insertUser($email, $password);
                    
    
                    $success = 1;
                    $message = "Votre compte a bien été créé"; 
                    
                } else {
                    $message = "Les mots de passe ne sont pas identiques";
                }
            } else {
                $message = "Le mot de passe doit contenir au moins 12 caractères, une minuscule, une majuscule, un chiffre et un caractère spécial parmis : #, ?, !, @, $";
            }
        } else {
            $message = "Cette addresse email est déjà utilisée";
        }

        
    } else {
        $message = "Le format de votre email n'est pas correct";
    }

} else {
    $message = "Veuillez renseigner tous les champs du formulaire";
}

$results = ["success" => $success, "message" => $message];

echo json_encode($results);