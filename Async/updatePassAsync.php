<?php
session_start();
require_once "../Core/AsyncAtoloader.php";

//update pass
$success = 0;
$message = "erreur (script.php)";

 
if(!empty($_POST['password1']) && !empty($_POST['password2'])) {

    $password1 = Form::sanitize($_POST['password1']);
    $password2 = Form::sanitize($_POST['password2']);

    preg_match('/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$]).{12,}$/', $_POST["password1"], $matches);

    if(!empty($matches)) {
        if($password1 == $password2) {
            $password = password_hash($password1, PASSWORD_DEFAULT);
    
            $usersModel = new UsersModel;
            $usersModel->updatePassword($password, $_SESSION['id']);
            

            $success = 1;
            $message = "Votre mot de passe a bien été modifié"; 
            
        } else {
            $message = "Les mots de passe ne sont pas identiques";
        }
    } else {
        $message = "Le mot de passe doit contenir au moins 12 caractères, une minuscule, une majuscule, un chiffre et un caractère spécial parmis : #, ?, !, @, $";
    }

} else {
    $message = "Veuillez renseigner tous les champs du formulaire";
}

$resultsPass = ["success" => $success, "message" => $message];

echo json_encode($resultsPass);

