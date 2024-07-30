<?php

class contactController {
    public static function getContact() {

        //si le formulaire est soumis
        if(isset($_POST['contact'])) {
   
            if(isset($_POST['email']) && !empty($_POST['email'])) {
                if(isset($_POST['message']) && !empty(trim($_POST['message']))) {

                    if(filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
                        //ici le format de l'email est valide
                        $email = Form::sanitize($_POST['email']);
                        $message = Form::sanitize(trim($_POST['message']));
                        // on vérifie que le message n'est pas trop long
                        if(strlen($message) <= 1000) {

                            // on envoie le mail à l'administrateur
                            $subject = "Contact Stronger";
                            //adresse de l'administrateur
                            $address = "baileche.theo@gmail.com";
                            //corps du mail
                            $mailContent = "<p>De la part de : $email</p><p>Message : $message</p>";
                        
                            Mailer::sendMail($subject, $address, $mailContent);

                            
                            // on redirige vers la page de success
                            header("Location:index.php?page=sentMessage");
                            die();

                        } else {
                            $_SESSION['message__error'] = "Votre message ne peut pas contenir plus de 1000 caractères";
                            $email = isset($_POST['email']) ? Form::sanitize($_POST['email']) : "";
                            $message = isset($_POST['message']) ? Form::sanitize($_POST['message']) : "";
                            
                        }
                    } else {
                        $_SESSION['email__error'] = "Le format de votre email n'est pas correct";
                        $email = isset($_POST['email']) ? Form::sanitize($_POST['email']) : "";
                        $message = isset($_POST['message']) ? Form::sanitize($_POST['message']) : "";
                        
                    }

                }  else {
                
                    $_SESSION['message__error'] = "Ce champs ne peut pas être vide";
                    $email = isset($_POST['email']) ? Form::sanitize($_POST['email']) : "";
                    $message = isset($_POST['message']) ? Form::sanitize($_POST['message']) : "";
                    
                }
            } else {
                $_SESSION['email__error'] = "Ce champs ne peut pas être vide";
                $email = isset($_POST['email']) ? Form::sanitize($_POST['email']) : "";
                $message = isset($_POST['message']) ? Form::sanitize($_POST['message']) : "";
            }
        }

        $email = isset($_POST['email']) ? Form::sanitize($_POST['email']) : "";
        $message = isset($_POST['message']) ? Form::sanitize($_POST['message']) : "";

        

        $pageTitle = "Contact - Stronger";
        
        Renderer::render("Views/users/contact.php", [
            "pageTitle" => $pageTitle,"email" => $email, "message" => $message
        ]);
    }
}