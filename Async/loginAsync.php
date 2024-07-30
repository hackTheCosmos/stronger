<?php
session_start();
require_once "../Core/AsyncAtoloader.php";

$success = 0;
$message ="";

if(!empty($_POST['email']) && !empty($_POST['password'])) {

    $email = Form::sanitize($_POST['email']);
    $password = Form::sanitize($_POST['password']);
    
    if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
        
        $usersModel = new UsersModel;
        $user = $usersModel->getByEmail($email);
    
        if($user) { 
            if(password_verify($password, $user->pass)) {
                $success = 1;
                $_SESSION['id'] = $user->id;
                $_SESSION['email'] = $user->email;
                              
                if($user->new_password == 1) {
                    $usersModel->refreshNewPassword($email);
                }
                
            } else {
                $message = "Email ou mot de passe incorrect(s)";
            }
        
        

        } else {
            $message = "Email ou mot de passe incorect(s)";
        }
        
                
        
    } else {
        $message = "Le format de votre email n'est pas correct";
    }

} else {
    $message = "Veuillez renseigner tous les champs du formulaire";
}

$results = ["success" => $success, "message" => $message];

echo json_encode($results);