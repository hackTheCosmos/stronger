<?php

class Renderer {
    public static function render($view, $data = [], $template="Views/templates/template.php") {
        require_once $template;
    }
}