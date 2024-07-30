<?php
session_start();
require_once "../Core/AsyncAtoloader.php";

//update email
$success = 0;
$message ="";



if(!empty(Form::sanitize($_POST['email']))) {

    $email = Form::sanitize($_POST['email']);
    
    if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
        
        $usersModel = new UsersModel;
        $usersModel->updateEmail($email, $_SESSION['id']);
        $_SESSION['email'] = $email;
    
        $success = 1;
        $message = "Votre email a bien été modifié";

    } else {
        $message = "Le format de votre email n'est pas correct";
    }

} else {
    $message = "Vous devez saisir votre email avant de soumettre le formulaire";
}

$resultsEmail = ["success" => $success, "message" => $message];

echo json_encode($resultsEmail);



