<?php

class Mailer {
    public static function sendMail(string $subject, string $address, string $message) {
        
        include "Secure/config.php";
        
        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->isSMTP();                                            
            $mail->Host = 'smtp.hostinger.com';                     
            $mail->SMTPAuth = true;                                   
            $mail->Username = $myEmail;                     
            $mail->Password = $emailPass;                               
            $mail->SMTPSecure = "ssl";            
            $mail->Port = 465;                                  
        
            //Recipients
            $mail->setFrom($myEmail);
            $mail->addAddress($address);
            
            //encodage
            $mail->CharSet = "UTF-8";
        
            //Content
            $mail->isHTML();
            $mail->Subject = $subject;
            $mail->Body = $message;
        
            // send
            $mail->send();
        
        } catch (Exception $e) {
            echo "<p>Message could not be sent. Mailer Error: {$mail->ErrorInfo}</p>";
        }
    }
}

