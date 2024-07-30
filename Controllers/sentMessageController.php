<?php

class sentMessageController {

    public static function getSentMessage () {
        header( "Refresh:5; index.php");

        $pageTitle = "Message envoyé ! - Stronger";
        
        Renderer::render("Views/users/sentMessage.php", [
            "pageTitle" => $pageTitle
        ]);
    }
}